<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        // $category = Book::find(1)->with(['category','gener'])->first()->toArray();
        $category = Category::where('id', 4)->with('books')->first()->toArray();
        echo "<pre>";
        print_r($category);
    }
}
