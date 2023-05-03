@extends('main/admin-main')

@section('container')
        <section>
                <div class="col-lg-6">
                        <h5 class="fw-bold">DAFTAR JENIS UKURAN</h5>
                        <form class="mt-3" action="/admin/ukuran" method="POST">
                                @csrf
                                <div class="mb-3">
                                        <label for="add-ukuran" class="form-label">TAMBAH JENIS UKURAN</label>
                                        <input type="text" class="form-control @error('jenis_ukuran') is-invalid @enderror" id="add-ukuran" name="jenis_ukuran" value="{{ old('jenis_ukuran') }}" >
                                        <span class="invalid-feedback">@error('jenis_ukuran'){{$message}}@enderror</span>
                                </div>
                                <button type="submit" class="btn btn-primary">ADD SIZE</button>
                        </form>     
                        @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3">
                                        {{ session('success') }}
                                </div>
                        @endif
                        <table class="table mt-4">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Jenis Ukuran</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach ($sizes as $size)
                                                <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td class="text-uppercase">{{$size->jenis_ukuran}}</td>
                                                        <td>
                                                                <div class="d-flex">
                                                                        <a class="btn btn-warning text-decoration-none" href="../admin/edit-ukuran/{{$size->id}}"><i class="fa-sharp fa-solid fa-pencil"></i></i></a>
                                                                        <a class="btn btn-danger text-decoration-none mx-2" href="../admin/delete-ukuran/{{$size->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                                                </div>
                                                        </td>
                                                </tr>
                                        @endforeach
                                </tbody>
                        </table>
                </div>
        </section>
@endsection