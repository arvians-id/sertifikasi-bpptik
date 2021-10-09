@extends('layouts.app')

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/img1.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="/images/img2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="/images/img3.jpg" class="d-block w-100">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <div class="py-5">
            <div class="row text-center">
                <div class="col-12 mb-4">
                    <h1>Lembaga Sertifikasi Profesi</h1>
                    <h4>Mengapa Kami ?</h4>
                    <h5>Karena komitmen kami untuk meningkatkan kebertrimaan Sertifikat Kompetensi
                        oleh industri baik di tingkat nasional maupun internasional. </h5>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <div class="card border-0 bg-transparent text-center" style="width: 18rem;">
                        <i class="fa fa-scroll display-4 text-info"></i>
                        <div class="card-body">
                            <h5 class="card-title">36 Skema Sertifikasi</h5>
                            <p class="card-text">Skema / Profesi / Jabatan / Pekerjaan di bidang-bidang strategis
                                sektor Teknologi Informasi dan Komunikasi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <div class="card border-0 bg-transparent text-center" style="width: 18rem;">
                        <i class="fa fa-drafting-compass display-4 text-info"></i>
                        <div class="card-body">
                            <h5 class="card-title">300++ Link DUDI</h5>
                            <p class="card-text">Perusahaan mitra LSP yang siap untuk menerima profesional bidang IT
                                yang telah tersertifikasi, kompeten dan sesuai bidang keahliannya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center">
                    <div class="card border-0 bg-transparent text-center" style="width: 18rem;">
                        <i class="fa fa-drafting-compass display-4 text-info"></i>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of
                                the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center mt-5">
                <div class="col-12 mb-4">
                    <h4>Artikel</h4>
                </div>
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
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('artikel') }}" class="btn btn-outline-dark">Tampilkan lebih banyak</a>
            </div>
        </div>
    </div>
@endsection
