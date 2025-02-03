@extends('layout.app')

@section('title', 'Home')

@section('content')
<main class="flex justify-center h-screen">
    <section class="container lg:w-1/4 relative mx-5 mt-[20vh]">
        <h1 class="text-5xl font-semibold text-center">DONTPAD</h1>
        <h2 class="text-center mb-4">The simplest way to share text online.</h2>
        
        <div class="flex space-x-2">
            <input type="text" id="search" class="border border-gray-300 p-3 w-full rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Search for pages or create...">
            <button id="btn" class="bg-blue-500 text-white px-4 py-1 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                Search
            </button>
        </div>
        
        <ul id="suggestions" class="bg-white border border-gray-300 mt-2 rounded-lg shadow-md max-h-60 overflow-y-auto absolute w-full z-10 hidden"></ul>
    </section>
    @vite('resources/js/search.js')
</main>
@endsection
