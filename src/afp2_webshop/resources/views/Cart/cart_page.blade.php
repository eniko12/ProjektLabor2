
@extends('layouts.app')

@section('content')
    <div class="container">
        @if($packs != null)
        <header class="section-heading">
            <h3 class="h1-responsive font-weight-bold text-center my-4">Shopping cart</h3>
        </header>

        <!-- sect-heading -->

        <div class="row justify-content-center">
            <form id="post_form" action="{{ route('orders.place') }}" method="get">
                @csrf
                <input type="hidden" name="status" value="place" />
                <input type="hidden" name="order" value="{{ $order_id }}" />
            </form>
            <table class="table table-borderless text-md-center col-8 table-responsive">
                <thead>
                <tr class="border-top">
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Piece</th>
                    <th scope="col">Unit price</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($packs as $pack)
                    <tr class="bg">
                        <td scope="row"> <a href="#" class="img-wrap"> <img src="{{ asset("images/book/thumbnails/" . $pack['book']->thumbnail) }}" class="img-sm img-cart"> </a></td>
                        <td>
                            {{ $pack['book']->title }}
                        </td>
                        <td>
                            <input name="quantity_{{ $pack['book']->id }}" id="quantity_{{ $pack['book']->id }}" type="number" value ="{{$pack['count']}}" min="0" class="form-control form-control-cart" form="post_form">
                        </td>
                        <td>
                            <a id="price_{{ $pack['book']->id }}">{{ $pack['book']->price }}</a> Ft
                        </td>
                        <td>
                             <div id="sum_price_{{ $pack['book']->id}}"></div> Ft
                        </td>
                        <td>
                            <a href="{{ route('cart.remove', $pack['book']->id) }}">Remove</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="float-right">
                    <label for="total">Total:</label>
                    <input type="number" id="total" placeholder = "totalprice"  class="form-control" readonly ><br>
                    <button type="submit" form="post_form" class="btn btn-outline-warning form-control">Buy</button>
                </div>
            </div>
        </div>
        @else
            <section class="section-pagetop bg">
                <div class="container">
                    <h2 class="title-page">Your cart is currently empty.</h2>
                </div>
            </section>
        @endif
    </div>


@endsection

@section('page_script')
    <script src="{{ URL::asset('js/cart_price.js') }}" type="text/javascript"></script>
@endsection
