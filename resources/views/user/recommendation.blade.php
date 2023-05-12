@extends('main/main')

@section('container')
        <h3 class="fw-bold">REKOMENDASI TEMPAT PRINTING</h3>
        <form method="POST" action="/recommendation">
                @csrf
                <div class="mb-3">
                        <div>
                                <label for="layanan" class="form-label">JENIS LAYANAN</label>
                                <select class="form-select @error('id_service') is-invalid @enderror" id="layanan" name="id_service" required>
                                        <option selected value="">Open this select menu</option>
                                        @foreach($services as $service)
                                                <option value="{{ $service->id }}" class="text-uppercase">{{ $service->nama_service }}</option>
                                        @endforeach
                                </select>
                                <span class="invalid-feedback">@error('id_service'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <div id="filtered-data">
                                <label for="bahan" class="form-label">JENIS BAHAN</label>
                                <select class="form-select filtered @error('id_bahan') is-invalid @enderror" id="my-select-bahan" name="id_bahan" required>
                                        <option selected value="">Please select jenis layanan first!</option>
                                        {{-- @if(count($filterBahan) == 0)
                                                @foreach($filterBahan as $data)
                                                        <option value="{{ $data->id_bahan }}">{{ $data->nama_bahan }}</option>
                                                @endforeach
                                        @else
                                                <option value="">Please select jenis layanan first!</option>
                                        @endif --}}
                                </select>
                                <span class="invalid-feedback">@error('id_bahan'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <div id="filtered-data"> 
                                <label for="ukuran" class="form-label">JENIS UKURAN</label>
                                <select class="form-select filtered @error('id_ukuran') is-invalid @enderror" id="my-select-ukuran" name="id_ukuran">
                                        <option selected value="">Please select jenis layanan first!</option>
                                        {{-- @if(count($filterUkuran) > 0)
                                                @foreach($filterUkuran as $data)
                                                        <option value="{{ $data->id_ukuran }}">{{ $data->jenis_ukuran }}</option>
                                                @endforeach
                                        @else
                                                <option value="">Please select jenis layanan first!</option>
                                        @endif --}}
                                </select>
                                <span class="invalid-feedback">@error('id_ukuran'){{$message}}@enderror</span>
                        </div>
                </div>

                <div class="mb-3">
                        <div>
                                <label for="harga" class="form-label">HARGA</label>
                                <select class="form-select @error('harga') is-invalid @enderror" id="harga" name="harga" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="100000" class="text-uppercase">Rp. 0 - Rp. 100.000</option>
                                        <option value="200000" class="text-uppercase">Rp. 101.000 - Rp. 200.000</option>
                                        <option value="300000" class="text-uppercase">Rp. 301.000 - Rp. 400.000</option>
                                        <option value="500000" class="text-uppercase">Rp. 401.000 - Rp. 500.000</option>
                                        <option value="700000" class="text-uppercase">Rp. 501.000 - Rp. 707.000</option>
                                </select>
                                <span class="invalid-feedback">@error('harga'){{$message}}@enderror</span>
                        </div>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
@endsection

@push('scripts')
        <script>
                document.getElementById('layanan').addEventListener('change', function() {
                        let selectedValue = this.value;
                        
                        if(selectedValue !== '') {
                                // Make an AJAX request to fetch the filtered data
                                const xhr = new XMLHttpRequest();
                                xhr.open('GET', `/recommendation/filter?selectedValue=${selectedValue}`, true);
                                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                                xhr.onreadystatechange = function() {
                                        if (xhr.readyState === XMLHttpRequest.DONE){
                                                if(xhr.status === 200) {
                                                        const filteredResult = JSON.parse(xhr.responseText);

                                                        //filter bahan
                                                        const selectBahan = document.getElementById('my-select-bahan');
                                                        selectBahan.innerHTML = '';
                                                        selectBahan.appendChild(createOptionsBahan(filteredResult['arrayBahan']));

                                                        //filter ukuran
                                                        const selectUkuran = document.getElementById('my-select-ukuran');
                                                        selectUkuran.innerHTML = '';
                                                        selectUkuran.appendChild(createOptionsUkuran(filteredResult['arrayUkuran']));
                                                }
                                        }
                                        
                                };
                                function createOptionsBahan(data) {
                                        const options = document.createDocumentFragment();

                                        data.forEach(function(item) {
                                                const option = document.createElement('option');
                                                option.value = item.id_bahan;
                                                option.textContent = item.nama_bahan;
                                                options.appendChild(option);
                                        });

                                        return options;
                                }

                                function createOptionsUkuran(data) {
                                        const options = document.createDocumentFragment();

                                        data.forEach(function(item) {
                                                const option = document.createElement('option');
                                                option.value = item.id_ukuran;
                                                option.textContent = item.jenis_ukuran;
                                                options.appendChild(option);
                                        });

                                        return options;
                                }
                                xhr.send();
                        } else {
                                document.getElementById('filtered-data').innerHTML = '';
                        }
                });
        </script>
@endpush
