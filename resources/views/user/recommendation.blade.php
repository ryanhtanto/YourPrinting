@extends('main/main')

@section('container')
        <h3 class="fw-bold mt-5">REKOMENDASI TEMPAT PRINTING</h3>
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
                                </select>
                                <span class="invalid-feedback">@error('id_bahan'){{$message}}@enderror</span>
                        </div>
                </div>
                <div class="mb-3">
                        <div id="filtered-data"> 
                                <label for="ukuran" class="form-label">JENIS UKURAN</label>
                                <select class="form-select filtered @error('id_ukuran') is-invalid @enderror" id="my-select-ukuran" name="id_ukuran" required>
                                        <option selected value="">Please select jenis layanan first!</option>
                                </select>
                                <span class="invalid-feedback">@error('id_ukuran'){{$message}}@enderror</span>
                        </div>
                </div>

                <div class="mb-3">
                        <div>
                                <label for="my-select-harga" class="form-label">HARGA</label>
                                <select class="form-select @error('harga') is-invalid @enderror" id="my-select-harga"  name="harga" required>
                                        <option selected value="">Open this select menu</option>
                                        <option value="140000">Rp. 100 - Rp. 140.000</option>
                                        <option value="280000">Rp. 141.000 - Rp. 280.000</option>
                                        <option value="420000">Rp. 281.000 - Rp. 420.000</option>
                                        <option value="560000">Rp. 421.000 - Rp. 560.000</option>
                                        <option value="700000">Rp. 561.000 - Rp. 700.000</option>
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

                                                        //filter harga
                                                        // const selectHarga = document.getElementById('my-select-harga');
                                                        // selectHarga.innerHTML = '';
                                                        // selectHarga.appendChild(createOptionsHarga(filteredResult['arrayHarga']));
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

                                // function createOptionsHarga(data) {
                                //         const options = document.createDocumentFragment();
                                //         const formattedAmount = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(data);
                                //         const option = document.createElement('option');
                                //         option.value = data;
                                //         option.textContent = ' Rp.1.000 - ' + formattedAmount;
                                //         options.appendChild(option);

                                //         return options;
                                // }
                                xhr.send();
                        } else {
                                document.getElementById('filtered-data').innerHTML = '';
                        }
                });
        </script>
@endpush
