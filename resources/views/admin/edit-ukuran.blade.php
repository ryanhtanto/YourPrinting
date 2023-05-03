@extends('main/admin-main')

@section('container')
        <section>
                <div class="col-lg-6">
                        <h5 class="fw-bold">DAFTAR JENIS UKURAN</h5>
                        <form class="mt-3" action="/admin/edit-ukuran/{{$size->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                        <label for="edit-ukuran" class="form-label">EDIT JENIS UKURAN</label>
                                        <input type="text" class="form-control @error('jenis_ukuran') is-invalid @enderror" id="edit-ukuran" name="jenis_ukuran" value="{{$size->jenis_ukuran}}" >
                                        <span class="invalid-feedback">@error('jenis_ukuran'){{$message}}@enderror</span>
                                </div>
                                <button type="submit" class="btn btn-primary">EDIT SIZE</button>
                        </form>     
                </div>
        </section>
@endsection