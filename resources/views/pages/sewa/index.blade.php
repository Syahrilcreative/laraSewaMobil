@extends('layouts.app')
@section('smallTitle')
    Sewa Mobil
@endsection
@section('content')
    <div class="row">
        @foreach ($mobils as $mobil)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('storage/' . $mobil->image) }}" class="w-100" alt="">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Merek</label>
                                    <input type="text" name="" id="" class="form-control" readonly
                                        value="{{ $mobil->merek }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Model</label>
                                    <input type="text" name="" id="" readonly value="{{ $mobil->model }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No Plat</label>
                                    <input type="text" name="" id="" class="form-control" readonly
                                        value="{{ $mobil->nmrPlat }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <input type="text" name="" id="" readonly
                                        value="{{ $mobil->status == 0 ? 'Ready' : '' }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- <p>Merek : <span class="bg-success p-1">{{ $mobil->merek }}</span></p>
                        <p>Model : <span class="bg-success p-1">{{ $mobil->model }}</span></p>
                        <p>NoPlat : <span class="bg-success p-1">{{ $mobil->nmrPlat }}</span></p>
                        <p>Status : <span class="bg-success p-1">Ready</span></p> --}}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('transaksi.edit', $mobil->id) }}" class="btn btn-primary w-100">Sewa</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
