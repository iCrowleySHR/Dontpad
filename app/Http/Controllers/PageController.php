<?php

namespace App\Http\Controllers;

use App\Events\PageUpdated;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Pages::firstOrCreate(['slug' => $slug]);

        return view('page', compact('page'));
    }

    public function update(Request $request, $slug)
    {
        $page = Pages::where('slug', $slug)->firstOrFail();
        $page->content = $request->input('content');
        $page->save();
        
        broadcast(new PageUpdated($page, $request->input('userId')));


        return response()->json(['message' => 'Content saved!'], 200);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Pages::where('slug', 'like', "%{$query}%")
                        ->whereNotNull('content')
                        ->limit(10)
                        ->pluck('slug');

        return response()->json($results);
    }
}
