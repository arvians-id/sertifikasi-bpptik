@extends('layouts.app-auth')

@section('content')
    <div class="container">
        <a href="{{ route('home.create') }}" class="btn btn-primary mb-2">Tambah Artikel</a>
        <div class="card">
            <div class="card-header">Data Artikel</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%">No</th>
                            <th>judul</th>
                            <th class="text-center" style="width: 30%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $article->title }}</td>
                                <td class="text-center">
                                    <a href="{{ route('home.show', ['home' => $article->slug]) }}"
                                        class="btn btn-primary btn-sm">Detail</a>
                                    <a href="{{ route('home.edit', ['home' => $article->slug]) }}"
                                        class="btn btn-info btn-sm">Ubah</a>
                                    <form action="{{ route('home.destroy', ['home' => $article->slug]) }}"
                                        class="d-inline" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger d-inline btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@push('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
