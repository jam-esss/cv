<?php

namespace App\Http\Controllers\public;

use App\Models\About;
use App\Models\Experience;
use App\Models\WebsiteSetting;
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

        $landingBackground = WebsiteSetting::where('key', 'landing_background')->value('value');
        $mostRecentJob = Experience::latest()->first();

        $aboutModules = About::all();
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
            'landingBackground' => $landingBackground,
            'aboutModules' => $aboutModules,
            'spotifyArtists' => $spotifyArtists,
            'spotifyTracks' => $spotifyTracks,
            'glucose' => $glucose,
        ]);
    }
}
