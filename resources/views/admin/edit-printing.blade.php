@extends('main/admin-main')

@section('container')
        <h5 class="fw-bold text-uppercase">EDIT DETAIL {{ $detailPrinting->nama }}</h5>
        <form class="mt-3" action="../../admin/edit-detail/{{$detailPrinting->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                        <label for="nama" class="form-label">NAMA TEMPAT PRINTING</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $detailPrinting->nama }}">
                        <span class="invalid-feedback">@error('nama'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                        <label for="alamat" class="form-label">ALAMAT</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $detailPrinting->alamat }}">
                        <span class="invalid-feedback">@error('alamat'){{$message}}@enderror</span>
                </div>
                <div class="row">
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="latitude" class="form-label">LATITUDE</label>
                                        <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ $detailPrinting->latitude }}">
                                        <span class="invalid-feedback">@error('latitude'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                        <label for="longitude" class="form-label">LONGITUDE</label>
                                        <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ $detailPrinting->longitude }}">
                                        <span class="invalid-feedback">@error('longitude'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="mb-3">
                        <label for="no_hp" class="form-label">NO. HANDPHONE / WHATSAPP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ $detailPrinting->no_hp }}">
                        <span class="invalid-feedback">@error('no_hp'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                        <label for="picture" class="form-label">PHOTO/IMAGE</label>
                        <input class="form-control form-control-sm @error('picture') is-invalid @enderror" id="picture" type="file" name="picture">
                        <span class="invalid-feedback">@error('picture'){{$message}}@enderror</span>
                </div>
                <div class="row">
                        <div class="col-lg-3 col-sm-3">
                                <div class="mb-3">
                                        <label for="jenis_layanan" class="form-label">JENIS LAYANAN</label>
                                        <input type="number" class="form-control @error('jenis_layanan') is-invalid @enderror" id="jenis_layanan" name="jenis_layanan" value="{{ $detailPrinting->jenis_layanan }}">
                                        <span class="invalid-feedback">@error('jenis_layanan'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                                <div class="mb-3">
                                        <label for="bahan" class="form-label">BAHAN</label>
                                        <input type="number" class="form-control @error('bahan') is-invalid @enderror" id="bahan" name="bahan" value="{{ $detailPrinting->bahan }}">
                                        <span class="invalid-feedback">@error('bahan'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                                <div class="mb-3">
                                        <label for="harga" class="form-label">HARGA</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ $detailPrinting->harga }}">
                                        <span class="invalid-feedback">@error('harga'){{$message}}@enderror</span>
                                </div>
                        </div>
                        <div class="col-lg-3 col-sm-3">
                                <div class="mb-3">
                                        <label for="respon" class="form-label">RESPON</label>
                                        <input type="number" class="form-control @error('respon') is-invalid @enderror" id="respon" name="respon" value="{{ $detailPrinting->respon }}">
                                        <span class="invalid-feedback">@error('respon'){{$message}}@enderror</span>
                                </div>
                        </div>
                </div>
                <div class="d-flex justify-content-end mt-3"> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>  
        </form>
@endsection