@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row g-0" style="height: 100vh">
            <div class="col-2 border">
                <div class="mt-2">
                    <div style="width: 100px; height: 100px; margin: auto">
                        <img src="{{asset('R (5).jpg')}}" alt="Librarian photo" style="width: 100%; height: 100%;">

                    </div>
                    <h3 class="mt-2  mb-4 d-flex justify-content-center align-items-center">
                        {{ Auth::user()->name }}
                    </h3>
                </div>

                <ul class="list-group text-center text-center">
                    {{-- <li class="list-group-item d-flex align-items-center justify-content-center" style="height: 80px; font-size: 20px">
                        <a href="{{url("/books")}}" class="ms-2 text-decoration-none d-none d-lg-inline">Books</a>
                    </li> --}}
                    <li class="list-group-item d-flex align-items-center justify-content-center" style="height: 60px; font-size: 20px">
                        <a href="{{url("/categories")}}" class="ms-2 text-decoration-none d-none d-lg-inline">Categories</a>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-center" style="height: 60px; font-size: 20px">
                        <a href="{{url("/authors")}}" class="ms-2 text-decoration-none d-none d-lg-inline">Authors</a>
                    </li>
                    {{-- <li class="list-group-item d-flex align-items-center justify-content-center" style="height: 80px; font-size: 20px">
                        <a href="{{ url('/students')}}" class="ms-2 text-decoration-none d-none d-lg-inline">Students</a>
                    </li> --}}
                    {{-- <li class="list-group-item d-flex align-items-center justify-content-center" style="height: 80px; font-size: 20px">
                        <a href="{{ url("/issuebooks")}}" class="ms-2 text-decoration-none d-none d-lg-inline">Issue Books</a>
                    </li> --}}
                    <li class="list-group-item d-flex align-items-center justify-content-center" style="height: 60px; font-size: 18px">
                        <a href="{{ url("/pendingStudent") }}" class="ms-2 text-decoration-none d-none d-lg-inline">Pending Students <span class=" text-light badge bg-danger rounded-circle">{{count($users) }}</span></a>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-center" style="height: 60px; font-size: 18px">
                        <a href="{{ url("/pendingLibrarian") }}" class="ms-2 text-decoration-none d-none d-lg-inline">Pending Librarians <span class="bg-danger text-light badge rounded-circle">{{count($librarians) }}</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-10">
                <h3 class="text-dark ms-3 mb-5">DashBoard</h3>
                <div class="d-flex gap-5">
                    <a href="{{url("/books")}}"  class="col-3 h3 d-flex  text-center text-light text-decoration-none align-items-center justify-content-center border bg-primary" style="height: 200px; margin-left:100px">
                        <h3 class="me-1">Books</h3>
                        <span class="mb-2">( {{ count($books) }} )</span>
                    </a>
                    <a href="{{ url("/students") }}" class="col-3 h3 d-flex text-center text-light text-decoration-none align-items-center justify-content-center border bg-primary" style="height: 200px;">Students <span class="ms-1">( {{count($students)}} )</span></a>
                    <a href="{{ url('/studentissuedbooks')}}" class=" col-3 h3 d-flex text-center text-light text-decoration-none align-items-center justify-content-center border bg-primary" style="height: 200px;">Issue Books <span class="ms-1">( {{count($issueBooks)}} )</span></a>
                </div>

                </div>
        </div>
    </div>
@endsection
