<div
    wire:keydown.escape.window="closeModal"
    class="@if(!$url) hidden @endif fixed inset-0 flex items-center justify-center z-50"
    style="background-color: rgba(0, 0, 0, 0.5);">

    @if($url)
        <div class="w-2/3 xl:w-[40vw] bg-white flex flex-col rounded-lg z-50">
            <div class="w-full btn-gradient flex flex-col gap-2 rounded-t-lg p-4">
                <div class="w-full flex flex-row justify-between">
                    <span class="text-sm text-white"><i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($url["created_at"])->isoFormat('LLLL') }}</span>
                    @if(!empty($url["password"]))
                        <span class="text-sm text-white font-semibold">PROTECTED <i class="fa fa-lock"></i></span>
                    @else
                        <span class="text-sm text-white font-semibold">PUBLIC <i class="fa fa-lock-open"></i></span>
                    @endif
                </div>
                @if(!is_null($url["expiration_date"]))
                    <span class="text-sm text-white"> {{ \Carbon\Carbon::parse($url["expiration_date"])->isoFormat('LLLL') }} <i class="fa fa-hourglass-start"></i></span>
                @endif
                <span class="text-lg text-white truncate max-w-[35vw]">{{ !empty($url["title"]) ? $url["title"] : "No title found" }}</span>
            </div>
            <div class="w-full flex flex-row justify-between items-center px-12 py-4 gap-6 flex-wrap">
                <div class="flex-1 flex flex-col items-center justify-center">
                    <img class="min-w-[100px]" src="data:image/png;base64, {{ $qrCode }}" alt="QR Code">
                </div>
                <div id="uris" class="flex-1 flex flex-col gap-8">
                    <div class="flex flex-col gap-2 w-full">
                        <div class="w-full flex flex-row flex-wrap items-center gap-2">
                            <span class="text-sm text-gray-900 font-bold">Shortened URL</span>
                            <button
                                onclick="copyToClipboard('{!! route("redirect",["slug" => $this->url['slug']]) !!}')"
                                class="align-middle px-1 select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs rounded-lg border border-purple-300 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                type="button">
                                Copy
                            </button>
                        </div>
                        <span
                            class="text-sm text-gray-900 truncate max-w-[30vw] md:max-w-[20vw]">{{ route("redirect",["slug" => $url['slug']]) }}</span>
                    </div>
                    <div class="flex flex-col gap-2 w-full">
                        <div class="w-full flex flex-row flex-wrap gap-2">
                            <div class="w-full flex flex-row flex-wrap items-center gap-2">
                                <span class="text-sm text-gray-900 font-bold">Original URL</span>
                                <button
                                    onclick="copyToClipboard('{!! $url['originalUrl'] !!}')"
                                    class="align-middle px-1 select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs rounded-lg border border-purple-300 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                    type="button">
                                    Copy
                                </button>
                            </div>
                        </div>
                        <span
                            class="text-sm text-gray-900 truncate max-w-[30vw] md:max-w-[20vw]">{{ $url["originalUrl"] }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div wire:click="closeModal" class="fixed inset-0 w-full h-full z-10"></div>
</div>

