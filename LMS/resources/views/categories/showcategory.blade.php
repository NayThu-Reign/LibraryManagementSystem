@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="d-flex justify-content-between text-center">
        <h1>{{$category->name}}</h1>
        @auth
            @if (auth()->user()->roles_id == 1)
                <a href="{{ url("/categories/delete/$category->id") }}" class="text-decoration-none text-danger">Delete This Category</a>
            @endif
        @endauth
       </div>

       <div class="d-flex flex-wrap mb-5 " style="gap: 30px"">
            @foreach ($books as $book)
                @if($category->id === $book->category_id)
                <a  href="{{ url("/books/detail/$book->id")}}" class="mb-5 text-decoration-none text-black" style="width: 300px; height: 300px; border: 1px solid grey;">
                    <div style="width: 100%; height: 200px">
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" style="width: 100%; height: 100%">
                        @else
                            <img src="{{ asset('R (8).jpg') }}" alt="{{ $book->name }}" style="width: 100%; height: 100%">
                        @endif
                    </div>
                    <h4 class="mt-3 text-center" style="font-weight: bold">{{ $book->title }}</h4>
                </a>

                @endif
            @endforeach
        </div>

    </div>

@endsection
