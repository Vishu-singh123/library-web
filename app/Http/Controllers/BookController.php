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
        // if (count($books)) {
            foreach ($books as $book) {
                // dd($book);
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
        // dd($allBookData);
        return view('allbooks', compact('allBookData'));
    }
    public function details($id)
    {
        // dd(Helper::decrypt($id));
        $books = Book::where('id', Helper::decrypt($id))->with(['authors', 'category', 'gener', 'reviews'])->first();
        $averageRating = Review::where('Book_id', Helper::decrypt($id))->avg('rating');
        // dd($books);
        $bookData = [];
        $bookData['bookId'] = Helper::encrypt($books['id']);
        $bookData['bookName'] = $books['name'];
        $bookData['bookImage'] = $books['image'];
        $i = 0;
        $j = 0;
        if (isset($books['authors'])) {
            foreach ($books['authors'] as $authors) {
                $bookData['bookAuthor'][$j]['name'] = $authors['name'];
                $j++;
            }
        }
        // $bookData['bookAuthor'] = $books['authors'];
        $bookData['category'] = $books['category']['name'];
        $bookData['gener'] = $books['gener']['name'];
        if (isset($books['reviews'])) {
            foreach ($books['reviews'] as $reviews) {
                $bookData['reviews'][$i]['rating'] = $reviews['rating'];
                $bookData['reviews'][$i]['comment'] = $reviews['comment'];
                $bookData['reviews'][$i]['userName'] = Review::getUserName($reviews['user_id']);
                $i++;
            }
        }
        // dd($bookData);
        return view('books', compact('bookData', 'averageRating'));
    }
}
