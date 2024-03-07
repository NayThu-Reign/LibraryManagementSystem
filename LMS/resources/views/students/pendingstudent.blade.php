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

           @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{ url("/pendingStudent/accept/$user->id") }}" class="btn btn-outline-primary">Accept</a>
                        <a href="{{ url("/pendingStudent/reject/$user->id") }}" class="btn btn-outline-danger">Reject</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
