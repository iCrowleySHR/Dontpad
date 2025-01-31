<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dontpad Clone</title>
    @vite('resources/css/app.css')
</head>

<body>
    <section class="mx-auto px-2">
        <p class="status float-right" id="status"></p>
        <h1 class="font-bold text-3xl my-3">Editing: {{ $page->slug }}</h1>
        <textarea id="content"
        spellcheck="false"
        class="w-full resize-none outline-none p-2 overflow-hidden rounded-lg min-h-[92vh] border-black border">{{ $page->content }}</textarea>
    </section>
    @vite('resources/js/app.js')
</body>

</html>