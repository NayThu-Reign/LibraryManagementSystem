@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('msg'))
        <div class="alert alert-info">
            {{ session('msg') }}
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-danger">
            {{ session('info')}}
        </div>
    @endif
    <div class="book-control d-flex justify-content-between text-center">
        <h1 class="mb-5">All Books</h1>
        @auth
            @if (auth()->user()->roles_id == 1)
                <a href="{{ url('/books/add') }}"  class="text-decoration-none text-primary"  style="font-size: 20px">+ Add Book</a>
            @endif
        @endauth
    </div>
    <div class="d-flex flex-wrap book-content mb-5 " style="gap: 30px">
        @foreach ($books as $book)
        <a  href="{{ url("/books/detail/$book->id")}}" class="mb-5 text-decoration-none text-black " style="width: 300px; height: 300px; border: 1px solid grey">
            <div class="mb-3" style="width: 100%; height: 180px">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" style="width: 100%; height: 100%">
                @else
                    <img src="{{ asset('R (8).jpg') }}" alt="{{ $book->name }}" style="width: 100%; height: 100%">

                 @endif
            </div>

            <div class="text-center mt-3">
                <h4 class="ms-auto" style="font-weight: bold">{{ $book->title }}</h4>
            </div>
            {{-- <h5 style="font-weight: bold; margin-top: 50px">{{ $book->author->name }}</h5> --}}
        </a>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
        {{ $books->links() }}
    </div>
</div>

@endsection
