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
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-2">
                <label>Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">
                            {{ $category[ 'name' ] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Author</label>
                <select name="author_id" class="form-select">
                    @foreach ($authors as $author)
                        <option value="{{ $author['id'] }}">
                            {{ $author['name']  }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3 mt-4">
                <input type="file" name="image" class="form-control">
                {{-- <input type="submit" value="UploadImage" class="btn btn-secondary"> --}}
            </div>
            <input type="submit" value="Add Book" class="btn btn-primary">
        </form>
    </div>
@endsection
