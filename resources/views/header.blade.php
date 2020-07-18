<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="{{asset('img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href={{asset('css/owl.carousel.min.css')}}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{asset('css/all.css')}}>
    <!-- flaticon CSS -->
    <link rel="stylesheet" href={{asset('css/flaticon.css')}}>
    <link rel="stylesheet" href={{asset('css/themify-icons.css')}}>
    <!-- font awesome CSS -->
    <link rel="stylesheet" href={{asset('css/magnific-popup.css')}}>
    <link rel="stylesheet" href={{asset('css/nice-select.css')}}>
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{asset('css/slick.css')}}>
    <!-- style CSS -->
    <link rel="stylesheet" href={{asset('css/style.css')}}>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('res/admin/plugins/toastr/toastr.min.css')}}">
</head>
@if(\Illuminate\Support\Facades\Session::has(constant('App\Product::CART_SESSION')))
    @php($cart_count = count(\Illuminate\Support\Facades\Session::get(constant('App\Product::CART_SESSION'))))
@else
    @php($cart_count = 0)
@endif
<style>
    #cart-badge::after {
        content: "{{$cart_count}}"

    }
</style>
<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="{{asset('img/logo.png')}}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/posts">Blog</a>
                            </li>
                            <li class="nav-item">
                                @if($user = Cartalyst\Sentinel\Laravel\Facades\Sentinel::check())
                                    @if(!$user->hasAccess([App\User::ADMIN_PERMISSION]))
                                        <a class="nav-link"
                                           href="/customers/{{$user->customer->id}}">
                                            {{$user->first_name}} {{$user->last_name}}
                                        </a>
                                    @else
                                        <a class="nav-link" href="/customers">Login</a>
                                    @endif
                                @else
                                    <a class="nav-link" href="/customers">Login</a>
                                @endif
                            </li>
                        </ul>
                    </div>

                    <div class="hearer_icon d-flex">
                        <div class="dropdown cart">
                            <a href="/carts"><i id="cart-badge" class="ti-shopping-cart"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
