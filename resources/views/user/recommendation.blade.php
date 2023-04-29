@extends('main/main')

@section('container')
        <h3 class="fw-bold">REKOMENDASI TEMPAT <br>PRINTING</h3>
        <div class="mt-3">
                <p class="fw-bold text-uppercase">Jenis Layanan</p>
                <div class="row">
                        @foreach ($services as $service)
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label text-lowercase" for="flexRadioDefault1">
                                                {{ $service->nama_service }}
                                        </label>
                                </div>
                        @endforeach
                </div>
        </div>
        <div class="mt-5">
                <p class="fw-bold text-uppercase">Jenis Bahan</p>
                <div class="row">
                        @foreach ($materials as $material)
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label text-lowercase" for="flexRadioDefault1">
                                                {{ $material->nama_bahan }}
                                        </label>
                                </div>
                        @endforeach
                </div>
        </div>
        <div class="mt-5">
                <p class="fw-bold text-uppercase">Ukuran</p>
                <div class="row">
                        @foreach ($sizes as $size)
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                                {{ $size->jenis_ukuran }}
                                        </label>
                                </div>
                        @endforeach
                </div>
        </div>
@endsection