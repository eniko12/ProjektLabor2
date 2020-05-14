@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('User Data')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">User data</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data_table1" class="table display">
                                    <thead class=" text-primary">
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Id
                                        </td>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Name
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Gender
                                        </td>
                                        <td>
                                            {{ $user->gender }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Date of Birth
                                        </td>
                                        <td>
                                            {{ $user->date_of_birth }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Billing Address
                                        </td>
                                        <td>
                                            @php
                                                $address = App\Addresses::find($user->billing);
                                            @endphp
                                            @if($user->billing == $user->shipping || (!isset($user->billing) && isset($user->shipping)))
                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-html="true" title="">
                                                    <span>Same as shipping</span>
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
                                    </tr>
                                    <tr>
                                        <td>
                                            Shipping Address
                                        </td>
                                        <td>
                                            @php
                                                $address = App\Addresses::find($user->shipping);
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
                                    </tr>
                                    <tr>
                                        <td>
                                            Registration date
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Actions
                                        </td>
                                        <td>
                                            <a href="{{ route('customers.delete', $user->id) }}">Delete</a>
                                        </td>
                                    </tr>
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
