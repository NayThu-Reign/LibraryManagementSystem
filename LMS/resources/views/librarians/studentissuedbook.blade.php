@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table table-striped table-bordered">
            <tr>
                 <th>ID</th>
                 <th>Title</th>
                 <th>Student</th>
                 <th>Issued Date</th>
            </tr>
            @foreach ($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        <td>
                            @foreach ($users as $user)
                                @if ($book->users_id == $user->id)
                                    {{$user->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$book->issue_date}}</td>
                    </tr>
            @endforeach

         </table>
    </div>
@endsection
