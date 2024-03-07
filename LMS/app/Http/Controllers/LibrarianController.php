<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Librarian;
use App\Models\User;
use App\Models\Book;
use App\Models\IssueBook;

class LibrarianController extends Controller
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

    public function dashboard() {
        $users = User::where('approve', 0)
                        ->where('roles_id', 2)
                        ->get();
        $students = User::where('approve', 1)
                        ->where('roles_id', 2)
                        ->get();
        $librarians = User::where('roles_id', 1)
                            ->where('approve', 0)
                            ->get();
        $books = Book::all();

        $issueBooks = IssueBook::all();

        return view('librarians.dashboard', [
            'books' => $books,
            'users' => $users,
            'students' => $students,
            'librarians' => $librarians,
            'issueBooks' => $issueBooks,
        ]);
    }

    public function registerLibrarians() {
        $librarians = Librarian::where('roles_id', 1)
                                ->where('approve', 0)
                                ->get();

        return view('', [
            "librarians" => $librarians,
        ]);
    }

    public function pendingLibrarian() {
        $librarians = User::where('approve', 0)
                                ->where('roles_id', 1)
                                ->get();

        return view('librarians.pendinglibrarian', [
            "librarians" => $librarians,
        ]);
    }

    public function accept($id) {
        $librarian = User::find($id);

        $librarian->approve = 1;
        $librarian->email_verified_at = now();

        $librarian->save();

        return back();
    }

    public function reject($id) {
        $librarian = Librarian::find($id);

        $librarian->delete();

        return back();
    }

    public function issueBook() {
        $users = User::all();
        $books = IssueBook::all();

        return view('librarians.studentissuedbook', [
            'books' => $books,
            'users' => $users,
        ]);
    }

}
