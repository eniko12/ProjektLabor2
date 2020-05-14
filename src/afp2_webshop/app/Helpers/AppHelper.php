<?php


namespace App\Helpers;


use App\Book;
use App\Order;
use App\Package;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class AppHelper
{
    public static function generateUserID(){
        $characters = '0123456789';
        $ans = $characters[rand(1, strlen($characters)-1)];
        for ($i = 1; $i < 8; $i++){
            $ans .= $characters[rand(0, strlen($characters)-1)];
        }
        return $ans;
    }

    public static function generateOrderID(){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_+';
        $ans = '';
        for ($i = 0; $i < 16; $i++){
            $ans .= $characters[rand(0, strlen($characters)-1)];
        }
        return $ans;
    }

    /**
     * @param string $text original text
     * @param int $maxchar maximum character number
     * @param string $end ending
     * @return string wrapped text, ending with $end
     */
    public static function wrap($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                }
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        }
        else {
            $output = $text;
        }
        return $output;
    }

    /**
     * @param string $string
     * @param array $array
     * @return \Illuminate\Http\Response
     */
    public static function viewWithGuestId(string $string, array $array = [])
    {
        if(User::whoami() == null)
            return response(view($string, $array))->cookie('guest_id', AppHelper::generateUserID(), 9999);
        return response(view($string, $array));
    }

    public static function getPackages(string $orderId){
        $order_id = Order::getCartIDFor(User::whoami());
        $packages = Package::forOrder($order_id);
        $ans = [];
        foreach ($packages as $pack){
            array_push($ans, ['book' => Book::find($pack->book_id), 'count' => $pack->quantity]);
        }
        return $ans;
    }
}
