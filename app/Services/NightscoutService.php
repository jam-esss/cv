<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NightscoutService
{
    public function latestGlucose(): ?array
    {
        return Cache::remember(
            'nightscout.latest_glucose',
            now()->addHour(),
            fn () => $this->fetchLatestGlucose()
        );
    }

    private function fetchLatestGlucose(): ?array
    {
        $response = Http::withHeaders([
            'api-secret' => sha1(config('services.nightscout.api_secret')),
        ])->get(
            rtrim(config('services.nightscout.url'), '/') . '/api/v1/entries',
            [
                'count' => 1,
            ]
        );

        $response->throw();

        $line = trim($response->body());

        if (!$line) {
            return null;
        }

        $fields = preg_split('/\t+/', $line);

        if (count($fields) < 4) {
            return null;
        }

        return [
            'timestamp' => trim($fields[0], '"'),
            'value' => round((float) $fields[2] / 18, 1),
            'direction' => $this->formatDirection(trim($fields[3], '"')),
        ];
    }

    private function formatDirection(string $direction): string
    {
        return match ($direction) {
            'DoubleUp' => '⇈',
            'SingleUp' => '↑',
            'FortyFiveUp' => '↗',
            'Flat' => '→',
            'FortyFiveDown' => '↘',
            'SingleDown' => '↓',
            'DoubleDown' => '⇊',
            'NONE', 'NOT COMPUTABLE', 'OutOfRange' => '—',
            default => '—',
        };
    }
}
