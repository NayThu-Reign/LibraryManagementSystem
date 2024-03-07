@extends('layouts.app')


@section('content')

    <div class="container">
        @if(session('err'))
            <div class="alert alert-warning">
                {{ session('err') }}
            </div>
        @endif

        @if(session('updated'))
            <div class="alert alert-success">
                {{ session('updated') }}
            </div>
        @endif

        @if(session('issued'))
            <div class="alert alert-primary">
                {{ session('issued') }}  <a href="{{url('/issuebooks')}}" class="alert-link">Issued Book List</a>
            </div>
        @endif



        <div class="row book-content mb-5">
            <div class="col-2">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" style="width: 200px; height: 300px">
                @else
                    <img src="{{ asset('R (8).jpg') }}" alt="{{ $book->name }}" style="width: 200px; height: 300px">

                @endif
            </div>
            <div class="col-10">
                <h3 class="mt-3 mb-3" style="font-weight: bold">{{ $book->title }}</h3>
                <div class="mb-5">
                    <h4><b>{{ $book->category->name }}</b></h4> <br>
                    <h4> By <b>{{ $book->author->name }}</b></h4>
                </div>
                @auth
                    @if(auth()->user()->roles_id == 1)
                        <a href="{{ url("/books/edit/$book->id") }}" class="btn btn-outline-secondary">Edit</a>
                        <a href="{{ url("/books/delete/$book->id") }}" class="btn btn-outline-danger">Delete</a>
                    @endif
                @endauth


            </div>
        </div>
        <div class="overview">
            <h3 class="mb-4"><b>Overview</b></h3>
            <p class="mb-4"  style="line-height: 32px; font-size: 16px">{{ $book->body }}</p>
        </div>
       @auth
            <a href="{{ url("/books/issue/$book->id") }}" class="btn btn-primary">Issue Book</a>
       @endauth
    </div>

@endsection
