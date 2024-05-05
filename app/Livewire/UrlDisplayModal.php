<?php

namespace App\Livewire;

use App\Helpers\UrlHelper;
use Livewire\Component;

class UrlDisplayModal extends Component
{
    public $url;
    public $qrCode;
    public bool $shouldKeepModalOpen = false;

    protected $listeners = ['displayUrlModal' => 'showModal'];

    public function mount(bool $shouldKeepModalOpen = false, $url = null): void
    {
        $this->shouldKeepModalOpen = $shouldKeepModalOpen;
        if ($shouldKeepModalOpen && !is_null($url)) {
            $this->url = $url;
            $this->qrCode = UrlHelper::generateQrCode(route("redirect",["slug" => $url['slug']]));
        }
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

    public function render()
    {
        if ($this->shouldKeepModalOpen) return view('livewire.url-display-fixed');
        else return view('livewire.url-display-modal');
    }
}
