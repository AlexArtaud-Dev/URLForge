<?php

namespace App\Livewire;

use App\Helpers\UrlHelper;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UrlDisplayModal extends Component
{
    public $url;
    public $qrCode;
    public bool $shouldKeepModalOpen = false;

    protected $listeners = ['displayUrlModal' => 'showModal'];

    public function mount(bool $shouldKeepModalOpen = false, $url): void
    {
        $this->shouldKeepModalOpen = $shouldKeepModalOpen;
        $this->url = $url;
        $this->qrCode = UrlHelper::generateQrCode(route("redirect",["slug" => $url['slug']]));
    }

    public function showModal($url): void
    {
        $this->url = $url;
        $this->qrCode = UrlHelper::generateQrCode(route("redirect",["slug" => $url['slug']]));
    }

    public function closeModal(): void
    {
        $this->reset(['url', 'qrCode']);
    }

    public function copyShortUrlToClipboard(): void
    {
        Toaster::success('Short URL copied to clipboard.');
        $this->dispatch('copyToClipboard', route("redirect",["slug" => $this->url['slug']]));
    }

    public function copyOriginalUrlToClipboard(): void
    {
        Toaster::success('Original URL copied to clipboard.');
        $this->dispatch('copyToClipboard', [$this->url['originalUrl']]);
    }

    public function render()
    {
        return view('livewire.url-display-modal');
    }
}
