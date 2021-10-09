@extends('layouts.app-auth')

@section('content')
    <div class="container">
        <a href="{{ route('home.index') }}" class="btn btn-primary mb-2">Data Artikel</a>
        <div class="card">
            <div class="card-header">{{ isset($home) ? 'Ubah' : 'Tambah' }} Artikel</div>

            <div class="card-body">
                <form action="{{ isset($home) ? route('home.update', ['home' => $home->slug]) : route('home.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ isset($home) ? method_field('PUT') : '' }}
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', isset($home->title) ? $home->title : '') }}" name="title">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-9">
                            <textarea name="body" class="form-control my-editor">{!! old('body', isset($home->body) ? $home->body : '') !!}</textarea>
                        </div>
                        <div class="col-12 col-xl-3">
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image"><small class="text-info">
                                    {{ isset($home) ? '* Abaikan jika tidak ingin diubah' : '' }}</small>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-success btn-block">Publish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js"></script>
    <script>
        var editor_config = {
            height: 500,
            path_absolute: "/",
            selector: 'textarea.my-editor',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + 'media?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            },
            image_class_list: [{
                title: 'img-fluid',
                value: 'img-fluid'
            }]
        };
        tinymce.init(editor_config);
    </script>
@endpush
