<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if(auth()->check() && auth()->user()->roles_id !== 1) {
                abort(403, 'Unthorizes action');
            }
            return $next($request);
        });
    }

    public function registerStudent() {
        $students = User::where('roles_id', 2)
                        ->where('approve', 1)
                        ->get();

        return view('students.students', [
            "students" => $students,
        ]);
    }

    public function pendingStudent() {
        $users = User::where('roles_id', 2)
                        ->where('approve', 0)
                        ->get();

        return view('students.pendingstudent', [
            "users" => $users,
        ]);
    }

    public function accept($id) {
        $user = User::find($id);

        $user->approve = 1;
        $user->email_verified_at = now();

        $user->save();

        return back();
    }

    public function reject($id) {
        $user = User::find($id);

        $user->delete();

        return back();
    }

    public function suspend($id) {
        $user = User::find($id);

        if(Gate::allows('suspend-student', $user)) {
            $user->suspended = 1;
            $user->save();

            return back();
        } else {
            return back();
        }
    }
    public function unsuspend($id) {
        $user = User::find($id);

        if(Gate::allows('unsuspend-student', $user)) {
            $user->suspended = 0;
            $user->save();

            return back();
        } else {
            return back();
        }


    }
}
