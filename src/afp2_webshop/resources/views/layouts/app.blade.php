<?php
use App\User;
use Illuminate\Http\Request;use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--THIS DISABLES BROWSER CACHE! ONLY USE IN DEVELOPMENT! REMOVE IN PRODUCTION!!!-->
    <meta http-equiv="cache-control" content="max-age=604800">
    <!--Mostly the same, but this needed for Opera. ONLY USE IN DEVELOPMENT! REMOVE IN PRODUCTION!!!-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--IExplorer-CSS compatibility-->

    <title>XYZ-BOOKS</title>

    <!-- jQuery, JS framework for easy frontend development, we don't want to learn Vue.js now -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap files, so we don't have to write @media tags in css-->
{{--    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font awesome, small icon-like things, google for it -->
    <script src="https://kit.fontawesome.com/07049bce1e.js" crossorigin="anonymous"></script>

    <!-- custom css -->
    <link href="{{ URL::asset('css/ui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)">

    <!-- custom javascript -->
    <script src="{{ URL::asset('js/global.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        //This is here mostly for IExplorer-jQuery compatibility, useful if we need some js BEFORE the site loads
        $(document).ready(function() {
            // jQuery code if needed (pretty sure this will stay empty)
        });
    </script>

</head>

<body data-gr-c-s-loaded="true">
<!--Header starts here, this will be the same for every page-->
<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-4">
                    <a href="{{ route('main') }}" class="brand-wrap" style="color: orange">
                        <h1 class="text-nowrap">XYZ-Books</h1>
                    </a>
                    <!-- brand-wrap END -->
                </div>
                <div class="col-lg-4 col-sm-12">
                    <form method="post" action="{{ route('shop.search.mid') }}" class="search">
                        @csrf
                        <div class="input-group w-100">
                            <label for="search_field" class="d-none">Search</label>
                            <!--Input field without associated label is considered bad practice. This is here for screen readers-->
                            <input type="text" id="search_field" name="search_field" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- search-wrap END -->
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header  mr-3">
                            <a href="{{ route('cart') }}" class="icon icon-sm rounded-circle border"><i class="fas fa-shopping-cart"></i></a>
                            <span id="user_cart_count" class="badge badge-pill badge-danger notify">{{ \App\User::cartCount() }}</span>
                        </div>
                        <div class="widget-header icontext">
                            <a href="{{ Auth::check() ? route('profile') : route('login') }}" class="icon icon-sm rounded-circle border"><i class="fas fa-user"></i></a>
                            <div class="text">
                                <span class="text-muted">Welcome, {{ Auth::check() ? User::find(Auth::id())->name : 'guest' }}!</span>
                                <div>
                                    @auth()
                                        <a href="{{ route('signout') }}"> Logout</a>
                                    @else
                                        <a href="{{ route('login') }}">Sign in</a> |
                                        <a href="{{ route('register') }}"> Register</a>
                                    @endauth
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- widgets-wrap END -->
                </div>
                <!-- col END -->
            </div>
            <!-- row END -->
        </div>
        <!-- container END -->
    </section>
    <!-- header-main  END -->
</header>
<!-- section-header END -->

<!-- Navbar starts here. This is same too -->
<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
<?php //$routes = collect(\Route::getRoutes())->map(function ($route) { return $route->uri(); }); dd($routes); ?>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item  {{ strpos(\Route::currentRouteName(), "main") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("main") }}">{{ strpos(\Route::currentRouteName(), "main") === false ? '' : '> ' }} Home</a>
                </li>
                @nav_split()
                <li class="nav-item {{ strpos(\Route::currentRouteName(), "shop") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("shop") }}">{{ strpos(\Route::currentRouteName(), "shop") === false ? '' : '> ' }} Shop</a>
                </li>
                @nav_split()
                <li class="nav-item  {{ strpos(\Route::currentRouteName(), "about") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("about") }}">{{ strpos(\Route::currentRouteName(), "about") === false ? '' : '> ' }} About</a>
                </li>
                @nav_split()
                <li class="nav-item  {{ strpos(\Route::currentRouteName(), "contact") === false ? '' : 'active' }}">
                    <a class="nav-link" href="{{ route("contact") }}">{{ strpos(\Route::currentRouteName(), "contact") === false ? '' : '> ' }} Contact</a>
                </li>
            </ul>
        </div>
        <!-- collapse  END -->
    </div>
    <!-- container  END -->
</nav>

<!-- navbar END -->

<!-- ========================= ACTUAL CONTENT STARTS HERE ========================= -->

@yield('content')

<!-- ========================= END CONTENT ========================= -->

<!-- FOOTER STARTS HERE THIS WILL BE THE SAME ON ALL PAGES! -->
<!-- ========================= FOOTER ========================= -->
<footer class="section-footer border-top">
    <div class="container">
        <section class="footer-top padding-y">
            <div class="row">
                <aside class="col-md col-6">
                    <h6 class="title">Shops</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('contact') }}">Eger</a></li>
                        <li><a href="{{ route('contact') }}">Budapest</a></li>
                        <li><a href="{{ route('contact') }}">Opening Soon</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('about') }}">Find a store</a></li>
                        <li><a href="{{ route('about') }}">Rules and terms</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Help</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                        <li><a href="{{ route('contact') }}">Money refund</a></li>
                        <li><a href="{{ route('about') }}">Policies</a></li>
                    </ul>
                </aside>
                <aside class="col-md col-6">
                    <h6 class="title">Account</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('login') }}"> User Login </a></li>
                        <li><a href="{{ route('register') }}"> User register </a></li>
                        <li><a href="{{ route('profile') }}"> Account Setting </a></li>
                        <li><a href="{{ route('orders') }}"> My Orders </a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Social</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#"> <i class="fab fa-facebook"></i> Facebook </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fab fa-youtube"></i> Youtube </a>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- row END -->
        </section>
        <!-- footer-top END -->

        <section class="footer-bottom border-top row">
            <div class="col-md-2">
                <p class="text-muted"> © 2019 XYZ-Books Kft. </p>
            </div>
            <div class="col-md-8 text-md-center">
                <span class="px-2">info@xyz-example.com</span>
                <span class="px-2">+36 1 123 456</span>
                <span class="px-2">Street name 123, City</span>
            </div>
            <div class="col-md-2 text-md-right text-muted">
                <i class="fab fa-lg fa-cc-visa"></i>
                <i class="fab fa-lg fa-cc-paypal"></i>
                <i class="fab fa-lg fa-cc-mastercard"></i>
            </div>
        </section>
    </div>
    <!-- //container -->
</footer>
<!-- ========================= FOOTER END  ========================= -->


</body>

@yield('page_script')

</html>
