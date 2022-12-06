@extends('layouts.app')

@section('content')

    {{-- ============validation alert============= --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    {{-- ============Creating new employee============= --}}


    </header>
    <form action="{{ route('employees.store') }}" method="POST" class=" container w-75 m-5">
        @csrf
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Name:</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email:</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Password:</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control form-control-lg" id="colFormLabelLg">
            </div>
        </div>



        <button type="submit" class="btn btn-lg btn-success m-5">Create</button>
    </form>



@endsection
