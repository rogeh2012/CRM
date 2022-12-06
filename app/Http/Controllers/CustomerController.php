<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $allCustomers = Customer::all();

        return view('customers.index', ['customers' => $allCustomers]);
    }

    //=================Create==================
    public function create()
    {
        //admin role == 1
        //employee role == 0

        $emps = User::where("role", 0)->get();

        return view('customers.create', ['emps' => $emps]);
    }

    //=================store==================

    public function store()
    {
        request()->validate([
            'fname'=>['required'],
            'lname'=>['required'],
        ]);

        request()->all();

        Customer::create([
            'fname' => request()->fname,
            'lname' => request()->lname,
            'emp_id' => request()->assigned_to
        ]);

        return redirect('/customers');
    }
        //=================edit==================

    public function edit($customerId)
    {
        $emps = User::where("role", 0)->get();

        $customer = Customer::where('id', $customerId)->first();
        // dd($customerId);
        return view('customers.edit', ['customerId' => $customerId, 'customer' => $customer,'emps' => $emps]);
    }

        //=================update==================

    public function update($customerId)
    {
        $customer = Customer::find($customerId);

        $customer->call = request()->call;
        $customer->visit = request()->visit;
        $customer->follow_up = request()->follow_up;

        $customer->emp_id = request()->assigned_to;

        $customer->save();


        return redirect('/customers');
    }
}
