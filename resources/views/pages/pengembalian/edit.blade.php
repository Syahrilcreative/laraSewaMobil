@extends('layouts.app')
@section('smallTitle')
    pengembalian Mobil
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('storage/' . $pengembalian->mobil->image) }}" class="w-100" alt="">
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4> Mobil</h4>

                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" name="merek" id="merek" value="{{ $pengembalian->mobil->merek }}"
                            class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" name="model" id="model" value="{{ $pengembalian->mobil->model }}"
                            class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmrPlat">NoPlat</label>
                        <input type="text" name="nmrPlat" id="nmrPlat" value="{{ $pengembalian->mobil->nmrPlat }}"
                            class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tarif">Tarif /Hari</label>
                        <input type="text" name="tarif" id="tarif"
                            value="{{ number_format($pengembalian->mobil->tarif) }}" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4> Peminjaman</h4>
                    <div class="form-group">
                        <label for="merek">Tanggal Pinjam</label>
                        <input type="text" name="merek" id="merek" value="{{ $pengembalian->tglPinjam }}"
                            class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="model">Tanggal Kembali</label>
                        <input type="text" name="model" id="model" value="{{ $pengembalian->tglKembali }}"
                            class="form-control" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="tarif">Tarif /Hari</label>
                                <input type="text" name="tarif" id="tarif"
                                    value="{{ number_format($pengembalian->mobil->tarif) }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tarif">Lama Hari</label>
                                @php
                                    $date1 = \Carbon\Carbon::parse($pengembalian->tglPinjam);
                                    $date2 = \Carbon\Carbon::parse($pengembalian->tglKembali);
                                    $interval = $date1->diffInDays($date2);
                                    $interval = $date1->diffInDays($date2);
                                @endphp
                                <input type="text" name="tarif" id="tarif" value="{{ $interval }} Hari"
                                    class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tarif">Total</label>
                        <input type="text" name="tarif" id="tarif"
                            value="{{ number_format($pengembalian->mobil->tarif * $interval) }}" class="form-control"
                            readonly>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" id="sewa" class="btn btn-primary w-100">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalSewa" tabindex="-1" aria-labelledby="modalSewaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSewaLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="total" value="{{ $pengembalian->mobil->tarif * $interval }}">
                        <input type="hidden" name="mobil_id" value="{{ $pengembalian->mobil->id }}">
                        <div class="form-group">
                            <label for="tglPinjam">Apakah Anda Yakin Mobil Ini Sudah Kembali?</label>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Ya</button>
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
