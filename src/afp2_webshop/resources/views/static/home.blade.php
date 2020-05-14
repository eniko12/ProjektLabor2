@extends('layouts.app')

@section('content')
    <!-- ========================= ACTUAL CONTENT STARTS HERE ========================= -->
    <!-- ========================= SECTION MAIN ========================= -->
    <section class="section-main bg padding-y">
        <div class="container">

            <div class="row">
                <aside class="col-md-3">
                    <nav class="card">
                        <ul class="menu-category">
                            <li><a href="{{ route('shop') }}">Books</a></li>
                            <li><a href="{{ route('shop') }}">E-Books</a></li>
                            <li><a href="{{ route('shop') }}">Foreign books</a></li>
                            <li><a href="{{ route('shop') }}">Newest</a></li>
                            <li><a href="{{ route('shop') }}">On Sale</a></li>
                            <li><a href="{{ route('shop') }}">Preorder</a></li>
                        </ul>
                    </nav>
                </aside>
                <!-- col END -->
                <div class="col-md-9">
                    <article class="banner-wrap">
                        <img src="images/unknown_banner.jpg" class="w-100 rounded">
                    </article>
                </div>
                <!-- col END -->
            </div>
            <!-- row END -->
        </div>
        <!-- container //  -->
    </section>
    <!-- ========================= SECTION MAIN END ========================= -->

    <!-- ========================= SECTION ========================== -->
    <section class="section-name padding-y-sm">
        <div class="container">
            <header class="section-heading">
                <a href="{{ route('shop') }}" class="btn btn-outline-warning float-right">See all</a>
                <h3 class="section-title">Popular</h3>
            </header>
            <!-- sect-heading -->
            <div class="row">
                <div class="MultiCarousel" data-items="1,2,3,5" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach($featured as $book)
                            <div class="item">
                                <div class="pad15">
                                    <p class="lead">@title_cut(20)</p>
                                    <p>@thumbnail_fluid</p>
                                    <p>@authors_cut_or('EMPTY', 15)</p>
                                    <p>@price</p>
                                    <p>@description_cut(30)</p>
                                    <p><a href="{{ route('shop.get', ['id' => $book->id]) }}" class="btn orange btn-outline-warning">More</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-warning leftLst"><</button>
                    <button class="btn btn-warning rightLst">></button>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================= SECTION END ========================== -->


    <!-- ========================= SECTION  ========================= -->
    <section class="section-name padding-y-sm">
        <div class="container">

            <header class="section-heading">
                <a href="{{ route('shop') }}" class="btn btn-outline-warning float-right">See all</a>
                <h3 class="section-title">Newest</h3>
            </header>
            <!-- sect-heading -->


            <div class="row">
                @foreach($newest as $book)
                <div class="col-md-3">
                    <div href="#" class="card card-product-grid">
                        <a href="{{ route('shop.get', ['id' => $book->id]) }}" class="img-wrap">
                            <img src="{{ asset("images/book/thumbnails/" . $book->thumbnail) }}"/>
                        </a>
                        <figcaption class="info-wrap">
                            <a href="{{ route('shop.get', ['id' => $book->id]) }}" class="title">@title_cut(40)</a>
                            <div class="price mt-1">@price</div>
                            <!-- price-wrap END -->
                        </figcaption>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- row END -->

        </div>
        <!-- container // -->
    </section>
    <!-- ========================= SECTION  END ========================= -->
    <!-- ========================= END CONTENT ========================= -->
@endsection

@section('page_script')
    <script src="{{ URL::asset('js/multi-item-carousel.js') }}" type="text/javascript"></script>
@endsection
