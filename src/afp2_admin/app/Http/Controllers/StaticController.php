<?php

namespace App\Http\Controllers;

use App\Book;
use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class StaticController extends Controller
{
    public function showHome(){
        return AppHelper::viewWithGuestId('static.home', ['newest' => Book::orderBy('created_at')->limit(4)->get(), 'featured' => Book::inRandomOrder()->limit(10)->get()]);
    }

    public function showContact(){
        return AppHelper::viewWithGuestId('static.contact');
    }

    public function showAbout(){
        return AppHelper::viewWithGuestId('static.about');
    }
}
