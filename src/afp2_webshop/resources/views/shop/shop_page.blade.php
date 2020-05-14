@extends('layouts.app')

@section('content')

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
                <aside class="col-md-3">

                    <div class="card">
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Quick Search</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">
                                    <form class="pb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" id="quick_search">
                                        </div>
                                    </form>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Author</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse in" id="collapse_2" style="">
                                <div class="card-body">
                                    <form method="post" class="pb-3" action="{{ route('shop.search') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search_author" name="search_author" placeholder="Search">
                                            <!--div class="input-group-append">
                                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                            </div-->
                                        </div>
                                    </form>

                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="false" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Genre </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse in" id="collapse_3" style="">
                                <div class="card-body">
                                    <form method="post" class="pb-3" action="{{ route('shop.search') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search_genre" name="search_genre" placeholder="Search" />
                                            <input type="hidden" id="rq_main_search" value="{{ $search_field ?? '' }}" />
                                            <!--div class="input-group-append">
                                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                            </div-->
                                        </div>
                                    </form>
                                    <!--div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre1" value="Genre 1" >
                                            <label for="genre1"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 1</label>
                                    </div>
                                    <div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre2" value="Genre 2" >
                                            <label for="genre2"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 2</label>
                                    </div>
                                    <div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre3" value="Genre 3" >
                                            <label for="genre3"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 3</label>
                                    </div>
                                    <div>
                                        <div class="squaredThree">
                                            <input type="checkbox" name="optionsRadios" id="genre4" value="Genre 4" >
                                            <label for="genre4"></label>
                                        </div>
                                        <label class="label-text" style="margin-left: 10px">Genre 4</label>
                                    </div-->
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <article class="filter-group">
                            <header class="card-header" >
                                <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false" class="">
                                    <i class="icon-control orange fa fa-chevron-down"></i>
                                    <h6 class="title">Price range </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse in"  id="collapse_4" style="">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="price_min">Min</label>
                                            <input name="price_min" id="price_min" class="form-control" value="0" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                        <div class="form-group text-right col-md-6">
                                            <label for="price_max">Max</label>
                                            <input name="price_max" id="price_max" class="form-control" value="999999" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                    </div> <!-- form-row.// -->
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_6" aria-expanded="false" class="">
                                    <i class="icon-control orange fa fa-chevron-down "></i>
                                    <h6 class="title">More filter </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse in" id="collapse_6" style="">
                                <h6 class="title card-header">Language </h6>
                                <div class="card-body">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="language_radio" value="%" checked="" class="custom-control-input control-orange">
                                        <div class="custom-control-label">Any</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="language_radio" value="en" class="custom-control-input">
                                        <div class="custom-control-label">English</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="language_radio" value="fr" class="custom-control-input">
                                        <div class="custom-control-label">French</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="language_radio" value="de" class="custom-control-input">
                                        <div class="custom-control-label">German</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="language_radio" value="hu" class="custom-control-input">
                                        <div class="custom-control-label">Hungarian</div>
                                    </label>
                                </div><!-- card-body.// -->
                                <h6 class="title card-header">Publisher </h6>
                                <div class="card-body">
                                    <form method="post" class="pb-3"  action="{{ route('shop.search') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search_publisher" name="search_publisher" placeholder="Search">
                                            <!--div class="input-group-append">
                                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                            </div-->
                                        </div>
                                    </form>
                                </div><!-- card-body.// -->
                                <h6 class="title card-header">Pages </h6>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="page_min">Min</label>
                                            <input name="page_min" id="page_min" class="form-control" value="0" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                        <div class="form-group text-right col-md-6">
                                            <label for="page_max">Max</label>
                                            <input name="page_max" id="page_max" class="form-control" value="999999" type="number" min="0" oninput="this.value = Math.abs(this.value)">
                                        </div>
                                    </div> <!-- form-row.// -->
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                    </div> <!-- card.// -->

                </aside> <!-- col.// -->
                <main class="col-md-9">

                    <div id="ajax_target"></div>

                </main> <!-- col.// -->

            </div>

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
 @endsection

@section('page_script')
    <script src="{{ URL::asset('js/shop_ajax.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('js/add_cart.js') }}" type="text/javascript"></script>
@endsection
