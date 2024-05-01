<?php

namespace App\Http\Controllers;

use App\Models\Url;

class InformationController extends Controller
{
    public function index(string $slug)
    {
        $url = Url::where('slug', $slug)->firstOrFail();
        $url = $url->toArray();
        return view("pages.infos.infos-page", compact("url"));
    }
}
