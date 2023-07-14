<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a href="{{ route('mobil.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Data Mobil
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pengembalian.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Data Sewa Mobil
                        </p>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Sewa Mobil
                        </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
