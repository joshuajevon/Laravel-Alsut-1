<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    public function createBook(){
        return view('createBook');
    }

    public function storeBook(Request $request){
        Book::create([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author
    //nama atribut dari model => $request->nama dari input form
        ]);
        return redirect('/');
    }
}
