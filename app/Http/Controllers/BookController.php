<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    public function createBook(){
        $categories = Category::all();
        return view('createBook', compact('categories'));
    }

    public function storeBook(Request $request){

        $request->validate([
            'Name' => 'required|string',
            'PublicationDate' => 'required',
            'Stock' => 'required|numeric|gt:5',
            // gt -> greater than
            'Author' => 'required|string|min:5',
            // min -> minimum huruf abcde
            'BookImg' => 'required|mimes:png,jpg',
            // mimes -> types of file
        ]);

        $bookImg = $request->file('BookImg');
        // dd($bookImg);
        $filename = Str::random(10).'_'.$bookImg->getClientOriginalName();
        $bookImg->storeAs('public/', $filename);

        Book::create([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author,
            'BookImg' => $filename,
            'Category_Id' => $request->CategoryName
    //nama atribut dari model => $request->nama dari input form
        ]);
        return redirect('/');
    }

    public function updateBookView($id){
        // $book = Book::where('id', $id)->get;
        return view('update',[
            'book' => Book::find($id)
        ]);
    }

    public function updateBook(Request $request, $id){
        $bookImg = $request->file('BookImg');
        $book = Book::findOrFail($id);
        // dd($book->BookImg);
        if($bookImg){
            Storage::delete('public/'.$book->BookImg);
            // dd('berhasil');
            $filename = Str::random(10).'_'.$bookImg->getClientOriginalName();
            $bookImg->storeAs('public/', $filename);
            $book->update([
                'BookImg' => $filename
            ]);
        }
        Book::findOrFail($id)->update([
            'Name' => $request->Name,
            'PublicationDate' => $request->PublicationDate,
            'Stock' => $request->Stock,
            'Author' => $request->Author
        ]);

        return redirect(route('home'));
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);
        // dd('test');
        // Book::destroy($id);
        $book->delete();
        Storage::delete('public/'.$book->BookImg);

        return redirect(route('home'));
    }
}
