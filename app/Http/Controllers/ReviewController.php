<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Jobs\AuthorEmail;

class ReviewController extends Controller
{
    public function index($id)
    {
        return view('review', compact('id'));
    }

    public function reviewstore(Request $request)
    {
        $review = new Review();
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->book_id = decrypt($request->book_id);
        $review->user_id = $request->user_id;
        $review->save();
        $author = Author::where('id', decrypt($request->book_id))->first();
        dispatch(new AuthorEmail($author->email))->delay(now()->addSeconds(15));
        return redirect(route('book-details', $request->book_id))->with('flash_msg_success', 'Your review has been submitted Successfully,');
    }
}
