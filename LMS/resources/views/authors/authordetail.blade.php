@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="author-profile d-flex gap-5 mb-5">
            @if ($author->image)
             <img src="{{ asset('storage/' . $author->image) }}" alt="{{ $author->name }}" style="width: 150px; height: 180px">
            @endif
                <h1 class="mb-5">{{$author->name}}</h1>
            </div>
            @auth
                @if(auth()->user()->roles_id == 1)
                    <a href="{{ url("/authors/edit/$author->id") }}" class="btn btn-outline-secondary mb-5">Edit</a>
                @endif
            @endauth

        <div class="d-flex flex-wrap book-content mb-5 " style="gap: 30px"">
            @foreach ($books as $book)
                @if($book->author_id === $author->id)
                <a  href="{{ url("/books/detail/$book->id")}}" class="mb-5 text-decoration-none text-black" style="width: 300px; height: 300px; border: 1px solid grey;">
                    <div style="width: 100%; height: 200px">
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" style="width: 100%; height: 100%">
                         @endif
                    </div>
                    <h4 class="mt-3 text-center" style="font-weight: bold">{{ $book->title }}</h4>
                </a>

                @endif
            @endforeach
        </div>
    </div>


@endsection
