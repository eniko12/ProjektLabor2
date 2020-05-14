@extends('layouts.app', ['activePage' => 'customers', 'titlePage' => __('Customer List')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Customers</h4>
                            <p class="card-category"> Here you can manage customers</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="#" class="btn btn-sm btn-primary">Add customers</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="data_table1" class="table display">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Gender
                                        </th>
                                        <th>
                                            Date of Birth
                                        </th>
                                        <th>
                                            Billing Address
                                        </th>
                                        <th>
                                            Shipping Address
                                        </th>
                                        <th>
                                            Registration date
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($users as $u)
                                        <tr>
                                            <td>
                                                {{ $u->id }}
                                            </td>
                                            <td>
                                                <a href="{{ route('customers.show', $u->id) }}">{{ $u->name }}</a>
                                            </td>
                                            <td>
                                                {{ $u->email }}
                                            </td>
                                            <td>
                                                {{ $u->gender }}
                                            </td>
                                            <td>
                                                {{ $u->date_of_birth }}
                                            </td>
                                            <td>
                                                @php
                                                    $address = App\Addresses::find($u->billing);
                                                @endphp
                                                @if($u->billing == $u->shipping || (!isset($u->billing) && isset($u->shipping)))
                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="">
                                                        <span class="material-icons">arrow_right_alt</span>
                                                    </button>
                                                @else
                                                    @if($address)
                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="
                                                    {{ $address->country }}, {{ $address->postal_code }}<br>
                                                    {{ $address->city }}, {{ $address->street }} {{ $address->house }}<br>
                                                    {{ $address->note ? '<hr> <b>Note</b>:<br>' . $address->note : '' }}
                                                            ">
                                                            {{ $address->country }}, {{ $address->city }}<br>
                                                            {{ $address->street }}, {{ $address->house }}
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="">
                                                            NOT SET
                                                        </button>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                $address = App\Addresses::find($u->shipping);
                                                @endphp
                                               @if($address)
                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="
                                                    {{ $address->country }}, {{ $address->postal_code }}<br>
                                                    {{ $address->city }}, {{ $address->street }} {{ $address->house }}<br>
                                                    {{ $address->note ? '<hr> <b>Note</b>:<br>' . $address->note : '' }}
                                                    ">
                                                        {{ $address->country }}, {{ $address->city }}<br>
                                                        {{ $address->street }}, {{ $address->house }}
                                                    </button>
                                               @else
                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="">
                                                        NOT SET
                                                    </button>
                                               @endif
                                            </td>
                                            <td>
                                                {{ $u->created_at }}
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
