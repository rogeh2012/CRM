<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    public function index()
    {
        $allEmps = User::where("role", 0)->get();

        return view('employees.index', ['emps' => $allEmps]);
    }


    public function create()
    {
        return view('employees.create');
    }

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
