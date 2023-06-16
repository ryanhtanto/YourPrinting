@extends('main/admin-main')

@section('container')
        <h5 class="fw-bold">BOBOT KRITERIA</h5>
        <p class="m-0">Nilai bobot diberikan oleh pakar dengan nilai sebagai berikut :</p>
        @foreach ($bobots as $bobot)
                <p class="m-0">Jenis Layanan: {{ $bobot->jenis_layanan }}</p>
                <p class="m-0">Bahan: {{ $bobot->bahan }}</p>
                <p class="m-0">Harga: {{ $bobot->harga }}</p>
                <p class="m-0">Respon: {{ $bobot->respon }}</p>
                <p class="m-0">Ukuran: {{ $bobot->ukuran }}</p>
        @endforeach
        @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3">
                        {{ session('success') }}
                </div>
        @endif
        <form class="mt-3" action="/admin/bobot-kriteria/{{ $bobots[0]->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="jenis_layanan" class="form-label">BOBOT JENIS LAYANAN</label>
                                        <input type="number" class="form-control @error('jenis_layanan') is-invalid @enderror" id="jenis_layanan" name="jenis_layanan" value="{{ old('jenis_layanan') }}">
                                        <span class="invalid-feedback">@error('jenis_layanan'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="bahan" class="form-label">BOBOT BAHAN</label>
                                        <input type="number" class="form-control @error('bahan') is-invalid @enderror" id="bahan" name="bahan" value="{{ old('bahan') }}">
                                        <span class="invalid-feedback">@error('bahan'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="respon" class="form-label">BOBOT RESPON</label>
                                        <input type="number" class="form-control @error('respon') is-invalid @enderror" id="respon" name="respon" value="{{ old('respon') }}">
                                        <span class="invalid-feedback">@error('respon'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="ukuran" class="form-label">BOBOT UKURAN</label>
                                        <input type="number" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran" name="ukuran" value="{{ old('ukuran') }}">
                                        <span class="invalid-feedback">@error('ukuran'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="mb-3">
                                <label for="harga" class="form-label">BOBOT HARGA</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
                                <span class="invalid-feedback">@error('harga'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="d-flex justify-content-end mt-3"> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>  
        </form>
@endsection