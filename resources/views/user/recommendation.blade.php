@extends('main/main')

@section('container')
        <h3 class="fw-bold">REKOMENDASI TEMPAT <br>PRINTING</h3>
        <form method="POST" action="/recommendation">
                @csrf
                <div class="mt-3">
                        <p class="fw-bold text-uppercase">Jenis Layanan</p>
                        <div class="row">
                                @foreach ($services as $service)
                                        <div class="col-lg-4">
                                                <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="id_service" id="{{ $service->id }}" value="{{ $service->id }}">
                                                        <label class="form-check-label text-uppercase" for="{{ $service->id }}">
                                                                {{ $service->nama_service }}
                                                        </label>
                                                </div>
                                        </div>
                                @endforeach
                        </div>
                </div>
                <div class="mt-5">
                        <p class="fw-bold text-uppercase">Jenis Bahan</p>
                        <div class="row">
                                @foreach ($materials as $material)
                                        <div class="col-lg-4">
                                                <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="id_bahan" id="{{ $material->nama_bahan }}" value="{{ $material->id }}">
                                                        <label class="form-check-label text-uppercase" for="{{ $material->nama_bahan }}">
                                                                {{ $material->nama_bahan }}
                                                        </label>
                                                </div>
                                        </div>
                                @endforeach
                        </div>
                </div>
                <div class="mt-5">
                        <p class="fw-bold text-uppercase">Ukuran</p>
                        <div class="row">
                                @foreach ($sizes as $size)
                                        <div class="col-lg-4">
                                                <input class="form-check-input" type="radio" name="id_ukuran" id="{{ $size->id }}" value="{{ $size->id }}">
                                                <label class="form-check-label" for="{{ $size->id }}">
                                                        {{ $size->jenis_ukuran }}
                                                </label>
                                        </div>
                                @endforeach
                        </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
@endsection