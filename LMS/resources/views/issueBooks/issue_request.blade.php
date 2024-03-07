@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session('student'))
            <div class="alert alert-warning">
                {{ session('student') }}
            </div>
        @endif
        <form method="post">
            @csrf
            <div class="mb-2">
                <label>Your Name</label>
                <select name="user_id" class="form-select">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(auth()->user()->id == $user->id)>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Your Email</label>
                <input type="emails" name="email" class="form-control">

            </div>
            <input type="submit" value="Issue" class="btn btn-primary">
        </form>
    </div>
@endsection
