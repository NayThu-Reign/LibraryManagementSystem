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

           @foreach ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        <a href="#" class="btn btn-outline-primary">Active</a>
                        @if ($student->suspended == 1)
                            <a href="{{ url("/students/unsuspend/$student->id")}}" class="btn btn-danger">Suspend</a>
                         @else
                            <a href="{{ url("/students/suspend/$student->id")}}" class="btn btn-outline-danger">Suspend</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
