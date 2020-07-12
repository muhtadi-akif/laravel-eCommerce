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
    <!-- swiper CSS -->
    <link rel="stylesheet" href={{asset('css/slick.css')}}>
    <!-- style CSS -->
    <link rel="stylesheet" href={{asset('css/style.css')}}>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('res/admin/plugins/toastr/toastr.min.css')}}">
</head>

<style>
    #cart-badge::after {
        content: "34"
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="/profile">profile</a>
                                    <a class="dropdown-item" href="/edit">edit</a>
                                    <a class="dropdown-item" href="tracking.html">tracking</a>
                                    <a class="dropdown-item" href="checkout.html">product checkout</a>
                                    <a class="dropdown-item" href="cart.html">shopping cart</a>
                                    <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                    <a class="dropdown-item" href="elements.html">elements</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="blog.html"> blog</a>
                                    <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                </div>
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
                            <a href=""><i id="cart-badge" class="ti-shopping-cart"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- Header part end-->
