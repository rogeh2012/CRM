@extends('layouts.app')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </header>
    <form action="{{ route('customers.store') }}" method="POST" class=" container w-75 m-5">
        @csrf
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">First Name:</label>
            <div class="col-sm-10">
                <input type="text" name="fname" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Last Name:</label>
            <div class="col-sm-10">
                <input type="text" name="lname" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>

        <div class="row">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label ">Assigned to Employee:</label>
            <div class="col-sm-10">
                <select name="assigned_to" class="form-select" aria-label="Default select">
                    <option value="">Select name</option>
                    @foreach ($emps as $emp)
                        <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-lg btn-success m-5">Create</button>
    </form>
@endsection
