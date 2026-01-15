<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }
    public function create()
    {
        return view('news.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $request['user_id'] = auth()->id();
        News::create($request->only('title', 'content', 'user_id'));
        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }
    public function show($id)
    {
        $news = News::findorfail($id);
        $comments = Comment::all()->where('news_id', $id);
        return view('news.show', compact('news', 'comments'));
    }
    public function edit($id)
    {
        $news = News::findorfail($id);
        return view('news.edit', compact('news'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $news = News::findorfail($id);
        $news->update($request->only('title', 'content'));
        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }
    public function destroy($id)
    {
        $news = News::findorfail($id);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
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
