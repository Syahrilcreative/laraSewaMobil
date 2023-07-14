@extends('layouts.app')
@section('smallTitle')
    Edit Mobil
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('mobil.update', $mobil->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="merek">Merek</label>
                            <input type="text" required name="merek" id="merek" class="form-control"
                                value="{{ $mobil->merek }}">
                            @error('merek')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" required name="model" id="model" class="form-control"
                                value="{{ $mobil->model }}">
                            @error('model')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nmrPlat">Nomor Plat</label>
                            <input type="text" required name="nmrPlat" id="nmrPlat" class="form-control"
                                value="{{ $mobil->nmrPlat }}">
                            @error('nmrPlat')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tarif">Tarif Sewa /Hari</label>
                            <input type="text" required name="tarif" id="tarif" class="form-control"
                                value="{{ $mobil->tarif }}">
                            @error('tarif')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <img src="{{ asset('storage/' . $mobil->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
                        <div class="form-group">
                            <label for="image">Gambar Mobil</label>
                            <input type="file" name="image" id="image" class="form-control"
                                onchange="previewImage()">
                            @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
