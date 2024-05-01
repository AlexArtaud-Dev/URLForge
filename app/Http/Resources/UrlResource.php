<?php

namespace App\Http\Resources;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Url */
class UrlResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'originalUrl' => $this->originalUrl,
            'slug' => $this->slug,
            'title' => $this->title,
            'click_count' => $this->click_count,
            'max_click' => $this->max_click,
            'password' => $this->password,
            'expiration_date' => $this->expiration_date,
        ];
    }
}
