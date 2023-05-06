@extends('main/admin-main')

@section('container')
        <section>       
                <h5 class="fw-bold">DETAIL TEMPAT PRINTING</h5>
                <a class="text-end text-decoration-none text-white" href="../../admin/edit-detail/{{$printing->id}}"><span class="btn btn-dark">EDIT DETAIL</span></a>
                <div class="row">
                        <div class="col-lg-6">
                                <h3 class="fw-bold text-uppercase">{{$printing->nama}}</h3>
                                <div class="d-flex">
                                        <p>Longitude : {{$printing->longitude}}</p>
                                        <p class="mx-2">Latitude : {{$printing->latitude}}</p>
                                </div>
                                <div class="col-lg-8 col-sm-12 col-md-">
                                        <div class="d-flex">
                                                <i class="fa-brands fa-whatsapp mt-2"></i>
                                                <p class="mb-0 mx-2">{{$printing->no_hp}}</p>
                                        </div>
                                        <div class="d-flex">
                                                <i class="fa-solid fa-location-dot mt-2"></i>
                                                <p class="mt-0 mx-2">{{$printing->alamat}}</p>
                                        </div>
                                </div>
                                <h6 class="fw-bold">Bobot Alternatif Tempat Printing</h6>
                                @foreach ($daftarServices->daftarService as $daftar)
                                        <p class="m-0">Jenis Layanan: {{ $daftar->bobot_jenis_layanan }}</p>
                                        <p class="m-0">Bahan: {{ $daftar->bobot_bahan }}</p>
                                        <p class="m-0">Harga: {{ $daftar->bobot_harga }}</p>
                                        <p class="m-0">Respon: {{ $daftar->bobot_respon }}</p>
                                        <p class="m-0">Ukuran: {{ $daftar->bobot_ukuran }}</p>   
                                        @break   
                                @endforeach
                        </div>
                        <div class="col-lg-6">
                                <img src="https://source.unsplash.com/500x300?technology" class="card-img-top" alt="banner"> 
                        </div>
                </div>
        </section>
        <section>
                <div class="mt-5">
                        <h5 class="fw-bold text-uppercase">Layanan {{$printing->nama}}</h5>
                        <div class="justify-content-end">
                                <a class="text-end text-decoration-none text-white" href="../../admin/add-service"><span class="btn btn-dark">Tambah Layanan</span></a>
                        </div>
                </div>
                @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3">
                                {{ session('success') }}
                        </div>
                @endif
                <table class="table">
                        <thead>
                                <tr>
                                        <th scope="col">Layanan</th>
                                        <th scope="col">Jenis Bahan</th>
                                        <th scope="col">Ukuran</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>
                                                @foreach ($services->service as $serviceList)
                                                        <p>{{ $serviceList->nama_service }}</p>
                                                @endforeach
                                        </td>
                                        <td>
                                                @foreach ($materials->material as $materialList)
                                                        <p>{{ $materialList->nama_bahan }}</p>
                                                @endforeach
                                        </td>
                                        <td>
                                                @foreach ($sizes->size as $jenisUkuran)
                                                        <p>{{ $jenisUkuran->jenis_ukuran }}</p>
                                                @endforeach
                                        </td>
                                        <td>
                                                @foreach ($daftarServices->daftarService as $daftar)
                                                        <p>Rp. {{ $daftar->harga }}</p>
                                                @endforeach
                                        </td>
                                        <td>
                                                @foreach ($daftarServices->daftarService as $daftar)
                                                        <div class="d-flex mb-1">
                                                                <a class="btn btn-warning text-decoration-none" href="../../admin/edit-service/{{ $daftar->id }}"><i class="fa-sharp fa-solid fa-pencil"></i></i></a>
                                                                <a class="btn btn-danger text-decoration-none mx-2" href="../../admin/delete-service/{{ $daftar->id }}"><i class="fa-solid fa-trash-can"></i></a>
                                                        </div>
                                                @endforeach
                                        </td>
                                </tr>
                        </tbody>
                </table>
        </section>
@endsection