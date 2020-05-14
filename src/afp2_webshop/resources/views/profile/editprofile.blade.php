@extends('layouts.app')

@section('content')
<div class="container">
<div class="jumbotron" style="background:#F5F5F5">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
             <div class="col-sm-6 col-md-8">
                        <h2> Your Profile
                        </h2>
                  <form id="edit_form" method="post" action="{{ route("profile.update") }}">
                      @csrf
                          <table class="table-responsive">

                              <thead>
                              <tr>
                              <th>Name: <input id="name" type="text" name="name"></th>
                              <th>Email: <input id="email" type="email" name="email"></th>
                              </tr>
                              <tr>
                              <th>Phone: <input id="phone" type="text" name="phone"></th>

                              <th>Date of birth: <input id="dateofbirth" type="date" name="dateofbirth"></th>

                              </tr>
                              <tr>
                              <th>Gender: <select id="genders">
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                      <option value="other">Other</option>
                                  </select>
                              </th>
                              </tr>
                              </thead>
                              <tbody>
                              </tbody>
                          </table>

                      <div id=billingaddress>
                          <table>
                              <thead>
                              <tr><th>Billing address:</th></tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>
                                      City:
                                  </td>

                                  <td>

                                      <input type="text" name="billing_city" value="{{ $user->billing() == null ? "" : $user->billing()->city }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Country:
                                  </td>
                                  <td>
                                      <input type="text" name="billing_country" value="{{ $user->billing() == null ? "" : $user->billing()->country }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Postal code:
                                  </td>
                                  <td>
                                      <input type="text" name="billing_postal_code" value="{{ $user->billing() == null ? "" : $user->billing()->postal_code }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Street:
                                  </td>
                                  <td>
                                      <input type="text" name="billing_street" value="{{ $user->billing() == null ? "" : $user->billing()->street }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      House:
                                  </td>
                                  <td>
                                      <input type="text" name="billing_house" value="{{ $user->billing() == null ? "" : $user->billing()->house }}">
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </div>

                      <div id=shippingaddress>
                          <table>
                              <thead>
                              <tr><th>Shipping address:</th></tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>
                                      City:
                                  </td>
                                  <td>
                                      <input type="text" name="shipping_city" value="{{ $user->shipping()== null ? "" : $user->shipping()->city }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Country:
                                  </td>
                                  <td>
                                      <input type="text" name="shipping_country" value="{{ $user->shipping() == null ? "" : $user->shipping()->country }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Postal code:
                                  </td>
                                  <td>
                                      <input type="text" name="shipping_postal_code" value="{{ $user->shipping()== null ? "" : $user->shipping()->postal_code }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      Street:
                                  </td>
                                  <td>
                                      <input type="text" name="shipping_street" value="{{ $user->shipping()== null ? "" : $user->shipping()->street }}">
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                      House:
                                  </td>
                                  <td>
                                      <input type="text" name="shipping_house" value="{{ $user->shipping()== null ? "" : $user->shipping()->house }}">
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="btn-group">
                          <button type="submit" form="edit_form" class="btn-warning">Save Profile Changes</button> <!--This button should save the data and redirect the user to it's profile-->
                      </div>
                  </form>
            </div>


        </div>
    </div>
</div>
</div>
@endsection
