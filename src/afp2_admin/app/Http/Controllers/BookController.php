<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //return view('shop_page', ['all_books' => \App\Book::all()]);
        return view('shop.shop_page', ['books' => \App\Book::all()]);
    }

    public function search(Request $request)
    {
        $books = Book::search(htmlspecialchars(trim($request->input('search_field'))));
        return AppHelper::viewWithGuestId('shop.shop_page', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Book $book */
        $book = \App\Book::firstOrNew([
            'ISBN' => $request->get('ISBN'),
            'title' => $request->get('title'),
            'thumbnail' => $request->get('thumbnail'),
            'publish_year' => $request->get('publish_year'),
            'language' => $request->get('language'),
            'page_count' => $request->get('page_count'),
            'publisher_id' => $request->get('publisher_id'),
            'description' => $request->get('description'),
            'can_order' => ($request->get('can_order') ?? 0) == 'on' ? 1 : 0,
            'can_preorder' => ($request->get('can_preorder') ?? 0) == 'on' ? 1 : 0,
            'in_stock' => $request->get('in_stock'),
            'price' => $request->get('price'),
        ]);
        $book->save();
        $book->refresh();

        $this->solveAuthor($request, $book);
        $this->solveGenre($request, $book);

        return redirect()->route('books');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Book $book
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('shop.item', ['book' => Book::where('id', $id)->first()]);
    }

    public function edit($id)
    {
        return view("shop.edit", ['book' => Book::find($id)]);
    }

    public function update(Request $request)
    {
        /** @var Book $book */
        $book = \App\Book::find($request->get('book_id'));
        $book->ISBN = $request->get('ISBN');
        $book->title = $request->get('title');
        $book->thumbnail = $request->get('thumbnail');
        $book->publish_year = $request->get('publish_year');
        $book->language = $request->get('language');
        $book->page_count = $request->get('page_count');
        $book->publisher_id = $request->get('publisher_id');
        $book->description = $request->get('description');
        $book->can_order = ($request->get('can_order') ?? 0) == 'on' ? 1 : 0;
        $book->can_preorder = ($request->get('can_preorder') ?? 0) == 'on' ? 1 : 0;
        $book->in_stock = $request->get('in_stock');
        $book->price = $request->get('price');
        $book->save();
        $book->refresh();

        $this->solveAuthor($request, $book);
        $this->solveGenre($request, $book);

        return redirect()->route('books');
    }


    public function delete($id)
    {
        Book::destroy($id);
        return redirect()->route('books');
    }

    /**
     * @param Request $request
     * @param Book $book
     */
    public function solveAuthor(Request $request, Book $book): void
    {
        foreach (explode(',', $request->get('authors_selected')) as $a) {
            if (is_numeric($a) && Author::all()->where('id', '=', $a)->count() > 0) {
                DB::table('book_authors')->insert([
                    'author_id' => $a,
                    'book_id' => $book->id
                ]);
            } else {
                $author = Author::firstOrNew(['name' => $a]);
                $author->save();
                $author->refresh();
                DB::table('book_authors')->insert([
                    'author_id' => $author->id,
                    'book_id' => $book->id
                ]);
            }
        }
    }

    /**
     * @param Request $request
     * @param Book $book
     */
    public function solveGenre(Request $request, Book $book): void
    {
        foreach (explode(',', $request->get('genres_selected')) as $a) {
            if (is_numeric($a) && Genre::all()->where('id', '=', $a)->count() > 0) {
                DB::table('book_genres')->insert([
                    'genre_id' => $a,
                    'book_id' => $book->id
                ]);
            } else {
                $genre = Genre::firstOrNew(['name_en' => $a]);
                $genre->save();
                $genre->refresh();
                DB::table('book_genres')->insert([
                    'genre_id' => $genre->id,
                    'book_id' => $book->id
                ]);
            }
        }
    }
}
