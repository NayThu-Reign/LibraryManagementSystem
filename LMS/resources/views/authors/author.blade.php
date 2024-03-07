@extends('layouts.app')

@section('content')

    <div class="container">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <div class="author-control d-flex justify-content-between text-center">
            <h3 class="mb-5">Authors List</h3>
            @auth
                @if (auth()->user()->roles_id == 1)
                    <a href="{{ url("/authors/add")}}" class="text-decoration-none text-primary" style="font-size: 18px;">+Add Author</a>
                @endif
            @endauth
        </div>

        <div class="d-flex flex-wrap mb-5" style="gap: 30px">
            @foreach ($authors as $author)
                <a href="{{ url("/authors/detail/$author->id")}}" class="col-3 mb-5 text-decoration-none text-black" style="width: 300px; height: 200px; border: 1px solid grey">

                    @if ($author->image)
                        <img src="{{ asset('storage/' . $author->image) }}" alt="{{ $author->name }}" style="width: 100%; height: 130px">
                    @endif
                    {{-- @if ($author->image)
                    <img src="{{asset($author->photo)}}" alt="Author photo" style="height: 150px; border: 1px solid blue">
                    @endif --}}


                    <h4 class="text-center mt-4" style="font-weight: bold">{{$author->name}}</h4>
                </a>
            @endforeach

        </div>
    </div>
@endsection
