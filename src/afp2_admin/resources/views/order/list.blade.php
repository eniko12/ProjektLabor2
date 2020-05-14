@extends('layouts.app', ['activePage' => 'orders', 'titlePage' => __('Order List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Orders</h4>
                            <p class="card-category"> Here you can manage Orders</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="#" class="btn btn-sm btn-primary">Add Order</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data_table1" class="table display">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Created
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($orders as $o)
                                        <tr>
                                            <td>
                                                {{ $o->id }}
                                            </td>
                                            <td>
                                                <a href="{{ route('customers.show', $o->user_id) }}"> {{ (\App\User::find($o->user_id)) == null ? "DELETED" : (\App\User::find($o->user_id)->name) }}</a>
                                            </td>
                                            <td>
                                                {{ $o->created_at }}
                                            </td>
                                            <td>
                                                {{ $o->status }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
