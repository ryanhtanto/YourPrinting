@extends('main/admin-main')

@section('container')
        <section>
                <div class="col-lg-6">
                        <h5 class="fw-bold">DAFTAR NAMA SERVICE</h5>
                        <form class="mt-3" action="/admin/layanan/{{$service->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                        <label for="add-layanan" class="form-label">EDIT NAMA LAYANAN</label>
                                        <input type="text" class="form-control @error('nama_service') is-invalid @enderror" id="add-layanan" name="nama_service" value="{{ $service->nama_service }}" >
                                        <span class="invalid-feedback">@error('nama_service'){{$message}}@enderror</span>
                                </div>
                                <button type="submit" class="btn btn-primary">EDIT SERVICE NAME</button>
                        </form>     
                </div>
        </section>
@endsection