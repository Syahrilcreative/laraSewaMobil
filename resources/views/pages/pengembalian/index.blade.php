@extends('layouts.app')
@section('smallTitle')
    Data pengembalian
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Data pengembalian</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Nomor Plat</th>
                            <th>Nama Konsumen</th>
                            <th>Telp</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            {{-- <th>Lama Hari</th> --}}
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pengembalians as $pengembalian)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ asset('storage/' . $pengembalian->mobil->image) }}" alt=""
                                        width="100px">
                                </td>
                                <td>{{ $pengembalian->mobil->nmrPlat }}</td>
                                <td>{{ $pengembalian->user->name }}</td>
                                <td>{{ $pengembalian->user->telp }}</td>
                                <td>{{ $pengembalian->tglPinjam }}</td>
                                <td>{{ $pengembalian->tglKembali }}</td>
                                @php
                                    $date1 = \Carbon\Carbon::parse($pengembalian->tglPinjam);
                                    $date2 = \Carbon\Carbon::parse($pengembalian->tglKembali);
                                    $interval = $date1->diffInDays($date2);
                                @endphp
                                {{-- <td>{{ $interval }} Hari</td> --}}
                                <td>
                                    @if ($pengembalian->status == 0)
                                        <div class="text-center bg-danger">Belom Kembali</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pengembalian.edit', $pengembalian->id) }}"
                                        class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@push('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
