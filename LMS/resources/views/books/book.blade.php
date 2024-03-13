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

    @auth
        @if (auth()->user()->roles_id == 2)
        <div class="book-control d-flex justify-content-between text-center mb-5">
            <h1>All Books</h1>


            <div class="d-flex align-items-center gap-3">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        SortBy
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ url('/books')}}">All Books</a></li>
                        <li><a class="dropdown-item" href="{{ url('/popularbooks')}}">Popular Books</a></li>
                        <li><a class="dropdown-item" href="{{ url('/oldestbooks')}}">Oldest Books</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ url('/booksortdesc') }}">Z-A</a></li> --}}
                        {{-- <li><a class="dropdown-item" href="{{ url('/latestbooks') }}">Latest</a></li> --}}
                        {{-- <li><a class="dropdown-item" href="{{ url('/oldestbooks') }}"></a></li> --}}
                        {{-- <li><a class="dropdown-item" href="#"></a></li> --}}
                    </ul>
                </div>

                <form  method="GET" class="d-flex align-items-center gap-1">
                    @csrf
                    <input type="text" name="book" placeholder="Search..." class="form-control" style="height: 40px">
                    <button type="submit" style="height: 30px;">Search</button>
                </form>
            </div>


            @auth
                @if (auth()->user()->roles_id == 1)
                    <a href="{{ url('/books/add') }}"  class="text-decoration-none text-primary"  style="font-size: 20px">+ Add Book</a>
                @endif
            @endauth
        </div>
        @endif
    @endauth

    @auth
        @if (auth()->user()->roles_id == 1)
        <div class="book-control d-flex justify-content-between text-center mb-5">
            <h1>All Books</h1>


            <div class="d-flex align-items-center gap-3">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        SortBy
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ url('/books')}}">All Books</a></li>
                        <li><a class="dropdown-item" href="{{ url('/popularbooks')}}">Popular Books</a></li>
                        <li><a class="dropdown-item" href="{{ url('/oldestbooks')}}">Oldest Books</a></li>
                    </ul>
                </div>

                <form  method="GET" class="d-flex align-items-center gap-1">
                    @csrf
                    <input type="text" name="book" placeholder="Search..." class="form-control" style="height: 40px">
                    <button type="submit" style="height: 30px;">Search</button>
                </form>
            </div>


                <a href="{{ url('/books/add') }}"  class="text-decoration-none text-primary"  style="font-size: 20px">+ Add Book</a>
        </div>
        @endif
    @endauth
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
