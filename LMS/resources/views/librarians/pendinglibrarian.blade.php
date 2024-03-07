@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered">
           <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
           </tr>

           @foreach ($librarians as $librarian)
                <tr>
                    <td>{{$librarian->id}}</td>
                    <td>{{$librarian->name}}</td>
                    <td>{{$librarian->email}}</td>
                    <td>
                        <a href="{{ url("/pendingLibrarian/accept/$librarian->id") }}" class="btn btn-outline-primary">Accept</a>
                        <a href="{{ url("/pendingLibrarian/reject/$librarian->id") }}" class="btn btn-outline-danger">Reject</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
