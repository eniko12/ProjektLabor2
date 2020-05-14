<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use function foo\func;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('routeis', function ($expression) {
            return "&lt;?php if (fnmatch({$expression}, Route::currentRouteName())) : ?&gt;";
        });

        Blade::directive('endrouteis', function ($expression) {
            return '&lt;?php endif; ?&gt;';
        });

        Blade::directive('routeisnot', function ($expression) {
            return "&lt;?php if (! fnmatch({$expression}, Route::currentRouteName())) : ?&gt;";
        });

        Blade::directive('nav_split', function ($expression) {
            return '<li class="nav-item nav-link"> | </li>';
        });

        Blade::directive('nav_item', function ($expression) {
            if(strpos($expression, ',') == false){
                $route = trim($expression, '\'" ');
                $name = ucfirst($route);
            }else{
                $ex = explode(',', $expression);
                $route = trim($ex[0], '\'" ');
                $name = trim($ex[1], '\'" ');
            }
            $active = \Route::currentRouteName() == $route ? 'active' : '';
            $mark = \Route::currentRouteName() == $route ? '&gt; ' : '';
            return '<li class="nav-item '. $active .'">
<a class="nav-link" href="'. route($route) .'">'. $mark . $name .'</a>
</li>';
        });

        Blade::directive('endrouteisnot', function ($expression) {
            return '&lt;?php endif; ?&gt;';
        });

        Blade::directive('thumbnail', function ($expression) {
            $path = file_exists('images/book/thumbnails/'.$expression) ? 'images/book/thumbnails/'.$expression : 'images/unknown_product.png';
            return '<img src="' . asset($path) . '"/>';
        });

        Blade::directive('thumbnail_fluid', function () {
            //$path = file_exists('images/book/thumbnails/'.$expression) ? 'images/book/thumbnails/'.$expression : 'images/unknown_product.png';
            return '<?php
                    $path = file_exists(\'images/book/thumbnails/\'.$book->thumbnail) ? \'images/book/thumbnails/\'.$book->thumbnail : \'images/unknown_product.png\';
                    echo  "<img src=\"$path\" class=\"img-fluid\"/>";
                    ?>';
            //return "<img src=\"$path\" class=\"img-fluid\"/>";
        });

        Blade::directive('price', function () {
            return "{{ number_format(\$book->price, 0, '.', ' ') }} Ft";
        });

        Blade::directive('title', function (){
            return "{{ \$book->title }}";
        });

        Blade::directive('title_cut', function ($expression) {
            return "{{ \App\Helpers\AppHelper::wrap(\$book->title, $expression) }}";
        });

        Blade::directive('authors', function () {
            return "{{ \$book->getAuthorNames('EMPTY AUTHOR') }}";
        });

        Blade::directive('authors_cut', function ($expression) {
            return "{{ \App\Helpers\AppHelper::wrap(\$book->getAuthorNames('EMPTY AUTHOR'), $expression) }}";
        });

        Blade::directive('authors_cut_or', function ($expression) {
            $params = [];
            eval("\$params = [$expression];");
            list($param1, $param2) = $params;
            return "{{ \App\Helpers\AppHelper::wrap(\$book->getAuthorNames('$param1'), $param2) }}";
        });

        Blade::directive('word_wrap', function ($expression) {
            $params = [];
            eval("\$params = [$expression];");
            list($param1, $param2) = $params;
            return "{{ \App\Helpers\AppHelper::wrap($param1, $param2) }}";
        });

        Blade::directive('authors_or', function ($expression) {
            return "{{ \$book->getAuthorNames('$expression') }}";
        });

        Blade::directive('description', function () {
            return "{{ \$book->description }}";
        });

        Blade::directive('publisher', function () {
            return "{{ \$book->publisher->name }}";
        });

        Blade::directive('description_cut', function ($expression) {
            return "{{ \App\Helpers\AppHelper::wrap(\$book->description, $expression) }}";
        });
    }
}
