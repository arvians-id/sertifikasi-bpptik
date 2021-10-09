@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ Str::title($article->title) }}</h1>
        <img src="/storage/thumbnail/{{ $article->image }}" class="img-fluid mx-auto d-block img-thumbnail" width="500"
            alt="">
        <hr>
        <p>
            {!! $article->body !!}
        </p>
    </div>
@endsection
