<?php

namespace App\Http\Controllers;

use App\Models\IssueBook;
use App\Models\Librarian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Student;

class LibraryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'approval']);
    }

    public function index() {
        return view('index');
    }

    public function books() {
        $books = Book::latest()->paginate(20);
        return view('books.book', [
            'books' => $books
        ]);
    }

    public function bookDetail($id) {
        $book = Book::find($id);

        return view('books.detail', [
            'book' => $book
        ]);
    }

    public function authors() {
        $authors = Author::all();

        return view('authors.author', [
            "authors" => $authors
        ]);
    }

    public function authorDetail($id) {
        $author = Author::find($id);
        $books = Book::all();



        return view('authors.authordetail', [
            "author" => $author,
            "books" => $books
        ]);
    }

    public function categories() {
        $categories = Category::all();
        $books = Book::all();
        return view('categories.category', [
            'categories' => $categories,
            'books' => $books
        ]);
    }

    public function showCategory($id) {
        $category = Category::find($id);
        $books = Book::all();

        return view('categories.showcategory', [
            'category' => $category,
            'books' => $books,
        ]);
    }


    public function approval() {

        return view('approval');
    }
}
