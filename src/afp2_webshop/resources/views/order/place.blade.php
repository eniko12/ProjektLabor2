@extends('layouts.app')

@section('content')
    @guest
        <div class="alert alert-warning" role="alert">
            You are not logged in currently. Logging in has many benefits! Following your orders are just one of them. <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a>
        </div>
    @endguest

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Billing & shipping information</h1>
            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <div>
                    <h2 class="display-4">Contact information</h2>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="u_name">Name*</label>
                            <input type="text" class="form-control" id="u_name" name="u_name" required="required" placeholder="Your full name" value="{{ Auth::check() ? Auth::user()->name : "" }}">
                            @error('u_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="u_email">Email address*</label>
                            <input type="email" class="form-control" id="u_email" name="u_email" required="required" value="{{ Auth::check() ? Auth::user()->email : "" }}" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else. {{ Auth::check() ? "" : "This will not make a new user profile for you" }}</small>
                            @error('u_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="u_tel">Telephone number*</label>
                            <input type="tel" class="form-control" id="u_tel" name="u_tel" required="required" placeholder="Your full name" value="{{ Auth::check() ? Auth::user()->phone : "" }}">
                            @error('u_tel')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <small class="form-text text-muted">*: Required</small>
                </div>
                <hr>
                <hr>
               <div id="shipping_data">
                   <h2 class="display-6">Shipping information</h2>
                   <div class="row">
                       <div class="form-group col-sm-6">
                           <label for="s_country">Country*</label>
                           <input type="text" class="form-control" id="s_country" name="s_country" required="required" placeholder="" value="{{ Auth::check() ? (Auth::user()->shipping() == null ? "" : Auth::user()->shipping()->country) : "" }}">
                           @error('s_country')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group col-sm-6">
                           <label for="s_postal_code">Postal code*</label>
                           <input type="text" class="form-control" id="s_postal_code" required="required" name="s_postal_code" placeholder="" value="{{ Auth::check() ? (Auth::user()->shipping() == null ? "" : Auth::user()->shipping()->postal_code) : "" }}">
                           @error('s_postal_code')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div>
                   <div class="row">
                       <div class="form-group col-sm-6">
                           <label for="s_city">City*</label>
                           <input type="text" class="form-control" id="s_city" required="required" name="s_city" placeholder="" value="{{ Auth::check() ? (Auth::user()->shipping() == null ? "" : Auth::user()->shipping()->city) : "" }}">
                           @error('s_city')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group col-sm-6">
                           <label for="s_street">Street*</label>
                           <input type="text" class="form-control" id="s_street" required="required" name="s_street" placeholder="" value="{{ Auth::check() ? (Auth::user()->shipping() == null ? "" : Auth::user()->shipping()->street) : "" }}">
                           @error('s_street')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div>
                   <div class="row">
                       <div class="form-group col-sm-6">
                           <label for="s_house">House*</label>
                           <input type="text" class="form-control" id="s_house" required="required" name="s_house" placeholder="" value="{{ Auth::check() ? (Auth::user()->shipping() == null ? "" : Auth::user()->shipping()->house) : "" }}">
                           @error('s_house')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group col-sm-6">
                           <label for="s_note">Additional Notes (optional)</label>
                           <input type="text" class="form-control" id="s_note" name="s_note" placeholder="" value="{{ Auth::check() ? (Auth::user()->shipping() == null ? "" : Auth::user()->shipping()->note) : "" }}">
                           @error('s_notes')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div>
                   <div class="row">
                       <div class="form-group col-sm-6">
                           <label for="s_tin">TIN (For companies only)</label>
                           <input type="text" class="form-control" id="s_tin" name="s_tin" placeholder="" value="{{ Auth::check() ? (Auth::user()->shipping() == null ? "" : Auth::user()->shipping()->tin) : "" }}">
                           @error('s_tin')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                   </div>
                   <div class="row">
                       <div class="form-group col-sm-6">
                           <div class="form-check">
                               <input class="form-check-input" type="checkbox" value="" id="diff_billing" name="diff_billing" {{ Auth::check() && !(Auth::user()->billing() == null) ? 'checked="checked"' : '' }}>
                               <label class="form-check-label" for="diff_billing">
                                   Different billing address
                               </label>
                           </div>
                       </div>
                   </div>
                   <small class="form-text text-muted">*: Required</small>
               </div>
                <hr>
                <hr>
                <div id="billing_data">
                    <h2 class="display-6">Billing information</h2>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="b_country">Country</label>
                            <input type="text" class="form-control" id="b_country" name="b_country" placeholder="" value="{{ Auth::check() ? (Auth::user()->billing() == null ? "" : Auth::user()->billing()->country) : "" }}">
                            @error('b_country')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="b_postal_code">Postal code</label>
                            <input type="text" class="form-control" id="b_postal_code" name="b_postal_code" placeholder="" value="{{ Auth::check() ? (Auth::user()->billing() == null ? "" : Auth::user()->billing()->postal_code) : "" }}">
                            @error('b_postal_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="b_city">City</label>
                            <input type="text" class="form-control" id="b_city" name="b_city" placeholder="" value="{{ Auth::check() ? (Auth::user()->billing() == null ? "" : Auth::user()->billing()->city) : "" }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="b_street">Street</label>
                            <input type="text" class="form-control" id="b_street" name="b_street" placeholder="" value="{{ Auth::check() ? (Auth::user()->billing() == null ? "" : Auth::user()->billing()->street) : "" }}">
                            @error('b_street')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="b_house">House</label>
                            <input type="text" class="form-control" id="b_house" name="b_house" placeholder="" value="{{ Auth::check() ? (Auth::user()->billing() == null ? "" : Auth::user()->billing()->house) : "" }}">
                            @error('b_house')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="b_note">Additional Notes (optional)</label>
                            <input type="text" class="form-control" id="b_note" name="b_note" placeholder="" value="{{ Auth::check() ? (Auth::user()->billing() == null ? "" : Auth::user()->billing()->note) : "" }}">
                            @error('b_note')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="b_tin">TIN (For companies)</label>
                            <input type="text" class="form-control" id="b_tin" name="b_tin" placeholder="" value="{{ Auth::check() ? (Auth::user()->billing() == null ? "" : Auth::user()->billing()->tin) : "" }}">
                            @error('b_tin')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <small class="form-text text-muted">*: Required</small>
                </div>
                <button type="submit" class="btn btn-warning">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('page_script')
    <script src="{{ URL::asset('js/order_place.js') }}" type="text/javascript"></script>
@endsection

