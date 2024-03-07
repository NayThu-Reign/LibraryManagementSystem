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

        <form method="post">
            @csrf
            <div class="mb-2">
                <label>Category</label>
                <input type="text" name="name" class="form-control">
            </div>
            <input type="submit" value="Add Category"  class="btn btn-primary">
        </form>
    </div>


@endsection
