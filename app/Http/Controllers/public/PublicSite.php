<?php

namespace App\Http\Controllers\public;

use App\Models\Experience;
use Illuminate\Routing\Controller;

class PublicSite extends Controller
{
    public function __invoke(string $locale)
    {
        app()->setLocale($locale);
        $mostRecentJob = Experience::latest()->first();

        return view('public.index', compact('mostRecentJob'));
    }
}
