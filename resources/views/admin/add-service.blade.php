@extends('main/admin-main')

@section('container')
        <h5 class="fw-bold">TAMBAH SERVICE TEMPAT PRINTING</h5>
        @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3">
                        {{ session('success') }}
                </div>
        @endif
        <form class="mt-3" action="/admin/add-service" method="POST">
                @csrf
                <div class="mb-3">
                        <div>
                                <label for="nama" class="form-label">NAMA TEMPAT PRINTING</label>
                                <select class="form-select @error('id_tempat_printing') is-invalid @enderror" id="nama" name="id_tempat_printing">
                                        <option selected>Open this select menu</option>
                                        @foreach($printings as $printing)
                                                <option value="{{ $printing->id }}" class="text-uppercase">{{ $printing->nama }}</option>
                                        @endforeach
                                </select>
                                <span class="invalid-feedback">@error('id_tempat_printing'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <div>
                                <label for="layanan" class="form-label">LAYANAN YANG DISEDIAKAN</label>
                                <select class="form-select @error('id_service') is-invalid @enderror" id="layanan" name="id_service">
                                        <option selected>Open this select menu</option>
                                        @foreach($services as $service)
                                                <option value="{{ $service->id }}" class="text-uppercase">{{ $service->nama_service }}</option>
                                        @endforeach
                                </select>
                                <span class="invalid-feedback">@error('id_service'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <div>
                                <label for="bahan" class="form-label">JENIS BAHAN</label>
                                <select class="form-select @error('id_bahan') is-invalid @enderror" id="bahan" name="id_bahan">
                                        <option selected>Open this select menu</option>
                                        @foreach($materials as $material)
                                                <option value="{{ $material->id }}" class="text-uppercase">{{ $material->nama_bahan }}</option>
                                        @endforeach
                                </select>
                                <span class="invalid-feedback">@error('id_bahan'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <div>
                                <label for="ukuran" class="form-label">JENIS UKURAN</label>
                                <select class="form-select @error('id_ukuran') is-invalid @enderror" id="ukuran" name="id_ukuran">
                                        <option selected>Open this select menu</option>
                                        @foreach($sizes as $size)
                                                <option value="{{ $size->id }}" class="text-uppercase">{{ $size->jenis_ukuran }}</option>
                                        @endforeach
                                </select>
                                <span class="invalid-feedback">@error('id_ukuran'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <label for="harga" class="form-label">HARGA</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
                        <span class="invalid-feedback">@error('harga'){{$message}}@enderror</span>
                </div>
                <div class="row align-items-start">
                        <div class="col-lg-4">
                                <div class="mb-3">
                                        <label for="bobot_jenis_layanan" class="form-label">BOBOT JENIS LAYANAN</label>
                                        <input type="number" class="form-control @error('bobot_jenis_layanan') is-invalid @enderror" id="bobot_jenis_layanan" name="bobot_jenis_layanan" value="{{ old('bobot_jenis_layanan') }}">
                                        <span class="invalid-feedback">@error('bobot_jenis_layanan'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-4">
                                <div class="mb-3">
                                        <label for="bobot_bahan" class="form-label">BOBOT BAHAN</label>
                                        <input type="number" class="form-control @error('bobot_bahan') is-invalid @enderror" id="bobot_bahan" name="bobot_bahan" value="{{ old('bobot_bahan') }}">
                                        <span class="invalid-feedback">@error('bobot_bahan'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-4">
                                <div class="mb-3">
                                        <label for="bobot_harga" class="form-label">BOBOT HARGA</label>
                                        <input type="number" class="form-control @error('bobot_harga') is-invalid @enderror" id="bobot_harga" name="bobot_harga" value="{{ old('bobot_harga') }}">
                                        <span class="invalid-feedback">@error('bobot_harga'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="row justify-content-center">
                        <div class="col-lg-4">
                                <div class="mb-3">
                                        <label for="bobot_respon" class="form-label">BOBOT RESPON</label>
                                        <input type="number" class="form-control @error('bobot_respon') is-invalid @enderror" id="bobot_respon" name="bobot_respon" value="{{ old('bobot_respon') }}">
                                        <span class="invalid-feedback">@error('bobot_respon'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-4">
                                <div class="mb-3">
                                        <label for="bobot_ukuran" class="form-label">BOBOT UKURAN</label>
                                        <input type="number" class="form-control @error('bobot_ukuran') is-invalid @enderror" id="bobot_ukuran" name="bobot_ukuran" value="{{ old('bobot_ukuran') }}">
                                        <span class="invalid-feedback">@error('bobot_ukuran'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="d-flex justify-content-end mt-3"> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>  
        </form>
@endsection
