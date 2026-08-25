<?php

namespace App\Http\Controllers\public;

use App\Models\Experience;
use Illuminate\Routing\Controller;
use App\Services\SpotifyService;
use App\Services\NightscoutService;

class PublicSite extends Controller
{
    public function __invoke(
        string $locale,
        SpotifyService $spotify,
        NightscoutService $nightscout
    )
    {
        app()->setLocale($locale);

        $mostRecentJob = Experience::latest()->first();

        $spotifyArtists = [];
        $spotifyTracks = [];
        $glucose = null;

        try {
            $spotifyArtists = $spotify->topArtists();
            $spotifyTracks = $spotify->topTracks();
        } catch (\Throwable $e) {
            report($e);
        }

        try {
            $glucose = $nightscout->latestGlucose();
        } catch (\Throwable $e) {
            report($e);
        }

        return view('public.index', [
            'mostRecentJob' => $mostRecentJob,
            'spotifyArtists' => $spotifyArtists,
            'spotifyTracks' => $spotifyTracks,
            'glucose' => $glucose,
        ]);
    }

}
