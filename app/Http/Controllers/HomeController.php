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
                $allBookData[$a]['bookId'] =Helper::encrypt($book['id']);
                $allBookData[$a]['bookName'] = $book['name'];
                $allBookData[$a]['bookImage'] = $book['image'];
                $i = 0;
                $j = 0;
                if (isset($book['authors'])) {
                    foreach ($book['authors'] as $authors) {
                        $allBookData[$a]['bookAuthor'][$j]['name'] = $authors['name'];
                        $j++;
                    }
                }
                $allBookData[$a]['bookGener'] = $book['gener']['name'];
                $a++;
            }
        return view('allbooks', compact('allBookData'));
    }
}
