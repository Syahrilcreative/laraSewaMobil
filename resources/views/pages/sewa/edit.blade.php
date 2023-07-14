@extends('layouts.app')
@section('smallTitle')
    Sewa Mobil
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('storage/' . $mobil->image) }}" class="w-100" alt="">
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" name="merek" id="merek" value="{{ $mobil->merek }}" class="form-control"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" name="model" id="model" value="{{ $mobil->model }}" class="form-control"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmrPlat">NoPlat</label>
                        <input type="text" name="nmrPlat" id="nmrPlat" value="{{ $mobil->nmrPlat }}"
                            class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tarif">Tarif /Hari</label>
                        <input type="text" name="tarif" id="tarif" value="{{ number_format($mobil->tarif) }}"
                            class="form-control" readonly>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" id="sewa" class="btn btn-primary w-100">Sewa</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalSewa" tabindex="-1" aria-labelledby="modalSewaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSewaLabel">Tanggal Sewa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                        <div class="form-group">
                            <label for="tglPinjam">Tanggal Awal sewa</label>
                            <input type="date" name="tglPinjam" id="tglPinjam" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tglKembali">Tanggal Akhir sewa</label>
                            <input type="date" name="tglKembali" id="tglKembali" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sewa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $("#sewa").on('click', function() {
                $("#modalSewa").modal('show')
            })
        })
    </script>
@endpush
