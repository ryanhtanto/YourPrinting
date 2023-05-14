@extends('main/main')

@section('container')
        @if (count($places) > 0)
                <section>
                        <h3 class="fw-bold text-center">HASIL REKOMENDASI TEMPAT PRINTING</h3>
                        <p class="text-center">Berdasarkan kriteria yang sudah anda masukkan, maka <br> hasil rekomendasi tempat printing terbaik akan dijabarkan dibawah ini</p>
                        <div class="row">
                                <div class="">
                                        <table class="table">
                                                <thead>
                                                        <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Nama Tempat </th>
                                                                {{-- <th scope="col">Alamat</th>
                                                                <th scope="col">No Hp</th> --}}
                                                                <th scope="col">Jenis Layanan</th>
                                                                <th scope="col">Jenis Bahan</th>
                                                                <th scope="col">Ukuran</th>
                                                                <th scope="col">Harga</th>
                                                                {{-- <th scope="col">Jarak</th> --}}
                                                                {{-- <th scope="col">Link Maps</th> --}}
                                                                <th scope="col">Hasil Vektor</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach($places as $place)
                                                                <tr>
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td>{{ $place->nama}}</td>
                                                                        {{-- <td>{{ $place->alamat}}</td>
                                                                        <td>{{ $place->no_hp}}</td> --}}
                                                                        <td>{{ $place->nama_service}}</td>
                                                                        <td>{{ $place->nama_bahan}}</td>
                                                                        <td>{{ $place->jenis_ukuran}}</td>
                                                                        <td>Rp. {{ number_format($place->harga) }}</td>
                                                                        {{-- <td>{{ round($place->distance,2)}} KM</td> --}}
                                                                        {{-- <td>
                                                                                <a href="https://www.google.com/maps/search/?api=1&query={{ $place->latitude}},{{ $place->longitude}}">Link Maps</a>
                                                                                <a href="https://www.google.com/maps/search/?api=1&query={{ $place->nama }}">Link Maps</a>
                                                                        </td> --}}
                                                                        <td>{{ round($place->weightedValue, 2)}}</td>
                                                                </tr>
                                                        @endforeach
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </section>
        @else
            <section>
                <h3 class="fw-bold text-center">MOHON MAAF</h3>
                <p class="text-center">Jenis layanan, bahan, ukuran, dan harga yang anda pilih tidak ada di dalam sistem</p>
            </section>
        @endif
        
@endsection