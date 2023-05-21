@extends('main/main')

@section('container')
        @if (count($places) > 0)
                <section>
                        <h3 class="fw-bold text-center mt-5">HASIL REKOMENDASI TEMPAT PRINTING</h3>
                        <p class="text-center">Berdasarkan kriteria yang sudah anda masukkan, maka <br> hasil rekomendasi tempat printing terbaik akan dijabarkan dibawah ini</p>
                        <div class="row container mt-5">
                                @foreach ($places as $place)
                                        <div class="col-lg-4 mb-5">
                                                <div class="card">
                                                        {{-- <img src="{{ asset('images/'. $place->picture)}}" class="card-img-top" alt="place-list_img"> --}}
                                                        <div class="card-body">
                                                                <h5 class="card-title">{{ $place->nama }}</h5>
                                                                <p class="card-text m-0">Jenis Layanan: {{ $place->nama_service }}</p>
                                                                <p class="card-text m-0">Harga: Rp. {{ number_format($place->harga) }}</p>
                                                                <p class="card-text m-0"><i class="fa-brands fa-whatsapp"></i> {{ $place->no_hp }}</p>
                                                                <div class="d-flex">
                                                                        <a href="https://www.google.com/maps/search/?api=1&query={{ $place->nama }}">
                                                                                <img src="{{ asset('maps.png')}}" class="card-img-top" alt="maps-icon" style="width: 20px">
                                                                        </a>
                                                                        <p class="m-0 ">{{ $place->alamat }}</p>
                                                                </div>
                                                                <p style="font-size: 10px" class="m-0">*Click the maps logo to direct you to google maps</p>
                                                                <a href="../detail/{{{ $place->id }}}" class="text-decoration-none fw-bold text-dark">Detail..</a>
                                                        </div>
                                                </div>
                                        </div>
                                @endforeach
                        </div>
                        
                </section>
        @else
            <section>
                <h3 class="fw-bold text-center">MOHON MAAF</h3>
                <p class="text-center">Jenis layanan, bahan, ukuran, dan harga yang anda pilih tidak ada di dalam sistem</p>
            </section>
        @endif
        
@endsection