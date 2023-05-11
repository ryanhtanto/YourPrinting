@extends('main/main')

@section('container')
        <h3 class="fw-bold">REKOMENDASI TEMPAT PRINTING</h3>
        <form method="POST" action="/recommendation">
                @csrf
                <div class="mb-3">
                        <div>
                                <label for="layanan" class="form-label">JENIS LAYANAN</label>
                                <select class="form-select @error('id_service') is-invalid @enderror" id="layanan" name="id_service">
                                        <option selected value="">Open this select menu</option>
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
                                        <option selected value="">Open this select menu</option>
                                        @foreach($materials as $material)
                                                <option value="{{ $material->id }}" class="text-uppercase">{{ $material->nama_bahan }}</option>
                                        @endforeach
                                </select>
                                <span class="invalid-feedback">@error('id_bahan'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <div>
                                <label for="ukuran" class="form-label">JENIS UKURAN</label>
                                <select class="form-select @error('id_ukuran') is-invalid @enderror" id="ukuran" name="id_ukuran">
                                        <option selected value="">Open this select menu</option>
                                        @foreach($sizes as $size)
                                                <option value="{{ $size->id }}" class="text-uppercase">{{ $size->jenis_ukuran }}</option>
                                        @endforeach
                                </select>
                                <span class="invalid-feedback">@error('id_ukuran'){{$message}}@enderror</span>
                        </div>
                </div>
                {{-- <div class="mt-3">
                        <p class="fw-bold text-uppercase">Jenis Layanan</p>
                        <div class="row">
                                @foreach ($services as $service)
                                        <div class="col-lg-4">
                                                <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="id_service" id="layanan" value="{{ $service->id }}">
                                                        <label class="form-check-label text-uppercase" for="layanan">
                                                                {{ $service->nama_service }}
                                                        </label>
                                                </div>
                                        </div>
                                @endforeach
                        </div>
                </div> --}}
                {{-- <div id="filtered-data"></div>
                @if(count($hasil) > 0)
                        @foreach($hasil as $data)
                                <p>{{ $data->id_bahan }}</p>
                        @endforeach
                @else
                        <p>No data found</p>
                @endif --}}
                {{-- <div class="mt-5">
                        <p class="fw-bold text-uppercase">Jenis Bahan</p>
                        <div class="row">
                                @foreach ($materials as $material)
                                        <div class="col-lg-4">
                                                <div class="form-check" id="filtered-data">
                                                        <input class="form-check-input" type="radio" name="id_bahan" id="{{ $material->nama_bahan }}" value="{{ $material->id }}">
                                                        <label class="form-check-label text-uppercase" for="{{ $material->nama_bahan }}">
                                                                {{ $material->nama_bahan }}
                                                        </label>
                                                </div>
                                        </div>
                                @endforeach
                        </div>
                </div>
                <div class="mt-5">
                        <p class="fw-bold text-uppercase">Ukuran</p>
                        <div class="row">
                                @foreach ($sizes as $size)
                                        <div class="col-lg-4">
                                                <input class="form-check-input" type="radio" name="id_ukuran" id="{{ $size->id }}" value="{{ $size->id }}">
                                                <label class="form-check-label" for="{{ $size->id }}">
                                                        {{ $size->jenis_ukuran }}
                                                </label>
                                        </div>
                                @endforeach
                        </div>
                </div> --}}
                <div class="mb-3">
                        <div>
                                <label for="harga" class="form-label">HARGA</label>
                                <select class="form-select @error('harga') is-invalid @enderror" id="harga" name="harga">
                                        <option selected>Open this select menu</option>
                                        <option value="100000" class="text-uppercase">Rp. 0 - Rp. 100.000</option>
                                        <option value="200000" class="text-uppercase">Rp. 101.000 - Rp. 200.000</option>
                                        <option value="300000" class="text-uppercase">Rp. 301.000 - Rp. 400.000</option>
                                        <option value="500000" class="text-uppercase">Rp. 401.000 - Rp. 500.000</option>
                                        <option value="700000" class="text-uppercase">Rp. 501.000 - Rp. 707.000</option>
                                </select>
                                <span class="invalid-feedback">@error('harga'){{$message}}@enderror</span>
                        </div>
                </div>
                {{-- <div class="mt-5">
                        <p class="fw-bold text-uppercase">Harga</p>
                        <div class="row">
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="10000" value="10000">
                                        <label class="form-check-label" for="10000">
                                                Rp. 1.000 - 10.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="50000" value="50000">
                                        <label class="form-check-label" for="50000">
                                                Rp. 11.000 - 50.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="100000" value="100000">
                                        <label class="form-check-label" for="100000">
                                                Rp. 51.000 - 100.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="150000" value="150000">
                                        <label class="form-check-label" for="150000">
                                                Rp. 101.000 - 150.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="200000" value="200000">
                                        <label class="form-check-label" for="200000">
                                                Rp. 151.000 - 200.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="300000" value="300000">
                                        <label class="form-check-label" for="300000">
                                                Rp. 201.000 - 300.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="400000" value="400000">
                                        <label class="form-check-label" for="400000">
                                                Rp. 301.000 - 400.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="500000" value="500000">
                                        <label class="form-check-label" for="500000">
                                                Rp. 401.000 - 500.000
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="harga" id="700000" value="700000">
                                        <label class="form-check-label" for="700000">
                                                Rp. 501.000 - 700.000
                                        </label>
                                </div>
                        </div>
                </div> --}}
                {{-- <div class="mt-5">
                        <p class="fw-bold text-uppercase">Jarak</p>
                        <div class="row">
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="jarak" id="1" value="1">
                                        <label class="form-check-label" for="1">
                                                < 1 KM
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="jarak" id="3" value="3">
                                        <label class="form-check-label" for="3">
                                                1 - 3 KM
                                        </label>
                                </div>
                                <div class="col-lg-4">
                                        <input class="form-check-input" type="radio" name="jarak" id="10" value="10">
                                        <label class="form-check-label" for="10">
                                                3 - 10 KM
                                        </label>
                                </div>
                        </div>
                </div> --}}
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
@endsection

@push('scripts')
        {{-- <script>
                document.getElementById('layanan').addEventListener('change', function() {
                        let selectedValue = this.value;
                        
                        if(selectedValue !== '') {
                                // Make an AJAX request to fetch the filtered data
                                let xhr = new XMLHttpRequest();
                                xhr.open('GET', `/recommendation?selectedValue=${selectedValue}`, true);
                                xhr.onload = function() {
                                        if(xhr.status === 200) {
                                                document.getElementById('filtered-data').innerHTML = xhr.responseText;
                                        }
                                };
                                xhr.send();
                        } else {
                                document.getElementById('filtered-data').innerHTML = '';
                        }
                });
        </script> --}}
@endpush
