<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::with(['authors', 'gener'])->get();
        $allBookData = [];
        $a = 0;
        foreach ($books as $book) {
            $allBookData[$a]['bookId'] = encrypt($book['id']);
            $allBookData[$a]['price'] = $book['price'];
            $allBookData[$a]['bookName'] = $book['name'];
            $allBookData[$a]['bookImage'] = $book['image'];
            if (isset($book['authors'])) {
                $name = [];
                foreach ($book['authors'] as $authors) {
                    array_push($name, $authors['name']);
                }
            }
            $allBookData[$a]['bookAuthor'] = implode(', ', $name);
            $a++;
        }
        return view('allbooks', compact('allBookData'));
    }
}
