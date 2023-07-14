@extends('layouts.app')
@section('smallTitle')
    Dashboard
@endsection
@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jumlahMobil }}</h3>

                    <p>Jumlah Mobil</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-car"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $jumlahUser }}<sup style="font-size: 20px"></sup></h3>

                    <p>Jumlah User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $MobilKembali }}</h3>

                    <p>Mobil Ready</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-car"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $MobilJalan }}</h3>

                    <p>Mobil Belum Kembali</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-car"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
@endsection
