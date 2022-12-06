<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index()
    {
        //admin role == 1
        //employee role == 0

        $allEmps = User::where("role", 0)->get();

        return view('employees.index', ['emps' => $allEmps]);
    }

    //=================Create==================

    public function create()
    {
        return view('employees.create');
    }

    //=================store==================

    public function store()
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        request()->all();

        User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password)
        ]);

        return redirect('/customers');
    }
}
