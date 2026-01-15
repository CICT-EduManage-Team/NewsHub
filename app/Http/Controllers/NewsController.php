<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', ['news' => []]);
    }
    public function create()
    {
        return view('news.create');
    }
    public function store(Request $request)
    {
        // Handle storing news
        return dd($request->all());
    }
    public function show($id)
    {
        return view('news.show', ['news' => null]);
    }
    public function edit($id)
    {
        return view('news.edit', ['news' => null]);
    }
    public function update(Request $request, $id)
    {
        // Handle updating news
    }
    public function destroy($id)
    {
        // Handle deleting news
    }


    // ---Метод для загрузки изображений из TinyMCE
    // НАРАСИТОН!!!
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048', // 2MB
        ]);

        $path = $request->file('file')->store('news', 'public');

        return response()->json([
            'location' => Storage::url($path), // ОБЯЗАТЕЛЬНО поле location
        ]);
    }
}
