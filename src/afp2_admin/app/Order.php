<?php

namespace App;

use App\Helpers\AppHelper;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public $incrementing = false; //NEM INTEGER AZ ID

    /**
     * @param $user_id int User owning the cart
     * @return string Cart id
     */
    public static function getCartIDFor($user_id) : string
    {
        $order = Order::query()->where('user_id', '=', $user_id)->where('status', '=', 0)->get();
        if ($order->count() == 0){
            self::CreateCart($user_id);
        }
        else{
            $order = $order[0]->id;
        }
        return $order;
    }

    /**
     * @param int $user_id
     * @return bool
     */
    public static function CreateCart($user_id): bool
    {
        if(!is_int($user_id))
            $user_id = User::whoami();
        $billing = 0;
        $shipping = 0;
        if(Auth::check()){
            if(!empty(Auth::user()->billing()))
                $billing = Auth::user()->billing()->id;
            if(!empty(Auth::user()->shipping()))
                $shipping = Auth::user()->shipping()->id;
        }
        $order_id = AppHelper::generateOrderID();
        return DB::insert('INSERT INTO `orders` (`id`, `user_id`, `billing`, `shipping`, `status`) VALUES (:gen_id, :user_id, :billing, :shipping, 0)',
            [
                'gen_id' => $order_id,
                'user_id' => $user_id,
                'billing' => $billing,
                'shipping' => $shipping,
            ]
        );
    }

    public static function emptyForTest()
    {
        $order_id = Order::query()->where('user_id', '=', 0);
        if($order_id->count() == 0)
            return true;
        else{
            $order_id = $order_id->get()[0]->id;
            DB::delete('DELETE FROM `packages` WHERE `order_id` = :order_id', ['order_id' => $order_id]);
            return DB::delete('DELETE FROM `orders` WHERE user_id = 0');
        }
    }

    /**
     * @param int|null $whoami
     * @return Collection
     */
    public static function ofUser(?int $whoami)
    {
        return Order::query()->where('user_id', '=', $whoami)->where('status', '<>', 0)->get();
    }

    /**
     * Create new order
     * @param int|null $user_id
     * @param int|null $billing
     * @param int|null $shipping
     * @param int $status
     * @return string
     */
    public static function create(?int $user_id, int $billing = null, int $shipping = null, int $status = 1)
    {
        $id = AppHelper::generateOrderID();
        DB::insert('INSERT INTO orders (id, user_id, billing, shipping, status) VALUES (:id, :user_id, :billing, :shipping, :status)', [
            'id' => $id,
            'user_id' => $user_id,
            'billing' => $billing,
            'shipping' => $shipping,
            'status' => $status,
        ]);
        return $id;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function billing(){
        return $this->belongsTo(Addresses::class, "billing");
    }

    public function shipping(){
        return $this->belongsTo(Addresses::class, "shipping");
    }
}
