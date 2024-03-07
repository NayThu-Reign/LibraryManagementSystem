@extends('layouts.app')

@section('content')
    <div class="container">

         @if(session('returned'))
            <div class="alert alert-primary">
                {{ session('returned') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <tr>
                 <th>ID</th>
                 <th>Title</th>
                 <th>Actions</th>
            </tr>
            @foreach ($books as $book)
                @if ($book->users_id == auth()->id())
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        <td>
                            <a href="{{url("/returnbooks/$book->id")}}" class="btn btn-outline-primary">Return Book</a>
                        </td>
                    </tr>
                @endif
            @endforeach

         </table>
    </div>
@endsection
