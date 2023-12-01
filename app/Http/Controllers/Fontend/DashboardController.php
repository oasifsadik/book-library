<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return view('fontend.dashboard',compact('books'));
    }

    public function single($id)
    {
        $book = Book::find($id);
        return view('fontend.singleBook',compact('book'));
    }
    public function orderItem(Request $request, $id)
    {
        $book = Book::find($id);
        if (!Auth::check())
        {
            return redirect()->route('login')->with('error', 'Please log in to order the book');
        }
        if ($book->status == 'premium')
        {
            $orderItem = new OrderItem([
                'book_id' => $book->id,
                'user_id' => Auth::user()->id
            ]);
            $orderItem->save();
            return redirect('/user/Dashboard');
        }
        else
        {
            return redirect()->back()->with('error', 'This book is not available for order');
        }
    }

    public function orderbook($id)
    {
        $orderedBooks = OrderItem::with('book')
                                    ->where('user_id',$id)
                                    ->get();
        return view('fontend.orderBook',compact('orderedBooks'));
    }

    public function buybooks($id)
    {
        $buys = OrderItem::with('book')
                            ->where('user_id',$id)
                            ->where('admin_approved','approved')
                            ->get();
        return view('fontend.buyBook',compact('buys'));
    }

}
