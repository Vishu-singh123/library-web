<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['authors', 'gener'])->get();
        // dd($books);
        $allBookData = [];
        $a = 0;

        foreach ($books as $book) {
            $allBookData[$a]['bookId'] = encrypt($book['id']);
            $allBookData[$a]['bookName'] = $book['name'];
            $allBookData[$a]['bookImage'] = $book['image'];
            $allBookData[$a]['price'] = $book['price'];
            if (isset($book['authors'])) {
                $name = [];
                foreach ($book['authors'] as $authors) {
                    array_push($name, $authors['name']);
                }
            }
            $allBookData[$a]['bookAuthor'] = implode(', ', $name);
            $allBookData[$a]['bookGener'] = $book['gener']['name'];
            $a++;
        }
        // dd($allBookData);
        return view('allbooks', compact('allBookData'));
    }
    public function details($id)
    {
        // dd(decrypt($id));
        // $a = encrypt('1');
        // dd(decrypt($a));
        $books = Book::where('id', decrypt($id))->with(['authors', 'category', 'gener', 'reviews'])->first();
        $averageRating = Review::where('Book_id', decrypt($id))->avg('rating');
        // dd($books);
        $bookData = [];
        $bookData['bookId'] = $books['id'];
        $bookData['bookName'] = $books['name'];
        $bookData['bookImage'] = $books['image'];
        $name = [];
        if (isset($books['authors'])) {
            foreach ($books['authors'] as $authors) {
                array_push($name, $authors['name']);
            }
        }
        $bookData['bookAuthor'] = implode(', ', $name);
        $bookData['category'] = $books['category']['name'];
        $bookData['gener'] = $books['gener']['name'];
        $i = 1;
        if (isset($books['reviews'])) {
            foreach ($books['reviews'] as $reviews) {
                $bookData['reviews'][$i]['rating'] = $reviews['rating'];
                $bookData['reviews'][$i]['comment'] = $reviews['comment'];
                $bookData['reviews'][$i]['userName'] = Review::getUserName($reviews['user_id'])['name'];
                $i++;
            }
        }
        // dd($bookData);
        return view('books', compact('bookData', 'averageRating'));
    }
}
