@extends("layouts.public")

@section("styles")
@endsection

@section("content")
    <div class="w-full h-full flex flex-row justify-center items-center flex-wrap-reverse z-30">
        <img src="{{ Vite::asset('resources/images/404_clipart.svg') }}" class="hidden xl:block xl:w-[450px] xl:h-[450px]" alt="Hero Image" width="450" height="450">
    </div>
@endsection

@section("scripts")
@endsection
