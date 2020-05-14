<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Order::query()->where('status', '>', 0)->get() as $order){
            echo("\rGenerating for `" . $order->id . "`    ");
            for ($j = 0; $j < rand(1, 5); $j++) {
                $book = \App\Book::all()->random();
                //echo ($order->id . "\n");
                DB::table('packages')->insert([
                    'order_id' => $order->id,
                    'book_id' => $book->id,
                    'quantity' => rand(1, 5)
                ]);
            }
        }
        echo "\r";
    }
}
