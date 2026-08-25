<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SpotifyController extends Controller
{
    public function login()
    {
        $state = Str::random(40);

        session(['spotify_oauth_state' => $state]);

        $query = http_build_query([
            'client_id' => config('services.spotify.client_id'),
            'response_type' => 'code',
            'redirect_uri' => config('services.spotify.redirect_uri'),
            'scope' => 'user-top-read',
            'state' => $state,
        ]);

        return redirect(
            'https://accounts.spotify.com/authorize?' . $query
        );
    }

    public function callback(Request $request)
    {
        $expectedState = session('spotify_oauth_state');

        session()->forget('spotify_oauth_state');

        if (!$expectedState || !hash_equals($expectedState, $request->state ?? '')) {
            abort(403, 'Invalid Spotify OAuth state.');
        }

        if ($request->has('error')) {
            abort(400, 'Spotify authorization was denied.');
        }

        if (!$request->has('code')) {
            abort(400, 'Spotify authorization code missing.');
        }

        $response = Http::asForm()
            ->withBasicAuth(
                config('services.spotify.client_id'),
                config('services.spotify.client_secret')
            )
            ->post('https://accounts.spotify.com/api/token', [
                'grant_type' => 'authorization_code',
                'code' => $request->code,
                'redirect_uri' => config('services.spotify.redirect_uri'),
            ]);

        $response->throw();

        $data = $response->json();

        WebsiteSetting::set(
            'spotify_access_token',
            $data['access_token']
        );

        WebsiteSetting::set(
            'spotify_refresh_token',
            $data['refresh_token']
        );

        WebsiteSetting::set(
            'spotify_access_token_expires_at',
            now()->addSeconds($data['expires_in'])->toIso8601String()
        );

        return redirect('/');
    }
}
