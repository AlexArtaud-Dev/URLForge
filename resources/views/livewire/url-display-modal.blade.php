<div class="w-full h-full">
    @if($shouldKeepModalOpen)
        <div class="w-full h-2/3 flex flex-row justify-center items-center">
            <div class="shadow-2xl w-2/3 xl:w-[40vw] bg-white flex flex-col rounded-lg z-50">
                <div class="w-full btn-gradient flex flex-col gap-2 rounded-t-lg p-4">
                    <div class="w-full flex flex-row gap-4">
                        <span class="text-sm text-white"><i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($url["created_at"])->isoFormat('LLLL') }}</span>
                        <span class="text-sm text-white"><i class="fa fa-eye"></i> {{ $url["click_count"] }}</span>
                    </div>
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
                                    wire:click="copyShortUrlToClipboard"
                                    class="align-middle px-1 select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs rounded-lg border border-purple-300 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                    type="button">
                                    Copy
                                </button>
                            </div>
                            <span class="text-sm text-gray-900 truncate max-w-[30vw] md:max-w-[20vw]">{{ route("redirect",["slug" => $url['slug']]) }}</span>
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <div class="w-full flex flex-row flex-wrap gap-2">
                                <div class="w-full flex flex-row flex-wrap items-center gap-2">
                                    <span class="text-sm text-gray-900 font-bold">Original URL</span>
                                    <button
                                        wire:click="copyOriginalUrlToClipboard"
                                        class="align-middle px-1 select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs rounded-lg border border-purple-300 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                        type="button">
                                        Copy
                                    </button>
                                </div>
                            </div>
                            <span class="text-sm text-gray-900 truncate max-w-[30vw] md:max-w-[20vw]">{{ $url["originalUrl"] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div
            wire:keydown.escape.window="closeModal"
            class="@if(!$url) hidden @endif fixed inset-0 flex items-center justify-center z-50"
            style="background-color: rgba(0, 0, 0, 0.5);">

            <script>
                window.addEventListener('copyToClipboard', event => {
                    navigator.clipboard.writeText(event.detail[0]).then(function() {
                        // Success feedback here
                    }, function() {
                        // Failure feedback here
                    });
                });
            </script>

            @if($url)
                <div class="w-2/3 xl:w-[40vw] bg-white flex flex-col rounded-lg z-50">
                    <div class="w-full btn-gradient flex flex-col gap-2 rounded-t-lg p-4">
                        <div class="w-full flex flex-row gap-4">
                            <span class="text-sm text-white"><i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($url["created_at"])->isoFormat('LLLL') }}</span>
                            <span class="text-sm text-white"><i class="fa fa-eye"></i> {{ $url["click_count"] }}</span>
                        </div>
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
                                        wire:click="copyShortUrlToClipboard"
                                        class="align-middle px-1 select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs rounded-lg border border-purple-300 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                        type="button">
                                        Copy
                                    </button>
                                </div>
                                <span class="text-sm text-gray-900 truncate max-w-[30vw] md:max-w-[20vw]">{{ route("redirect",["slug" => $url['slug']]) }}</span>
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <div class="w-full flex flex-row flex-wrap gap-2">
                                    <div class="w-full flex flex-row flex-wrap items-center gap-2">
                                        <span class="text-sm text-gray-900 font-bold">Original URL</span>
                                        <button
                                            wire:click="copyOriginalUrlToClipboard"
                                            class="align-middle px-1 select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs rounded-lg border border-purple-300 text-gray-900 hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                            type="button">
                                            Copy
                                        </button>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-900 truncate max-w-[30vw] md:max-w-[20vw]">{{ $url["originalUrl"] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div wire:click="closeModal" class="fixed inset-0 w-full h-full z-10"></div>
        </div>
    @endif
</div>

