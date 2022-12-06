@extends('layouts.app')
@section('content')


</header>
<main class="text-center">
    <a href="{{ route('employees.create') }}" class="btn btn-lg btn-success m-5">Create Employee</a>
</main>
<div class=" container text center">
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emps as $emp)
                <tr>
                    <th scope="row">{{ $emp['id'] }}</th>
                    <td> {{ $emp->name }} </td>

                    {{-- @if ($emp->user)
                        <td> {{ $emp->user->name }} </td>
                    @else --}}
                        <td>{{$emp->email}}</td>
                    {{-- @endif --}}
                    <td> {{ $emp->created_at->format('Y/m/d') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>




@endsection
