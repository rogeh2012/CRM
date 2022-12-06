@extends('layouts.app')
@section('content')


{{-- ============Adding Actions to customers============= --}}

    </header>

    <form action="{{ route('customers.update', $customer->id) }}" method="post" class=" container w-75 m-5">
        @csrf
        @method('PUT')
        <h2 class="m-2 my-5">Customer: {{$customer->fname}} {{$customer->lname}}</h2>

        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Call</label>
            <div class="col-sm-10">
                <select name="call" class="form-select" aria-label="Default select">
                    <option selected value="0">No</option>

                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Visit</label>
            <div class="col-sm-10">
                <select name="visit" class="form-select" aria-label="Default select">
                    <option selected value="0">No</option>

                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Follow Up</label>
            <div class="col-sm-10">
                <select name="follow_up" class="form-select" aria-label="Default select">
                    <option selected value="0">No</option>

                    <option value="1">Yes</option>
                </select>
            </div>
        </div>

        {{-- ============Assigning customers to employees============= --}}

        <div class="row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Customer Assigned to</label>
            <div class="col-sm-10">
                <select name="assigned_to" class="form-select" aria-label="Default select">
                    <option value="">Select name</option>
                    @foreach ($emps as $emp)
                    <option value="{{$emp->id}}" @if ($customer['emp_id']==$emp->id) selected  @endif >{{ $emp->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-lg btn-success m-5">Update</button>
    </form>
    @endsection
