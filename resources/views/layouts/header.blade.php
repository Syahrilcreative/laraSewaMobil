<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" class="form-inline">
                @csrf
                <button class="btn btn-sm btn-flat btn-danger" style="border: none;"><i
                        class="fa fa-logout"></i>Logout</button>
            </form>
            <div class="navbar-search-block">

            </div>
        </li>

    </ul>
</nav>
