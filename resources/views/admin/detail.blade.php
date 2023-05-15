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
                                <p class="m-0">Jenis Layanan: {{ $printing->bobot_jenis_layanan }}</p>
                                <p class="m-0">Bahan: {{ $printing->bobot_bahan }}</p>
                                <p class="m-0">Harga: {{ $printing->bobot_harga }}</p>
                                <p class="m-0">Respon: {{ $printing->bobot_respon }}</p>
                                <p class="m-0">Ukuran: {{ $printing->bobot_ukuran }}</p>   
                        </div>
                        <div class="col-lg-6">
                                <img src="{{ asset('images/'. $printing->picture)}}" class="card-img-top d-flex justify-content-center align-items-center" alt="banner" style="width: 50%"> 
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
                                @foreach ($daftarServices as $daftarService)
                                        <tr>
                                                <th>{{ $daftarService->nama_service }}</th>
                                                <td>{{ $daftarService->nama_bahan }}</td>
                                                <td>{{ $daftarService->jenis_ukuran }}</td>
                                                <td>Rp. {{ $daftarService->harga }}</td>
                                                <td>
                                                        <a class="btn btn-warning text-decoration-none" href="../../admin/edit-service/{{ $daftarService->id_service }}"><i class="fa-sharp fa-solid fa-pencil"></i></i></a>
                                                        <a class="btn btn-danger text-decoration-none mx-2" href="../../admin/delete-service/{{ $daftarService->id_service }}"><i class="fa-solid fa-trash-can"></i></a>  
                                                </td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>
        </section>
@endsection