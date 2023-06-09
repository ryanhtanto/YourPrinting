@extends('main/main')

@section('container')
        <section>
                <div class="row mt-5">
                        <div class="col-lg-6 col-md-12 sol-sm-12 mt-5">
                                <div class="mt-5">
                                        <h3 class="fw-bold text-uppercase">{{$printing->nama}}</h3>
                                        <div class="col-lg-8 col-sm-12 col-md-">
                                                <div class="d-flex">
                                                        <i class="fa-brands fa-whatsapp mt-2"></i>
                                                        <p class="mb-0 mx-2">{{$printing->no_hp}}</p>
                                                </div>
                                                <div class="d-flex">
                                                        <a href="https://www.google.com/maps/search/?api=1&query={{ $printing->nama }}">
                                                                <img src="{{ asset('maps.png')}}" class="card-img-top" alt="maps-icon" style="width: 20px">
                                                        </a>
                                                        <p class="m-0 ">{{ $printing->alamat }}</p>
                                                </div>
                                                <p style="font-size: 10px" class="m-0">*Click the maps logo to direct you to google maps</p>
                                        </div>
                                </div>
                        </div>
                        <div class="col-lg-6 col-md-12 sol-sm-12 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/'. $printing->picture)}}" style="width: 50%" class="card-img-top" alt="banner">
                        </div>
                </div>
        </section>
        <section>
                <div class="row mt-5">
                        <h3 class="fw-bold">LAYANAN YANG TERSEDIA</h3>
                        @foreach ($services as $service) 
                                <div class="col-lg-4 col-md-4 col-sm-6 mt-3">
                                        <p class="text-center fs-5 p-1 fw-bold" style="background-color: #43d9cf; border-radius: 20px; ">{{$service->nama_service}} </p>
                                </div>
                        @endforeach
                </div>
        </section>
@endsection