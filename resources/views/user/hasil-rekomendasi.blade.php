@extends('main/main')

@section('container')
        <section>
                <h3 class="fw-bold text-center">HASIL REKOMENDASI TEMPAT PRINTING</h3>
                <p class="text-center">Berdasarkan kriteria yang sudah anda masukkan, maka <br> hasil rekomendasi tempat printing terbaik akan dijabarkan dibawah ini</p>
                <div class="row">
                        <div class="col-lg-11">
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
                                                        </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                        </div>
                        <div class="col-lg-1">
                                <table class="table">
                                        <thead>
                                                <tr>
                                                        <th scope="col">Nilai Vektor</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($hasil_vektor as $vektor)
                                                        <tr>
                                                                <td scope="row">{{ $vektor }}</td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                        </div>
                </div>
                
        </section>
@endsection