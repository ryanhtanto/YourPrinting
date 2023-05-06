@extends('main/main')

@section('container')
        <section>
                <h3 class="fw-bold text-center">HASIL REKOMENDASI TEMPAT PRINTING</h3>
                <p class="text-center">Berdasarkan kriteria yang sudah anda masukkan, maka <br> hasil rekomendasi tempat printing terbaik akan dijabarkan dibawah ini</p>
                <table class="table">
                        <thead>
                                <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Tempat </th>
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
                                                <td>{{ $place->id_tempat_printing}}</td>
                                                <td>{{ $place->id_service}}</td>
                                                <td>{{ $place->id_bahan}}</td>
                                                <td>{{ $place->id_ukuran}}</td>
                                                <td>Rp. {{ $place->harga}}</td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>
        </section>
@endsection