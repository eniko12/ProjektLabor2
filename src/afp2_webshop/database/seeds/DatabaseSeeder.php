<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try{
            if(\App\Book::all()->count() > 0
                || \App\User::all()->count() > 0
                || \App\Author::all()->count() > 0
                || \App\Genre::all()->count() > 0
                || \App\Order::all()->count() > 0
                || \App\Package::all()->count() > 0
                || \App\Addresses::all()->count() > 0
                || \App\Publisher::all()->count() > 0) {
                echo("\n\e[33m--------------------------------------------------\n" .
                    "\e[91mCAN ONLY SEED EMPTY DATABASE! PLEASE RERUN MIGRATIONS FIRST!\n".
                    "\e[33m--------------------------------------------------\n\e[39m");
                echo ("Run \e[34m`php artisan migrate:fresh`\e[39m? (\e[92my\e[39m/\e[91mn\e[39m): \e[93m");
                $line = readline();
                echo ("\e[39m");
                if(trim(strtolower($line[0])) == 'y'){
                    echo ("\e[93mRunning \e[34m`php artisan migrate:fresh`\e[39m\n");
                    exec('php artisan migrate:fresh 2>&1', $output);
                    echo ("\e[92mMigration \e[32mOK\e[39m\n\n");
                }
                else{
                    echo("\n\e[91mSeeder exit\n\e[39m"); die();
                }
            }
        } catch (Exception $e){
            echo("\n\e[33m--------------------------------------------------\n" .
                "\e[91mCANNOT FIND DATABASE TABLES!\n".
                "\e[33m--------------------------------------------------\n\e[39m");
            echo ("Run \e[34m`php artisan migrate:fresh`\e[39m? (\e[92my\e[39m/\e[91mn\e[39m): \e[93m");
            $line = readline();
            echo ("\e[39m");
            if(trim(strtolower($line[0])) == 'y'){
                echo ("\e[93mRunning \e[34m`php artisan migrate:fresh`\e[39m\n");
                exec('php artisan migrate:fresh 2>&1');
                echo ("\e[92mMigration \e[32mOK\e[39m\n\n");
            }else{
                echo("\n\e[91mSeeder exit\n\e[39m"); die();
            }
        }
        $this->call(UserSeeder::class);
        echo("\r\e[92mGenerated 50 User with  " . \App\Addresses::all()->count() . " addresses total.\e[39m\n");
        $this->call(BookSeeder::class);
        echo("\r\e[92mGenerated 50 Book with  " .
            \App\Author::all()->count() . " author, " .
            \App\Publisher::all()->count() . " publisher and " .
            \App\Genre::all()->count() . " genre total.\e[39m\n");
        $this->call(OrderSeeder::class);
        echo("\r\e[92mGenerated " . \App\Order::all()->count() . " order with " . \App\Package::all()->count() . "package total.\e[39m\n");
        $this->call(PackageSeeder::class);
    }
}
