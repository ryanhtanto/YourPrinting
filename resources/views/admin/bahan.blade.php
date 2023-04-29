@extends('main/admin-main')

@section('container')
        <section>
                <div class="col-lg-6">
                        <h5 class="fw-bold">DAFTAR NAMA BAHAN</h5>
                        <form class="mt-3" action="admin/bahan" method="POST">
                                @csrf
                                <div class="mb-3">
                                        <label for="add-bahan" class="form-label">TAMBAH NAMA BAHAN</label>
                                        <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" name="nama_bahan" id="add-bahan" value="{{ old('nama_bahan') }}">
                                        <span class="invalid-feedback">@error('nama_bahan'){{$message}}@enderror</span>
                                </div>
                                <button type="submit" class="btn btn-primary">ADD MATERIAL NAME</button>
                        </form>
                        @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3">
                                        {{ session('success') }}
                                </div>
                        @endif
                        <table class="table mt-4">
                                <thead>
                                        <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Bahan</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach($materials as $material)
                                                <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td class="text-uppercase">{{$material->nama_bahan}}</td>
                                                        <td>
                                                                <div class="d-flex">
                                                                        <a class="btn btn-warning text-decoration-none" href="../admin/edit-bahan/{{$material->id}}"><i class="fa-sharp fa-solid fa-pencil"></i></i></a>
                                                                        <a class="btn btn-danger text-decoration-none mx-2" href="../admin/delete-bahan/{{$material->id}}"><i class="fa-solid fa-trash-can"></i></a>
                                                                </div>
                                                        </td>
                                                </tr>
                                        @endforeach
                                </tbody>
                        </table>
                </div>
        </section>
@endsection