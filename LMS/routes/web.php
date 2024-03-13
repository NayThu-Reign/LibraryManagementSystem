<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IssueBookController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Library;


Route::get('/admindashboard', [LibrarianController::class, 'dashboard']);
Route::get('/', [LibraryController::class, 'index']);


Route::get('/approval', [LibraryController::class, 'approval']);


Route::get('/books', [LibraryController::class, 'books']);
Route::get('/popularbooks', [LibraryController::class, 'popularBooks']);
Route::get('/oldestbooks', [LibraryController::class, 'oldestBooks']);
Route::get('/books/detail/{id}', [LibraryController::class, 'bookDetail']);

Route::get('/books/add', [BookController::class, 'add']);
Route::post('books/add', [BookController::class, 'create']);
Route::post('books/detail/{id}', [BookController::class, 'uploadImage']);
Route::get('/books/edit/{id}', [BookController::class, 'edit']);
Route::post('/books/edit/{id}', [BookController::class, 'update']);

Route::get('/categories', [LibraryController::class, 'categories']);

Route::get('/categories/add', [CategoryController::class, 'add']);
Route::post('/categories/add', [CategoryController::class, 'create']);
Route::get('/categories/{id}', [LibraryController::class, 'showCategory']);

Route::get('/books/delete/{id}', [BookController::class, 'delete']);

Route::get('/categories/delete/{id}', [CategoryController::class, 'delete']);

Route::get('/authors', [LibraryController::class, 'authors']);
Route::get('/authorsort', [LibraryController::class, 'authorsByName']);
Route::get('/authorsortdesc', [LibraryController::class, 'authorsByNameDesc']);
Route::get('/authors/detail/{id}', [LibraryController::class, 'authorDetail']);
Route::post('/authors/detail/{id}', [AuthorController::class, 'upload']);
Route::get('/authors/edit/{id}', [AuthorController::class, 'edit']);
Route::post('/authors/edit/{id}', [AuthorController::class, 'update']);

Route::get('/authors/add', [AuthorController::class, 'add']);
Route::post('/authors/add', [AuthorController::class, 'create']);

Route::get('/pendingStudent', [StudentController::class, 'pendingStudent']);
Route::get('/pendingStudent/accept/{id}', [StudentController::class, 'accept']);
Route::get('/pendingStudent/reject/{id}', [StudentController::class, 'reject']);

Route::get('/pendingLibrarian', [LibrarianController::class, 'pendingLibrarian']);
Route::get('/pendingLibrarian/accept/{id}', [LibrarianController::class, 'accept']);
Route::get('/pendingLibrarian/reject/{id}', [LibrarianController::class, 'reject']);
Route::get('/studentissuedbooks', [LibrarianController::class, 'issueBook']);


Route::get('/students', [StudentController::class, 'registerStudent']);
Route::get('/students/suspend/{id}', [StudentController::class, 'suspend']);
Route::get('/students/unsuspend/{id}', [StudentController::class, 'unsuspend']);

Route::get('/books/issue/{id}', [IssueBookController::class, 'formPage']);
Route::post('/books/issue/{id}', [IssueBookController::class, 'issueBook']);

Route::get('/issuebooks', [IssueBookController::class, 'showIssueBook']);

Route::get('/returnbooks/{id}', [IssueBookController::class, 'returnBook']);

Auth::routes();

