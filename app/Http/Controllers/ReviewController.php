<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Mail\SendMail;
use App\Models\Author;
use App\Models\Book;
use App\Models\Review;
use App\Models\ReviewUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $review->book_id = Helper::decrypt($request->book_id);
        $review->user_id = $request->user_id;
        $review->save();
        $author = Author::where('id', Helper::decrypt($request->book_id))->first();
        // dd($author);


        $testMailData = [
            'title' => 'The user has give rating and review on your book',
            'body' => 'user and rated your book : ' . $request->rating . 'Star and  the comment is : ' . $request->comment
        ];

        Mail::to($author['email'])->send(new SendMail($testMailData));

        // $to_name = $author['name'];
        // $to_email = $author['email'];
        // $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "User posted a review on your book");
        // Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name)
        //         ->subject('Book Review');
        //     $message->from('SENDER_EMAIL_ADDRESS', 'Test Mail');
        // });

        return redirect(route('book-details', $request->book_id))->with('flash_msg_success', 'Your review has been submitted Successfully,');
    }
}
