<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param User $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->where('user_auth', '<', 9)->get()]);
    }

    public function show($id){
        return view('users.show', ['user' => User::find($id)]);
    }

    public function delete($id){
        User::destroy($id);
        return redirect()->route('customers');
    }
}
