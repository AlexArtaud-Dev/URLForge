<?php

namespace App\Http\Controllers;

use App\Helpers\UrlHelper;
use App\Models\Url;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RedirectController
 *
 * @package App\Http\Controllers
 */
class RedirectController extends Controller
{
    /**
     * The index method is the entry point for the RedirectController.
     * It retrieves the URL model associated with the provided slug,
     * and then redirects the user to the original URL associated with that model.
     *
     * @param string $slug The slug associated with the URL model.
     *
     * @return RedirectResponse A redirect response to the original URL.
     *
     * @throws ModelNotFoundException If no URL model is found for the provided slug.
     */
    public function index(string $slug)
    {
        // Retrieve the URL model associated with the provided slug.
        // If no model is found, this will throw a ModelNotFoundException.
        $url = Url::where('slug', $slug)->firstOrFail();

        // Use the UrlHelper to redirect the user to the original URL associated with the URL model.
        return UrlHelper::redirectTo($url);
    }
}
