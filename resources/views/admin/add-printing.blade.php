@extends('main/admin-main')

@section('container')
        <h5 class="fw-bold">TAMBAH TEMPAT PRINTING</h5>
        <form class="mt-3" action="/admin/add-printing" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                        <label for="nama" class="form-label">NAMA TEMPAT PRINTING</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        <span class="invalid-feedback">@error('nama'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                        <label for="alamat" class="form-label">ALAMAT</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
                        <span class="invalid-feedback">@error('alamat'){{$message}}@enderror</span>
                </div>
                <div class="row">
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="longitude" class="form-label">LONGITUDE</label>
                                        <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ old('longitude') }}">
                                        <span class="invalid-feedback">@error('longitude'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="latitude" class="form-label">LATITUDE</label>
                                        <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ old('latitude') }}">
                                        <span class="invalid-feedback">@error('latitude'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="mb-3">
                        <label for="no_hp" class="form-label">NO. HANDPHONE / WHATSAPP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                        <span class="invalid-feedback">@error('no_hp'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                        <label for="picture" class="form-label">PHOTO/IMAGE</label>
                        <input class="form-control form-control-sm @error('picture') is-invalid @enderror" id="picture" type="file" name="picture">
                        <span class="invalid-feedback">@error('picture'){{$message}}@enderror</span>
                </div>
                <div class="row">
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="bobot_jenis_layanan" class="form-label">BOBOT JENIS LAYANAN</label>
                                        <input type="number" class="form-control @error('bobot_jenis_layanan') is-invalid @enderror" id="bobot_jenis_layanan" name="bobot_jenis_layanan" value="{{ old('bobot_jenis_layanan') }}">
                                        <span class="invalid-feedback">@error('bobot_jenis_layanan'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="bobot_bahan" class="form-label">BOBOT BAHAN</label>
                                        <input type="number" class="form-control @error('bobot_bahan') is-invalid @enderror" id="bobot_bahan" name="bobot_bahan" value="{{ old('bobot_bahan') }}">
                                        <span class="invalid-feedback">@error('bobot_bahan'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="bobot_respon" class="form-label">BOBOT RESPON</label>
                                        <input type="number" class="form-control @error('bobot_respon') is-invalid @enderror" id="bobot_respon" name="bobot_respon" value="{{ old('bobot_respon') }}">
                                        <span class="invalid-feedback">@error('bobot_respon'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
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