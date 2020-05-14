<?php

namespace App;

use App\Helpers\AppHelper;
use Faker\Provider\Address;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    public $incrementing = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function testUser() : User
    {
        $user = User::query()->where('id', '=', '0');
        if($user->count() > 0)
            return $user->get()->last();
        factory(User::class)->create();
        return User::all()->last();

    }

    public function billing(){
        if($this->billing)
            return Addresses::find($this->billing);
        return null;
    }

    public function shipping(){
        if($this->shipping)
            return Addresses::find($this->shipping);
        return null;
    }

    public static function cart(){
        $order_id = Order::getCartIDFor(User::whoami());
        $packages = Package::forOrder($order_id);
        $ans = [];
        foreach ($packages as $pack){
            array_push($ans, ['book' => Book::find($pack->book_id), 'count' => $pack->quantity]);
        }
        return $ans;
    }

    public static function cartCount(){
        $sum = 0;
        foreach (User::cart() as $item){
            $sum += $item['count'];
        }
        return $sum;
    }

    public static function whoami(){
        if (Auth::check()) {
            $user_id = Auth::id();
        } else {
            $user_id = Cookie::get('guest_id');
            if(strlen($user_id) > 10){
                $user_id = Crypt::decryptString($user_id);
            }
        }
        return $user_id ?? AppHelper::generateUserID();
    }

}
