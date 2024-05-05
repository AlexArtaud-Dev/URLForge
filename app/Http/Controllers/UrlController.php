<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class UrlController
 *
 * @package App\Http\Controllers
 *
 * This controller handles all the CRUD operations related to the Url model.
 */
class UrlController extends Controller
{
    /**
     * Display a listing of the Url resources.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        // Return a collection of all Url resources.
        return UrlResource::collection(Url::all());
    }

    /**
     * Store a newly created Url resource in storage.
     *
     * @param UrlRequest $request
     * @return UrlResource
     */
    public function store(UrlRequest $request)
    {
        // Create a new Url resource with the validated request data and return it.
        return new UrlResource(Url::create($request->validated()));
    }

    /**
     * Display the specified Url resource.
     *
     * @param Url $url
     * @return UrlResource
     */
    public function show(Url $url)
    {
        // Return the specified Url resource.
        return new UrlResource($url);
    }

    /**
     * Update the specified Url resource in storage.
     *
     * @param UrlRequest $request
     * @param Url $url
     * @return UrlResource
     */
    public function update(UrlRequest $request, Url $url)
    {
        // Update the specified Url resource with the validated request data and return it.
        $url->update($request->validated());

        return new UrlResource($url);
    }

    /**
     * Remove the specified Url resource from storage.
     *
     * @param Url $url
     * @return JsonResponse
     */
    public function destroy(Url $url)
    {
        // Delete the specified Url resource and return a JSON response.
        $url->delete();

        return response()->json();
    }
}
