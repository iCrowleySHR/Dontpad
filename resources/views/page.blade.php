@extends('layout.app')

@section('title', $page->slug)

@section('content')
    <section class="mx-auto px-2">
        <p class="status float-right" id="status"></p>
        <h1 class="font-bold text-3xl my-3">Editing: {{ $page->slug }}</h1>
        <textarea id="content" spellcheck="false"
            class="w-full resize-none outline-none p-2 overflow-hidden rounded-lg min-h-[92vh] border-black border">{{ $page->content }}</textarea>
    </section>
@endsection