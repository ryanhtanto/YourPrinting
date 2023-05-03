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
                                <div>
                                        <p class="fw-bold mb-0">Bobot Alternatif Tempat Printing</p>
                                        <p class="m-0">Jenis Layanan : {{$printing->jenis_layanan}}</p>
                                        <p class="m-0">Bahan : {{$printing->bahan}}</p>
                                        <p class="m-0">Harga : {{$printing->harga}}</p>
                                        <p class="m-0">Respon : {{$printing->respon}}</p>
                                        <p class="m-0">Ukuran : {{$printing->ukuran}}</p>
                                </div>
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
                <div class="row mt-3">
                        <div class="col-lg-4 col-md-5 col-sm-5">
                                <h5 class="fw-bold">Layanan</h5>
                                @foreach ($services->service as $serviceList)
                                        <p>{{ $serviceList->nama_service }}</p>
                                @endforeach
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-3">
                                <h5 class="fw-bold">Jenis Bahan</h5>
                                @foreach ($materials->material as $materialList)
                                        <p>{{ $materialList->nama_bahan }}</p>
                                @endforeach
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                                <h5 class="fw-bold">Ukuran</h5>
                                @foreach ($sizes->size as $jenisUkuran)
                                        <p>{{ $jenisUkuran->jenis_ukuran }}</p>
                                @endforeach
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                                <h5 class="fw-bold">Harga</h5>
                                @foreach ($daftarServices->daftarService as $daftar)
                                        <p>Rp. {{ $daftar->harga }}</p>
                                @endforeach
                        </div>
                        
                        <div class="col-lg-2 col-md-2 col-sm-2">
                                <h5 class="fw-bold">Action</h5>
                                @foreach ($daftarServices->daftarService as $daftar)
                                        <div class="d-flex mb-1">
                                                <a class="btn btn-warning text-decoration-none" href="../../admin/edit-service/{{ $daftar->id }}"><i class="fa-sharp fa-solid fa-pencil"></i></i></a>
                                                <a class="btn btn-danger text-decoration-none mx-2" href="../../admin/delete-service/{{ $daftar->id }}"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                @endforeach
                        </div>
                </div>
        </section>
@endsection