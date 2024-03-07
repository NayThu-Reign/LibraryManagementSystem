<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
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
        $categories = Category::all();
        $authors = Author::all();

        return view('books.addbook', [
            'categories' => $categories,
            'authors' => $authors,
        ]);
    }

    public function create(Request $request) {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imagePath = $request->file('image')->store('book_images', 'public');

        $book = new Book;
        $book->title = request()->title;
        $book->body = request()->body;
        $book->category_id = request()->category_id;
        $book->author_id = request()->author_id;
        // $book->image = request()->image;
        $book->image = $imagePath;

        $book->save();

        return redirect("/books")->with('msg', 'Book Added');
    }

    public function edit($id) {
        $book = Book::find($id);
        $categories = Category::all();
        $authors = Author::all();

        return view('books.editbook', [
            'book' => $book,
            'categories' => $categories,
            'authors' => $authors,
        ]);
    }

    public function update(Request $request, $id) {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imagePath = $request->file('image')->store('book_images', 'public');


        $book = Book::find($id);
        $book->title = request()->title;
        $book->body = request()->body;
        $book->category_id = request()->category_id;
        $book->author_id = request()->author_id;
        // $book->image = request()->image;
        $book->image= $imagePath;

        $book->save();

        return redirect("/books/detail/$book->id")->with('updated', 'Updated Book Details');
    }

    public function uploadImage(Request $request, $id)
{
    $request->validate([
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        // Add more validation rules for other book fields
    ]);

    // Handle photo upload
    $path = null;
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('public');
    }

    // Create new book record
    $book = Book::find($id);
    // $book->title = $request->title;
    // $book->author = $request->author;
    $book->photo = $path;
    // Set other book attributes
    $book->save();

    // Redirect back with a success message
    return back()->with('success', 'Book created successfully.');
}


    public function delete($id) {
        $book = Book::find($id);

        if(Gate::allows('delete-book', $book)) {
            $book->delete();

            return redirect('/books')->with('info', 'Book Deleted');
        } else {
            return back()->with('err', 'Unathorize');
        }
        // return back()->with('err', 'Unathorize');
    }
}
