<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;

class ShorteningController extends Controller
{
    public function index()
    {
        return view("pages.shorten.shorten-page");
    }
}
