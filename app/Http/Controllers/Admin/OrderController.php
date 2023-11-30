<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function allOrder()
    {
        $books = OrderItem::all();
        return view('admin.orderBook',compact('books'));
    }

    public function approved($id)
    {
        $order = OrderItem::findOrFail($id);
        $order->admin_approved = 'approved';
        $order->save();

        return redirect()->back();
    }
}
