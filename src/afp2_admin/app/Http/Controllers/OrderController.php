<?php

namespace App\Http\Controllers;

use App\Addresses;
use App\Helpers\AppHelper;
use App\Order;
use App\Package;
use App\User;
use Faker\Provider\Address;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('order.list', ['orders' => Order::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return AppHelper::viewWithGuestId('order.create', ['cart' => User::cart()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $request->validate([
            'u_name' => 'required|max:255',
            'u_email' => 'required|email',
            'u_tel' => 'required',
            's_country' => 'required|max:255',
            's_tin' => 'max:255',
            's_postal_code' => 'required|max:255',
            's_city' => 'required|max:255',
            's_street' => 'required|max:255',
            's_house' => 'required|max:255',
            's_note' => 'max:255',
        ]);
        if(
            !ctype_space($request->input('b_country')) ||
            !ctype_space($request->input('b_postal_code')) ||
            !ctype_space($request->input('b_city')) ||
            !ctype_space($request->input('b_street')) ||
            !ctype_space($request->input('b_house'))
        ){
            $request->validate([
                'b_country' => 'required|max:255',
                'b_tin' => 'max:255',
                'b_postal_code' => 'required|max:255',
                'b_city' => 'required|max:255',
                'b_street' => 'required|max:255',
                'b_house' => 'required|max:255',
                'b_note' => 'max:255',
            ]);
            $billing = Addresses::create($request->input('b_country'),
                $request->input('b_tin', ''),
                $request->input('b_postal_code'),
                $request->input('b_city'),
                $request->input('b_street'),
                $request->input('b_house'),
                $request->input('b_note')
            );
        }
        $shipping = Addresses::create($request->input('s_country'),
            $request->input('s_tin', ''),
            $request->input('s_postal_code'),
            $request->input('s_city'),
            $request->input('s_street'),
            $request->input('s_house'),
            $request->input('s_note')
        );
        $order_id = Order::create(User::whoami(), $billing ?? $shipping, $shipping);
        Package::move(Order::getCartIDFor(User::whoami()), $order_id);
        return AppHelper::viewWithGuestId('order.complete', ['order_id' => $order_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
