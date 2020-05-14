<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $new = json_encode(Book::orderBy('created_at')->limit(5)->get());
      //  $random =json_encode(Book::inRandomOrder()->limit(5)->get());


        return 'Legújabbak:'.'<br>'.
                json_encode(Book::orderBy('created_at')->limit(5)->get()).'<br>'.
                'Random:'.
                '<br>'.json_encode(Book::inRandomOrder()->limit(5)->get());
    }
}
