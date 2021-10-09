@extends('layouts.app-auth')

@section('content')
    <div class="container">
        <a href="{{ route('home.index') }}" class="btn btn-primary mb-2">Data Artikel</a>
        <div class="card">
            <div class="card-header">{{ $home->title }}</div>
            <div class="card-body">
                <h1>{{ Str::title($home->title) }}</h1>
                <a href="{{ route('home.edit', ['home' => $home->slug]) }}" class="btn btn-info btn-sm">Ubah</a>
                <form action="{{ route('home.destroy', ['home' => $home->slug]) }}" class="d-inline" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this article?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger d-inline btn-sm">Hapus</button>
                </form>
                <hr>
                <img src="/storage/thumbnail/{{ $home->image }}" class="img-fluid mx-auto d-block img-thumbnail" alt="">
                <p>
                    {!! $home->body !!}
                </p>
            </div>
        </div>
    </div>
@endsection
