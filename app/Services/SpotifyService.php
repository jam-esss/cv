<?php

namespace App\Services;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Http;
use RuntimeException;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    private const TOKEN_URL = 'https://accounts.spotify.com/api/token';
    private const API_URL = 'https://api.spotify.com/v1';

    public function getAccessToken(): string
    {
        $accessToken = WebsiteSetting::get('spotify_access_token');
        $expiresAt = WebsiteSetting::get('spotify_access_token_expires_at');

        if (!$accessToken || !$expiresAt) {
            throw new RuntimeException('Spotify has not been authorized.');
        }

        // Give ourselves a small buffer so we don't try to use
        // a token that is about to expire.
        if (now()->addMinute()->lt($expiresAt)) {
            return $accessToken;
        }

        return $this->refreshAccessToken();
    }

    private function refreshAccessToken(): string
    {
        $refreshToken = WebsiteSetting::get('spotify_refresh_token');

        if (!$refreshToken) {
            throw new RuntimeException('Spotify refresh token is missing.');
        }

        $response = Http::asForm()
            ->withBasicAuth(
                config('services.spotify.client_id'),
                config('services.spotify.client_secret')
            )
            ->post(self::TOKEN_URL, [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
            ]);

        if ($response->status() === 400) {
            throw new RuntimeException(
                'Spotify authorization has expired. Please authorize Spotify again.'
            );
        }

        $response->throw();

        $data = $response->json();

        WebsiteSetting::set(
            'spotify_access_token',
            $data['access_token']
        );

        WebsiteSetting::set(
            'spotify_access_token_expires_at',
            now()->addSeconds($data['expires_in'])->toIso8601String()
        );

        // Spotify can return a new refresh token.
        // If it doesn't, keep the existing one.
        if (!empty($data['refresh_token'])) {
            WebsiteSetting::set(
                'spotify_refresh_token',
                $data['refresh_token']
            );
        }

        return $data['access_token'];
    }

    public function topArtists(): array
    {
        return $this->cachedSpotifyData(
            'spotify.top_artists',
            fn () => $this->get('/me/top/artists', [
                'limit' => 5,
                'time_range' => 'medium_term',
            ])
        );
    }

    public function topTracks(): array
    {
        return $this->cachedSpotifyData(
            'spotify.top_tracks',
            fn () => $this->get('/me/top/tracks', [
                'limit' => 5,
                'time_range' => 'medium_term',
            ])
        );
    }

    private function cachedSpotifyData(string $cacheKey, \Closure $callback): array
    {
        return Cache::remember(
            $cacheKey,
            now()->addWeek(),
            function () use ($cacheKey, $callback) {
                try {
                    $data = $callback();
                    Cache::forever("{$cacheKey}.last_success", $data);

                    return $data;
                } catch (\Throwable $e) {
                    report($e);
                    return Cache::get("{$cacheKey}.last_success", []);
                }
            }
        );
    }

    private function get(string $endpoint, array $query = []): array
    {
        return Http::withToken($this->getAccessToken())
            ->get(self::API_URL . $endpoint, $query)
            ->throw()
            ->json('items', []);
    }
}
