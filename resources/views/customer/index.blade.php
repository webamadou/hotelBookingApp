@extends('layout')

@section('content')

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<p>
    <a href="{{route('customer.create')}}" class="btn btn-primary">Add A Customer</a>
</p>
<div class="row">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Addresses</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $user)
            <tr>
                <th scope="row"></th>
                <td><a href="{{route('customer.show', $user->id)}}">
                        {{ $user->first_name }} {{ $user->last_name }} <br>
                    </a></td>
                <td>
                    <b>Email: </b>{{ $user->email }} <br>
                    <b>Address: </b>{{ $user->address }} - {{ $user->city }} - {{ $user->country }} <br>
                    <b>Phone Number: </b> {{ $user->phone }}
                </td>
                <td>
                    <a href="{{route('customer.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $user->id]]) !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
