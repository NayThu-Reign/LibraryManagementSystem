@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('msg'))
        <div class="alert alert-danger">
            {{ session('msg') }}
        </div>
    @endif
    <div class="category-control">
        <div class="d-flex text-center justify-content-between gap-3">
            @auth
                @if (auth()->user()->roles_id == 1)
                    <a href="{{ url('/categories/add') }}"  class="text-decoration-none text-primary"  style="font-size: 20px">+ Add Category</a>
                @endif
            @endauth
        </div>
        <div class="row">
            @foreach ($categories as $category)
                <a href="{{ url("/categories/$category->id") }}" class="col-3 text-center text-decoration-none mt-5 mb-3" style="border: 1px solid grey;">
                    <h1 class=" mt-5 mb-5">{{ $category->name }}</h1>
                </a>
            @endforeach

        </div>
    </div>
</div>

@endsection
