@extends('layout.app')

@section('title', $page->slug)

@section('content')
    <section class="mx-auto px-1">
        <p class="status float-right text-sm text-gray-500" id="status"></p>
        <h1 class="font-bold text-1xl text-gray-800 mt-1 ml-1">Editing: <span class="text-blue-600">{{ $page->slug }}</span></h1>
        
        <div class="relative">
            <textarea id="content" spellcheck="false"
                class="w-full resize-none outline-none p-1 overflow-hidden rounded-lg min-h-[95vh] border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-md transition duration-200"
                placeholder="Start editing your content...">{{ $page->content }}</textarea>
        </div>
    </section>
    @vite('resources/js/page.js')
@endsection
