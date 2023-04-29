@extends('main/admin-main')

@section('container')
        <section>
                <div class="col-lg-6">
                        <h5 class="fw-bold">DAFTAR NAMA SERVICE</h5>
                        <form class="mt-3" action="/admin/layanan" method="POST">
                                @csrf
                                <div class="mb-3">
                                        <label for="add-layanan" class="form-label">TAMBAH NAMA LAYANAN</label>
                                        <input type="text" class="form-control @error('nama_service') is-invalid @enderror" id="add-layanan" name="nama_service" value="{{ old('nama_service') }}" >
                                        <span class="invalid-feedback">@error('nama_service'){{$message}}@enderror</span>
                                </div>
                                <button type="submit" class="btn btn-primary">ADD SERVICE NAME</button>
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
                                                <th scope="col">Layanan Yang Disediakan</th>
                                                <th scope="col">Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach ($services as $service)
                                                <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td class="text-uppercase">{{$service->nama_service}}</td>
                                                        <td>
                                                                <div class="d-flex">
                                                                        <a class="btn btn-warning text-decoration-none" href="../admin/edit-service"><i class="fa-sharp fa-solid fa-pencil"></i></i></a>
                                                                        <a class="btn btn-danger text-decoration-none mx-2" href="../admin/edit-service"><i class="fa-solid fa-trash-can"></i></a>
                                                                </div>
                                                        </td>
                                                </tr>
                                        @endforeach
                                </tbody>
                        </table>
                </div>
        </section>
@endsection