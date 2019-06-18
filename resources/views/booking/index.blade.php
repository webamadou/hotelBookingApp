@extends('layout')

@section('content')

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
    {!! Form::open(['url' => route('booking.search'), 'method' => 'POST', 'files' =>'true']) !!}
<div class="row form-group">
    <div class="col-12">Filter By date</div>
    <div class="col-5"><input type="text" name="date_start" id="date_start" placeholder="from ..." class="time-picker form-control"></div>
    <div class="col-5"><input type="text" name="date_end" id="date_end" placeholder="to" class="time-picker form-control"></div>
    <div class="col-md-2"><input type="submit" value="Search" class="btn btn-primary" autofocus></div>
</div>
{!! Form::close() !!}
<div class="row">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Room</th>
            <th scope="col">Customer</th>
            <th scope="col">Date</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td scope="row"></td>
                <td>
                    <a href="{{route('booking.show', $booking->id)}}">
                        {{ $booking->room->name }}<br>
                        <b>Room Type:</b>{{ $booking->room->roomType->name }}
                    </a>
                </td>
                <td>
                <td>
                    {{$booking->customer->first_name}} {{$booking->customer->last_name}} <br>
                    <b>Email: </b>{{ $booking->customer->email }} <br>
                    <b>Phone Number: </b> {{ $booking->customer->phone }}
                </td>
                <td>
                    From: {{$booking->date_start}}
                    To: {{$booking->date_end}}
                </td>
                <td>
                    <a href="{{route('booking.edit', $booking->id)}}" class="btn btn-primary">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['booking.destroy', $booking->id]]) !!}
                    <button type="submit" class="btn btn-danger">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
