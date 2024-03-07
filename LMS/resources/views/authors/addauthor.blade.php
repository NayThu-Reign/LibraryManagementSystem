@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Author Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Author Image</label>
                <input type="file" name="image" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary">Add Author</button>
        </form>
    </div>



@endsection
