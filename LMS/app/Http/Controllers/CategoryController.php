<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if(auth()->check() && auth()->user()->roles_id !== 1) {
                abort(403, 'Unthorizes action');
            }
            return $next($request);
        });
    }


    public function add() {
        return view('categories.addcategory');
    }

    public function create() {
        $validator = validator(request()->all(), [
            "name" => "required"
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $category = new Category;
        $category->name = request()->name;
        $category->save();

        return redirect('/categories')->with('success', 'Added new Category');
    }

    public function delete($id) {
       $category = Category::find($id);
       $category->delete();

       return redirect('/categories')->with('msg', 'Deleted Category');
    }
}
