<header class="border-bottom mb-4 pb-3">
    <div class="row form-inline">
        <span class="mr-md-auto mr-xs-auto"> {{ $current_page + 1 }} / {{ $page_count }} pages </span>
        <span>&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; &ensp; </span>
        <nav class="float-right" aria-label="...">
            <ul class="pagination">
                <li class="page-item {{ $current_page == 0 ? "disabled" : "" }}">
                    <a class="page-link" href="#" onclick="ajax_refresh({{ $current_page - 1}})" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">{{ $current_page + 1 }} <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item {{ $current_page >= $page_count - 1 ? "disabled" : "" }}">
                    <a class="page-link" href="#" onclick="ajax_refresh({{ $current_page + 1}})">Next</a>
                </li>
            </ul>
        </nav>
    </div>

</header><!-- sect-heading -->

<div class="row">
        @foreach($books as $book)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <figure class="card card-product-grid">
                <div class="img-wrap">
                    <img src="{{ asset("images/book/thumbnails/" . $book->thumbnail) }}"/>
                    <a class="btn-overlay" href="{{ route('shop.get', $book->id) }}"><i class="fa fa-search-plus"></i> More</a>
                </div> <!-- img-wrap.// -->
                <figcaption class="info-wrap">
                    <div class="fix-height">
                        <a href="#" class="title">{{\App\Helpers\AppHelper::wrap($book->title, 45)}}</a>
                        <div class="price-wrap mt-2">
                            <span class="price">{{$book->price}} Ft</span>
                        </div> <!-- price-wrap.// -->
                    </div>
                    <a onclick="add_to_cart('{{ route('cart.add', $book->id) }}')" class="btn btn-block btn-warning">Add to cart </a>
                </figcaption>
            </figure>
        </div> <!-- col.// -->
        @endforeach
    </div> <!-- row end.// -->
