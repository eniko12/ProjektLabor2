<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 */
class Genre extends Model
{
    /**
     * @return array|bool
     * @var $ans Illuminate\Database\Eloquent\Collection
     */
    public function Books()
    {
        return $this->belongsToMany(Book::class, 'book_genres');
    }

    public static function search($input)
    {
        $ans = Genre::query()->where('name_en', 'like', '%'.$input.'%')->orWhere('id', '=', $input)->get();
        try{
            if ($ans->count() > 0)
                return $ans;
        }catch (\Exception $e){ return false; }
        return false;
    }
}
