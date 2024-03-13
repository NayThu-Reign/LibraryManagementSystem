@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif

        @auth
            @if (auth()->user()->roles_id == 2)
            <div class="author-control d-flex justify-content-between text-center mb-5">
                <h1>Authors List</h1>

                <div class="d-flex gap-3 align-items-center">

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            SortBy
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ url('/authorsort')}}">A-Z</a></li>
                            <li><a class="dropdown-item" href="{{ url('/authorsortdesc') }}">Z-A</a></li>
                            {{-- <li><a class="dropdown-item" href="#"></a></li> --}}
                        </ul>
                    </div>

                    <form  method="GET" class="d-flex align-items-center gap-1">
                        @csrf
                        <input type="text" name="author" placeholder="Search..." class="form-control" style="height: 40px">
                        <button type="submit" style="height: 30px;">Search</button>
                    </form>


                </div>


                @auth
                    @if (auth()->user()->roles_id == 1)
                        <a href="{{ url("/authors/add")}}" class="text-decoration-none text-primary" style="font-size: 18px;">+Add Author</a>
                    @endif
                @endauth
            </div>
            @endif
        @endauth


        @auth
            @if(auth()->user()->roles_id == 1)
            <div class="author-control d-flex justify-content-between text-center mb-5">
                <h1>Authors List</h1>

                <div class="d-flex align-items-center gap-3">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            SortBy
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ url('/authorsort')}}">A-Z</a></li>
                            <li><a class="dropdown-item" href="{{ url('/authorsortdesc') }}">Z-A</a></li>
                        </ul>
                    </div>

                    <form method="GET" class="d-flex align-items-center gap-1">
                        @csrf
                        <input type="text" name="author" placeholder="Search..." class="form-control" style="height: 40px">
                        <button type="submit" style="height: 30px">Search</button>
                    </form>

                </div>



                <a href="{{ url("/authors/add")}}" class="text-decoration-none text-primary" style="font-size: 18px;">+Add Author</a>

            </div>

            @endif
        @endauth


        <div class="d-flex flex-wrap mb-5" style="gap: 30px">
            @foreach ($authors as $author)
                <a href="{{ url("/authors/detail/$author->id")}}" class="col-3 mb-5 text-decoration-none text-black" style="width: 300px; height: 200px; border: 1px solid grey">

                    @if ($author->image)
                        <img src="{{ asset('storage/' . $author->image) }}" alt="{{ $author->name }}" style="width: 100%; height: 130px">
                    @else
                        <img src="{{ asset('OIP (26).jpg') }}" alt="{{ $author->name }}" style="width: 100%; height: 130px">

                    @endif
                    {{-- @if ($author->image)
                    <img src="{{asset($author->photo)}}" alt="Author photo" style="height: 150px; border: 1px solid blue">
                    @endif --}}


                    <h4 class="text-center mt-4" style="font-weight: bold">{{$author->name}}</h4>
                </a>
            @endforeach

        </div>

        <div class="d-flex justify-content-end">
            {{ $authors->links() }}
        </div>
    </div>
@endsection
