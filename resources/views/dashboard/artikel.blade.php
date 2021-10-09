@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Artikel</h1>

        <div class="row text-center mb-5">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 d-flex justify-content-center mt-2">
                    <div class="card bg-transparent" style="width: 25rem;">
                        <img src="/storage/thumbnail/{{ $article->image }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::title(Str::limit($article->title, 30, '...')) }}</h5>
                            <p class="card-text">{!! Str::limit($article->body, 200, '...') !!}</p>
                            <a href="{{ route('show', ['article' => $article->slug]) }}" class="btn btn-primary">Lihat
                                Artikel</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 mt-5">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
