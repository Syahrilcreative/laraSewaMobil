@extends('layouts.app')
@section('smallTitle')
    Data Mobil
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Data Mobil</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('mobil.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Merek</th>
                        <th>Model</th>
                        <th>Nomor Plat</th>
                        <th>Tarif</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($mobils as $mobil)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td><img src="{{ asset('storage/' . $mobil->image) }}" alt="" width="100px"></td>
                            <td>{{ $mobil->merek }}</td>
                            <td>{{ $mobil->model }}</td>
                            <td>{{ $mobil->nmrPlat }}</td>
                            <td>Rp. {{ number_format($mobil->tarif) }}</td>
                            <td>
                                @if ($mobil->status == 0)
                                    <div class="text-center bg-success">Ready</div>
                                @else
                                    <div class="text-center bg-danger">Tersewa</div>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('mobil.destroy', $mobil->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-xs btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('Hapus data ini?')"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
