@extends("layouts.public")

@section("styles")
@endsection

@section("content")
    <div class="w-full h-full flex flex-row justify-center items-center flex-wrap-reverse z-30">
        <img src="{{ Vite::asset('resources/images/url_clipart.svg') }}" class="hidden xl:block xl:w-[550px] xl:h-[550px]" alt="Hero Image" width="550" height="550">
        <div class="text-center md:text-start">
            <span class="inline-block mb-3 text-lg text-[#27dec0] font-bold uppercase tracking-widest">URL Forge</span>
            <h1 class="font-heading mb-4 text-7xl text-white font-black tracking-tight flex flex-col">
                <span>Your open-source</span>
                <span class="text-transparent bg-clip-text bg-gradient-red-light">URL Shortener</span>
            </h1>
            <p class="mb-6 text-md text-gray-200 font-bold tracking-normal">URL
                shortener
                that you can host
                on any platform for free</p>
            <div class="flex flex-wrap -m-2">
                <div class="w-full p-2 flex flex-row flex-wrap items-center gap-8 justify-center md:justify-start">
                    <a href="/shorten"
                          class="cursor-pointer px-4 py-2.5 text-sm text-center text-white font-bold border-[#27dec0] border-2 hover:opacity-85 rounded-full">
                    SHORTEN
                    </a>
                    <div class="text-md text-gray-200 font-bold tracking-normal flex flex-row gap-6">
                        <span>-</span>
                        <span>Made with ❤️ by <a
                                href="https://github.com/AlexArtaud-Dev">AlexArtaud-Dev</a></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
@endsection
