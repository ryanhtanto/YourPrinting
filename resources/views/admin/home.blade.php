@extends('main/admin-main')

@section('container')
  <section>
    <h3 class="fw-bold">DAFTAR TEMPAT PRINTING</h3>
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
      </div>
    @endif
    @foreach ($printings as $printing)
      <div class="card mb-3 border">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://source.unsplash.com/500x300?technology" class="img-fluid rounded-start" alt="banner-printing">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title text-uppercase fw-bold">{{ $printing->nama }}</h5>
              <p class="card-text">{{ $printing->alamat }}</p>
              <div>
                <a class="btn btn-dark text-decoration-none text-white" href="../admin/detail/{{ $printing->id }}"><span class="py-5 px-4">Detail</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
     @endforeach
  </section>
@endsection