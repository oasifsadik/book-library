<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class FontendCOntroller extends Controller
{
    function index()
    {
        $books = Book::get();
        return view('home',compact('books'));
    }
    public function single($id)
    {

    }
}
