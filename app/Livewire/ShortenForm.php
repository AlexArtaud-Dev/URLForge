<?php

namespace App\Livewire;

use App\Helpers\UrlHelper;
use App\Models\Url;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class ShortenForm extends Component
{
    #[Validate('required')]
    public string $url = '';
    public string $slug = '';
    public int $maxVisit = 0;
    public string $expirationDate = '';
    public string $password = '';

    #[NoReturn] public function create() : void
    {
        // validate the form, check if the url is valid, if slug is not null, check that its 3 characters long minimum and unique in urls table, if maxVisit is not null, check that its a number, if expirationDate is not null, check that its a valid date, if password is not null, check that its a string
        $validated = $this->validate([
            'url' => 'required|url',
            'slug' => 'nullable|min:3|unique:urls,slug',
            'maxVisit' => 'nullable|numeric',
            'expirationDate' => 'nullable|date',
            'password' => 'nullable|string',
        ]);

        // create a new url with the validated data
        $url = UrlHelper::createNewShortUrl($validated['url'], $validated['slug'], $validated['maxVisit'], $validated['expirationDate'], $validated['password']);
        $url->save();
        $this->dispatch('displayUrlModal', url: $url)->to(UrlDisplayModal::class);
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.shorten-form');
    }
}
