<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssueBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class IssueBookController extends Controller
{

    public function formPage($id) {
        $book = Book::find($id);
        $users = User::all();

        if($book->issued == 1) {
            exit();
        }

        return view("issueBooks.issue_request", [
            'book' => $book,
            'users' => $users,
         ]);

    }

    public function issueBook(Request $request, $id) {
        $user = User::find($id);


        // $userId = User::all();

        // $user = User::find($userId);
        // $request->validate([
        //     'books_id' => 'required',
        //     'users_id' => 'required', // Ensure books_id is provided
        //     // Add validation rules for other fields if necessary
        // ]);
        // // Update the 'issued' status of the book

        if(Gate::allows('issue-book', $user)) {
            $book = Book::find($id);
            $book->issued = 1;
            $book->save();

            $issueBook = new IssueBook();
            $issueBook->books_id = $book->id;
            $issueBook->users_id = $request->user_id;
            $issueBook->title = $book->title;
            $issueBook->body = $book->body;
            $issueBook->author_id = $book->author_id;
            $issueBook->category_id = $book->category_id;
            $issueBook->issue_date = now();
            $issueBook->save();


            return redirect("/books/detail/$book->id")->with('issued', 'Book Issued. You can check your issued book list in here');
        } else {
            return back()->with('student', 'Only registered Students can issue the books from our library.');
        }

    }

    public function showIssueBook() {
        $users = User::all();
        $books = IssueBook::all();

        return view('issueBooks.issuebook', [
            'books' => $books,
            'users' => $users,
        ]);
    }

    public function returnBook($id) {
        $user = User::find($id);

        if(Gate::allows('return-book', $user)) {
            $issueBook = IssueBook::find($id);

            $book = Book::find($issueBook->books_id);
            if($book) {
                $book->issued = 0;
                $book->save();
            }

             $issueBook->delete();

            return back()->with('returned', 'You returned the book successfully.Hope you enjoyed!');
        } else {
            return back();
        }

    }
}
