@extends('main/main')

@section('container')
        <section>
                <div class="row justify-content-center mt-5">
                        <h3 class="text-center fw-bold">HASIL REKOMENDASI TEMPAT PRINTING</h3>
                        <div class="col-lg-6 text-center">
                                <p>Berdasarkan kriteria yang sudah anda masukkan, maka hasil rekomendasi tempat printing terbaik akan dijabarkan dibawah ini</p>
                        </div>
                </div>
                <table class="table mt-5">
                        <thead>
                                <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Tempat</th>
                                        <th scope="col">Jenis Layanan</th>
                                        <th scope="col">Ukuran</th>
                                        <th scope="col">Harga</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <th scope="row">1</th>
                                        <td>Lorem Ipsum Dolor</td>
                                        <td>Document Printing</td>
                                        <td>A4</td>
                                        <td>Rp. 2000</td>
                                </tr>
                        </tbody>
                </table>
        </section>
@endsection