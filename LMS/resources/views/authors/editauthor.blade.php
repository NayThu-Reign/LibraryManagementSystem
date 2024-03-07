@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>

        @endif
            <form method="post"  enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label>Author Name</label>
                <input type="text" name="name" class="form-control" value="{{ $author->name}}">
            </div>
            <div class="mb-2">
                <label>Author Image</label>
                <input type="file" name="image" class="form-control" value="{{ $author->image}}">
            </div>
            <input type="submit" value="Add Book" class="btn btn-primary">
        </form>
    </div>
@endsection
