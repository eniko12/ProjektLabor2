@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Your order is on the way!</h1>
            <p class="lead">Your order is being processed. You will be notified by email as soon as someone reviewed it!</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-warning btn-lg" href="{{ route('shop') }}" role="button">Back to shopping</a>
            </p>
        </div>
    </div>
@endsection
