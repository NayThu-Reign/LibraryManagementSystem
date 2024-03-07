<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AuthorController extends Controller
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


    public function upload($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return back()->withErrors(['error' => 'Author not found.']);
        }

        if (request()->hasFile('photo')) {
            $file = request()->file('photo');

            if ($file->isValid()) {
                $name = $file->getClientOriginalName();
                $type = $file->getClientMimeType();

                if ($type === "image/jpeg" || $type === "image/png") {
                    // Store the file in the public/img directory
                    $filePath = $file->store('public/photos/authors');

                    // Update the author's photo information in the database
                    $author->photo = $filePath;
                    $author->save();

                    return redirect("/authors/detail/$author->id")->with('success', 'Photo uploaded successfully.');
                } else {
                    return back()->withErrors(['error' => 'Invalid file type. Only JPEG and PNG images are allowed.']);
                }
            } else {
                return back()->withErrors(['error' => 'Error occurred during file upload. Please try again.']);
            }
        } else {
            return back()->withErrors(['error' => 'No file uploaded.']);
        }
    }

    public function add() {
        $authors = Author::all();

        return view('authors.addauthor', [
            "authors" => $authors
        ]);
    }

    public function create(Request $request) {
        $validator = validator(request()->all(), [
            "name" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imagePath = $request->file('image')->store('author_images', 'public');

        $author = new Author;
        $author->name = request()->name;
        $author->image = $imagePath;
        $author->save();

        return redirect("/authors")->with('msg', 'New Author Added');
    }

    public function edit($id) {
        $author = Author::find($id);

        return view('authors.editauthor', [
            'author' => $author,
        ]);
    }

    public function update(Request $request, $id) {
        $validator = validator(request()->all(), [
            "name" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imagePath = $request->file('image')->store('author_images', 'public');

        $author = Author::find($id);
        $author->name = request()->name;
        $author->image = $imagePath;
        $author->save();

        return redirect("/authors/detail/$author->id")->with('author_updated', 'Updated Author detail');
    }

}
