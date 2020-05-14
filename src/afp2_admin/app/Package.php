<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Package extends Model
{
    public static function forOrder(string $order_id)
    {
        return DB::table('packages')->where('order_id', 'like', "%$order_id%")->get();
    }

    /**
     * @param string $order_id Order for the package
     * @param $book_id int|string Book for the package
     * @return bool If Successful
     */
    public static function IncrementQuantityOrInsertNew(string $order_id, $book_id) : bool
    {
        if(DB::table('packages')->where('order_id', '=', $order_id)->where('book_id', '=', $book_id)->count() > 0){
            return DB::update('UPDATE `packages` SET `quantity` = `quantity`+1 WHERE `order_id`=:order_id AND `book_id` = :book_id',
                [
                    'order_id' => $order_id,
                    'book_id' => $book_id
                ]
            );
        }
        else{
            return DB::insert('INSERT INTO `packages` (`order_id`, `book_id`, `quantity`) VALUES (:order_id, :book_id, 1)',
                [
                    'order_id' => $order_id,
                    'book_id' => $book_id
                ]
            );
        }
    }

    /**
     * Update if record exists, inserts otherwise
     * @param string $order_id
     * @param $book_id
     * @param $quantity
     * @return bool if Successful
     */
    public static function UpdateOrInset(string $order_id, $book_id, $quantity) : bool
    {
        $package = Package::query()->where('book_id', '=', $book_id)->where('order_id', '=', $order_id);
        if($package->count() > 0){
            return DB::update('UPDATE `packages` SET `quantity`=:quantity WHERE `order_id` = :order_id AND `book_id` = :book_id',
                [
                    'quantity' => $quantity,
                    'order_id' => $order_id,
                    'book_id' => $book_id
                ]
            );
        }
        else{
            return DB::insert('INSERT INTO `packages` (`order_id`, `book_id`, `quantity`) VALUES(:order_id, :book_id, :quantity)',
                [
                    'order_id' => $order_id,
                    'book_id' => $book_id,
                    'quantity' => $quantity
                ]
            );
        }
    }

    public static function DeleteWhere(string $order_id, $book_id)
    {
        return DB::delete('DELETE FROM `packages` WHERE book_id = :book_id AND order_id = :order_id',
            [
                'book_id' => $book_id,
                'order_id' => $order_id
            ]
        );
    }

    public static function move(string $from, string $to)
    {
        DB::update('UPDATE packages SET order_id = :to WHERE order_id = :from',[
            'to' => $to,
            'from' => $from
        ]);
    }

    public function order(){
        return $this->belongsTo(Order::class); //`package`.`order_id` -t keres
        //$this->hasOne(Order::class); //`orders`.`package_id` -t keres
    }

    public function book(){
        $this->hasOne(Book::class);
    }
}
