<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 */
class Author extends Model
{
    /**
     * @return array|bool
     * @var $ans Illuminate\Database\Eloquent\Collection
     */
    public  function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors');
    }

    public static function search($input)
    {
        $ans = Author::query()->where('name', 'like', '%'.$input.'%')->orWhere('id', '=', $input)->get();
        try{
            if ($ans->count() > 0)
                return $ans;
        }catch (\Exception $e){ return false; }
        return false;
    }
}
