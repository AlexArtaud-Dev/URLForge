@extends("layouts.public")

@section("styles")
@endsection

@section("content")
    <livewire:url-display-modal :should-keep-modal-open="true" :url="$url" />
@endsection

@section("scripts")
@endsection
