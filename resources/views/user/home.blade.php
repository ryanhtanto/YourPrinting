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
                <div class="col-lg-6 col-md-12 sol-sm-12 border">
                        <img src="https://source.unsplash.com/500x300?technology" class="card-img-top" alt="banner">
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
                                <div class="col-lg-4 d-flex align-items-center justify-content-center border">
                                        <div>
                                                <img src="https://source.unsplash.com/300x300?technology" class="card-img-top" alt="banner">
                                                <h5 class="text-center"><a class="text-decoration-none text-dark text-uppercase" href="../detail/{{{ $printing->id }}}">{{ $printing->nama }}</a></h5>
                                        </div>
                                </div>
                        @endforeach
                </div>
        </div>
    </section>
@endsection