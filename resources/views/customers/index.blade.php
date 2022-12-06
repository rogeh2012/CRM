@extends('layouts.app')
@section('content')
    </header>
    <main class="text-center">
        <a href="{{ route('customers.create') }}" class="btn btn-lg btn-success m-5">Create Customer</a>
    </main>
    <div class=" container text center">
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Call</th>
                    <th scope="col">Visit</th>
                    <th scope="col">Follow Up</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <th scope="row">{{ $customer['id'] }}</th>
                        <td> {{ $customer->fname }} </td>
                        <td> {{ $customer->lname }} </td>
                        @if ($customer->call == 0)
                            <td> No </td>
                        @else
                            <td>Yes</td>
                        @endif
                        @if ($customer->visit == 0)
                            <td> No </td>
                        @else
                            <td>Yes</td>
                        @endif
                        @if ($customer->follow_up == 0)
                            <td> No </td>
                        @else
                            <td>Yes</td>
                        @endif


                        <td> {{ $customer->created_at->format('Y/m/d') }}</td>

                        <td>

                            <form style="display:inline" action="{{ route('customers.edit', $customer['id']) }}"
                                method="get">
                                @csrf
                                <input type="hidden" name="call" value="1">
                                <button type="submit" class="btn btn-sm btn-danger">Add Actions</button>

                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
