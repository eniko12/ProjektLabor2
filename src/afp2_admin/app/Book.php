<?php

namespace App;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int id
 */
class Book extends Model
{
    protected $fillable = [
        'ISBN',
        'title',
        'thumbnail',
        'publish_year',
        'publisher_id',
        'language',
        'page_count',
        'description',
        'can_order',
        'can_preorder',
        'in_stock',
        'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @var $ans Illuminate\Database\Eloquent\Collection
     */
    public static function search($input)
    {
        return Book::query()->where('title', 'like', '%' . $input . '%')->orWhere('id', '=', $input)->orWhere('ISBN', '=', $input);
    }

    public static function searchAuthor($input)
    {
        $b_a = Book_author::query()->where((Author::where('name', 'like', '%' . $input . '%')->id), '==', 'author_id')->get();

        try {
            if ($b_a->count() > 0)
                $ans = Book::query()->where('id', '==', $b_a->book_id)->get();
            try {
                if ($ans->count() > 0)
                    return $ans;
            } catch (\Exception $e) {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
        return [];
    }

    public static function searchGenre($input)
    {
        $b_g = Book_author::query()->where((Genre::where('name_en', 'like', '%' . $input . '%')->id), '==', 'genre_id')->get();

        try {
            if ($b_g->count() > 0)
                $ans = Book::query()->where('id', '==', $b_g->book_id)->get();
            try {
                if ($ans->count() > 0)
                    return $ans;
            } catch (\Exception $e) {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
        return [];
    }

    public static function searchPublisher($input)
    {
        $pub = Publisher::query()->where('name', 'like', '%' . $input . '%')->get();
        try {
            if ($pub->count() > 0)
                $ans = Book::query()->where('publisher_id', '==', $pub->id)->get();
            try {
                if ($ans->count() > 0)
                    return $ans;
            } catch (\Exception $e) {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }

        return [];
    }

    /**
     * @param array $requirements search conditions
     * @return \Illuminate\Support\Collection
     */
    public static function extendedSearch(array $requirements)
    {
        /** @var \Illuminate\Database\Query\Builder $ids */
        $ids =
            DB::table('books')
                ->join('book_authors', 'books.id', '=', 'book_authors.book_id')
                ->join('authors', 'book_authors.author_id', '=', 'authors.id')
                ->join('book_genres', 'books.id', '=', 'book_genres.book_id')
                ->join('genres', 'book_genres.genre_id', '=', 'genres.id')
                ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
                ->where(function ($query) use ($requirements) {
                    /** @var \Illuminate\Database\Query\Builder $query */
                    $query->where('title', 'like', self::searchStringFormatter($requirements['quick_search']))
                        ->orWhere('ISBN', 'like', self::searchStringFormatter($requirements['quick_search']))
                        ->orWhere('books.id', '=', $requirements['quick_search'] ?? 0);
                })
                ->where('price', '>=', trim($requirements['price_min'], ' $€'))
                ->where('price', '<=', trim($requirements['price_max'], ' $€'))
                ->where('page_count', '>=', $requirements['page_min'])
                ->where('page_count', '<=', $requirements['page_max'])
                ->where('language', 'like', $requirements['language']);
        $ids = self::iterateWhere('author', $requirements, $ids);
        $ids = self::iterateWhere('genre', $requirements, $ids, '_en');
        $ids = self::iterateWhere('publisher', $requirements, $ids);
        /** @var Book[] $books */
        //dd($ids->toSql());
        //$query = vsprintf(str_replace(array('?'), array('\'%s\''), $ids->toSql()), $ids->getBindings()); dd($query);
        $books = [];
        $array = $ids->distinct()->orderBy('books.id')->get('books.id');
        foreach ($array as $id) {
            array_push($books, Book::find($id->id));
        }
        return collect($books);
    }

    public static function iterateWhere(string $model, array $requirements, \Illuminate\Database\Query\Builder $ids, string $localized = ''): \Illuminate\Database\Query\Builder
    {
        foreach (array_map('trim', explode(',', $requirements[$model . '_search'])) as $and) {
            $ids = $ids->where($model . 's.name' . $localized, 'like', self::searchStringFormatter($and));
        }
        return $ids;
    }


    private static function searchStringFormatter($str)
    {
        return (($str[0] ?? '') == '$' ? '' : '%') . trim($str, ' $') . (($str[strlen($str) - 1] ?? '') == '$' ? '' : '%');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors')->get();
    }

    public function getAuthorNames($or = '')
    {
        $ans = '';
        foreach ($this->authors() as $author) {
            try {
                $ans .= $author->name . ', ';
            } catch (\Exception $e) {
            }
        }
        return strlen($ans) > 0 ? trim($ans, ', ') : $or;
    }

    public function getGenreNames($or = '')
    {
        $ans = '';
        foreach ($this->genres() as $genre) {
            try {
                $ans .= $genre->name . ', ';
            } catch (\Exception $e) {
            }
        }
        return strlen($ans) > 0 ? trim($ans, ', ') : $or;
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres');
    }


}
