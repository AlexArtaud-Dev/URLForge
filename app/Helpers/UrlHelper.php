<?php

namespace App\Helpers;

use App\Models\Url;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class UrlHelper
{
    static function generateSlug(string $url): string
    {
        $slugLength = 3;
        $tries = 0;

        do {
            $slug = self::generateRandomSlug($slugLength);
            $tries++;

            if ($tries >= 10) {
                $slugLength++;
                $tries = 0;
            }
        } while (Url::where('slug', $slug)->exists());

        return $slug;
    }

    static function createNewShortUrl(string $url, string $slug, int $maxVisit, string $expirationDate, string $password): Url
    {
        return Url::create([
            'originalUrl' => $url,
            'slug' => !empty($slug) ? $slug : self::generateSlug($url),
            'title' => self::getOriginalUrlTitle($url),
            'click_count' => 0,
            'max_click' => $maxVisit,
            'password' => $password,
            'expiration_date' => $expirationDate === "" ? null : Carbon::parse($expirationDate),
        ]);
    }

    static function getOriginalUrlTitle(string $url): string
    {
        $html = file_get_contents($url);
        $doc = new \DOMDocument();
        @$doc->loadHTML($html);
        $title = $doc->getElementsByTagName("title");

        return $title->length > 0 ? $title->item(0)->textContent : "";
    }

    static function generateRandomSlug(int $length = 3): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    static function generateQrCode(string $url): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);

        return base64_encode($writer->writeString($url));
    }
}
