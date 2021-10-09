<?php

namespace App\Http\Controllers;

use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::limit(3)->latest()->get();
        return view('dashboard.index', compact('articles'));
    }
    public function show(Article $article)
    {
        return view('dashboard.show', compact('article'));
    }
    public function visi_misi()
    {
        return view('dashboard.visi-misi');
    }
    public function artikel()
    {
        $articles = Article::latest()->simplePaginate(12);
        return view('dashboard.artikel', compact('articles'));
    }
    public function website_bpptik()
    {
        return view('dashboard.website-bpptik');
    }
    public function tugas_fungsi()
    {
        return view('dashboard.tugas-fungsi');
    }
}
