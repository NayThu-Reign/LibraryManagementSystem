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
use Illuminate\Support\Collection;


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
        $query = Book::query();

        if(request()->has('book')) {
            $query->where('title', 'like', '%' . request()->input('book') . '%');
        }

        $books = $query->latest()->paginate(20);

        return view('books.book', [
            'books' => $books
        ]);
    }

    public function oldestBooks() {
        $query = Book::query();

        if(request()->has('book')) {
            $query->where('title', 'like', '%' . request()->input('book') . '%');
        }

        $books = $query->paginate(20);
        return view('books.book', [
            'books' => $books
        ]);
    }

    public function popularBooks() {
        $books = Book::where('issued_number', '>=', 2)->paginate(20);

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

        $query = Author::query();

        if(request()->has('author')) {
            $query->where('name', 'like', '%' . request()->input('author') . '%');
        }

        $authors = $query->latest()->paginate(20);


        return view('authors.author', [
            "authors" => $authors
        ]);
    }

    public function authorsByName() {
        $authors = Author::orderBy('name')->paginate(20);

        return view('authors.author', [
            'authors' => $authors
        ]);
    }

    public function authorsByNameDesc() {
        $authors = Author::orderBy('name', 'desc')->paginate(20);

        return view('authors.author', [
            'authors' => $authors
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
