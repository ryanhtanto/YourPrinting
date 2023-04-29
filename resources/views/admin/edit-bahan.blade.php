@extends('main/admin-main')

@section('container')
        <section>
                <div class="col-lg-6">
                        <h5 class="fw-bold">DAFTAR NAMA BAHAN</h5>
                        <form class="mt-3" action="../../admin/bahan/{{$material->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                        <label for="add-bahan" class="form-label">EDIT NAMA BAHAN</label>
                                        <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" name="nama_bahan" id="add-bahan" value="{{ $material->nama_bahan }}">
                                        <span class="invalid-feedback">@error('nama_bahan'){{$message}}@enderror</span>
                                </div>
                                <button type="submit" class="btn btn-primary">EDIT MATERIAL NAME</button>
                        </form>
                </div>
        </section>
        
@endsection