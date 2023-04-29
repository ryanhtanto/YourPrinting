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
                        <label for="harga" class="form-label">HARGA</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
                        <span class="invalid-feedback">@error('harga'){{$message}}@enderror</span>
                </div>
                <div class="d-flex justify-content-end mt-3"> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>  
        </form>
@endsection