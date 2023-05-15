@extends('main/main')

@section('container')
    <section>
        <div class="row mt-5">
                <div class="col-lg-6 col-md-12 sol-sm-12 mt-5">
                        <div class="mt-5">
                                <h1 class="fw-bold">
                                        SISTEM REKOMENDASI TEMPAT PRINTING UNTUK ANDA
                                </h1>
                                <p>
                                        Sistem ini akan merekomendasikan tempat printing sesuai dengan kriteria yang anda cari!
                                </p>
                                <button type="button" class="btn btn-dark"><span class="py-5 px-4">Cara Kerja</span></button>
                        </div>
                        
                </div>
                <div class="col-lg-6 col-md-12 sol-sm-12">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                        <div class="carousel-item active">
                                                <img src="{{ asset('images/banner-2.jpg') }}" class="d-block w-100" alt="banner">
                                        </div>
                                        <div class="carousel-item">
                                                <img src="{{ asset('images/banner-2.jpg') }}" class="d-block w-100" alt="banner">
                                        </div>
                                        <div class="carousel-item">
                                                <img src="{{ asset('images/banner-3.jpg') }}" class="d-block w-100" alt="banner">
                                        </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                </button>
                        </div>
                        {{-- <img src="https://source.unsplash.com/500x300?technology" class="card-img-top" alt="banner"> --}}
                </div>
        </div>
    </section>
    <section>
        <div class="mt-5">
                <h1 class="fw-bold">
                        DAFTAR TEMPAT PRINTING
                </h1>
                <div class="row container mt-5">
                        @foreach ($printings as $printing)
                                <div class="col-lg-4 mb-5">
                                        <div class="card">
                                                <img src="{{ asset('images/'. $printing->picture)}}" class="card-img-top" alt="printing-list_img">
                                                <div class="card-body">
                                                        <h5 class="card-title">{{ $printing->nama }}</h5>
                                                        <p class="card-text">{{ $printing->alamat }}</p>
                                                        <a href="../detail/{{{ $printing->id }}}" class="text-decoration-none fw-bold text-dark">Detail..</a>
                                                </div>
                                        </div>
                                </div>
                        @endforeach
                </div>
        </div>
    </section>
@endsection