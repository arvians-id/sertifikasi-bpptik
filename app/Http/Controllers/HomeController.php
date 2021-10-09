<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create-update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles',
            'image' => 'mimes:png,jpg|max:1024',
        ]);

        $filename = 'default.png';

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->extension();
            $filename = Str::uuid() . '.' . $image;

            $file->move(public_path('storage/thumbnail'), $filename);
        }

        Article::create([
            'title' => $request->title,
            'image' => $filename,
            'body' => $request->body,
            'slug' => Str::slug($request->title)
        ]);

        return redirect()->route('home.index')->with('status', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Article $home)
    {
        return view('article.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $home)
    {
        return view('article.create-update', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $home)
    {
        $request->validate([
            'title' => 'required|unique:articles,title,' . $home->id,
            'image' => 'mimes:png,jpg|max:1024',
        ]);

        $filename = $home->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $image = $file->extension();
            $filename = Str::uuid() . '.' . $image;

            $file->move(public_path('storage/thumbnail'), $filename);

            $path = public_path('storage/thumbnail/') . $home->image;
            if (File::exists($path) && $home->image != 'default.png') {
                File::delete($path);
            }
        }

        $home->update([
            'title' => $request->title,
            'image' => $filename,
            'body' => $request->body,
            'slug' => Str::slug($request->title)
        ]);

        return redirect()->route('home.index')->with('status', 'Artikel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $home)
    {
        $home->delete();

        $path = public_path('storage/thumbnail/') . $home->image;
        if (File::exists($path) && $home->image != 'default.png') {
            File::delete($path);
        }
        return redirect()->route('home.index')->with('status', 'Artikel berhasil dihapus');
    }
}
