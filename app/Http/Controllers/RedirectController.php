<?php

namespace App\Http\Controllers;

use App\Models\Url;

class RedirectController extends Controller
{
    public function index(string $slug)
    {
        $url = Url::where('slug', $slug)->firstOrFail();
        $url->increment('click_count');
        $url->save();
        dd($url);
        $url = $url->toArray();
        return view("pages.redirect.redirect-page", compact("url"));
    }
}
