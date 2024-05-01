@extends("layouts.public")

@section("styles")
@endsection

@section("content")
    <div class="w-full h-full flex flex-row justify-center items-center">
        <div class="w-4/5 bg-[#f8fafc] rounded-2xl shadow-xl mb-60 p-4 flex flex-col gap-6 divide-y">
            <livewire:shorten-form />
        </div>
    </div>
    <livewire:url-display-modal />
@endsection

@section("scripts")
@endsection
