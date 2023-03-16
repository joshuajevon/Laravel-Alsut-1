<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(){
        return view('createCategory');
    }

    public function storeCategory(Request $request){
        Category::create([
            'CategoryName' => $request->CategoryName,
        ]);
        return redirect('/');
    }
}
