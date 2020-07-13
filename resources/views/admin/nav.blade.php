@include('admin/logout')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            @if($user = Cartalyst\Sentinel\Laravel\Facades\Sentinel::check())
                <a class="nav-link">
                    Logged in as {{$user->first_name}} {{$user->last_name}}
                </a>
            @endif
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link" data-toggle="modal" data-target="#modal-admin-logout">Logout</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{asset('img/fevicon.png')}}" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Aranoz Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <p>Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/customers" class="nav-link">
                                <p>Customers</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/products" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/brands" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            Brands
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/orders" class="nav-link">
                        <i class="nav-icon fas  fa-shopping-basket"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
