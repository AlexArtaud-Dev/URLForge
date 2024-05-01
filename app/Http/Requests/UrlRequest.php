<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'originalUrl' => ['required'],
            'slug' => ['required'],
            'title' => ['nullable'],
            'click_count' => ['required', 'integer'],
            'max_click' => ['nullable', 'integer'],
            'password' => ['nullable'],
            'expiration_date' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
