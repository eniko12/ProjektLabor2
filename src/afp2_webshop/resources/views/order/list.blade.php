@extends('layouts.app')

@section('content')
<div style="overflow-x:auto;">
<div class="container">
<div class="jumbotron" style="background:#F5F5F5">
<div class="table responsive">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">



<table  class="table-responsive">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th class="my-longcol">Items</th>
                    <th>Total</th>
                    <th>Created at</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}
                    </td>
                    <td class="my-longcol">@foreach(\App\Helpers\AppHelper::getPackages($order->id) as $pack)
                       {{ $pack['count'] }}× {{ $pack['book']->title }}
                        @endforeach
                    </td>
                    <td> @php
                    $sum = 0;
                    foreach (\App\Helpers\AppHelper::getPackages($order->id) as $pack){
                        $bookPrice = $pack['book']->price * $pack['count'];
                        $sum += $bookPrice;
                    }
                    echo $sum;
                    @endphp
                    </td>
                    <td>{{ $order->created_at }}
                    </td>
                    <td>@switch($order->status)
                        @case('1')
                        Processing
                         @break

                        @case(2)
                        Delivering
                        @break

                        @case(3)
                        Completed
                        @break

                        @case(4)
                        Cancelled
                        @break

                                       

                        @default
                        Processing
                    @endswitch
                    </td>
                </tr>

                    @endforeach
                </tbody>
</table>
<!-- DivTable.com -->


    
</div>    
</div>
</div>    
</div>
</div>
</div>
@endsection
