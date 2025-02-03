@extends('layout.app')

@section('title', 'Home')

@section('content')
<main class="flex justify-center h-screen">
    <section class="container lg:w-1/4 relative mx-5 mt-[20vh]">
        <h1 class="text-2xl font-semibold mb-4 text-center">Dontpad</h1>
        <input type="text" id="search" class="border border-gray-300 p-3 w-full rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Search for pages...">
        
        <ul id="suggestions" class="bg-white border border-gray-300 mt-2 rounded-lg shadow-md max-h-60 overflow-y-auto absolute w-full z-10 hidden"></ul>
    </section>
    @vite('resources/js/search.js')
</main>
@endsection
