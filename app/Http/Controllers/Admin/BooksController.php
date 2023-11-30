<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function books()
    {
        return view('admin.books.index');
    }

    public function store(Request $request)
    {
        $book = new Book([
            'name'          => $request['title'],
            'description'   => $request['description'],
            'price'         => $request['price'],
            'status'        => $request['status'],
            'file'          => $request['file'],
        ]);
        if ($request->hasFile('file')) {
            $file       = $request->file('file');
            $extension  = $file->getClientOriginalExtension();
            $filename   = time() . '.' . $extension;
            $file->move('books/', $filename);
            $book->file = $filename;
            $book->save();
        }
        return redirect()->back();
    }

    public function show()
    {
        $books = Book::get();
        return view('admin.books.list',compact('books'));
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.books.edit',compact('book'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name         = $request->title;
        $book->description  = $request->description;
        $book->price        = $request->price;
        $book->status       = $request->status;
        $deleteOldpdf       ='books/'.$book->file;

        if($pdf = $request->file('file')){
            if (file_exists($deleteOldpdf))
            {
                unlink($deleteOldpdf);
            }
            $customimage = time().'.'.$pdf->getClientOriginalExtension();
            $pdf->move("books/" , $customimage);
            }
            else
            {
                $customimage = $book->file;
            }
        $book->file = $customimage;
        $book->update();
        return redirect('/Admin/list');
    }

    public function delete($id)
    {
        $book = Book::find($id);
            if($book)
            {
                $oldpdf = public_path('books/' . $book->file);
                    if (file_exists($oldpdf))
                    {
                        unlink($oldpdf);
                    }
                $book->delete();
            }
        return redirect('/Admin/list');
    }
}
