@extends('layout')

@section('content')

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<div class="row container">
    <div class="col-md-4 book-desc">
        <div class="card">
            <div class="card-body">
                <h3>Room: {{$booking->room->name}}</h3>
                <hr>
                <h5>From:</h5> {{date('d-m-Y H:i:s', strtotime($booking->date_start))}} -
                    <h5>To:</h5> {{date('d-m-Y H:i:s', strtotime($booking->date_end))}}
                <hr>
                <p>
                    <strong>Room type:</strong> {{$booking->room->roomType->name}} <br>
                    <strong>Room Capacity:</strong> {{$booking->room->roomCapacity->name}}
                </p>
            </div>
        </div>
    </div>
    <div class="vol-md-4">
        <div class="card">
            <div class="card-body">
                <h4>Customer: {{$booking->customer->first_name}} {{$booking->customer->last_name}}</h4>
                <h5>Customer Details:</h5>
                {{$booking->customer->email}} -
                {{$booking->customer->phone}}
                <hr>
                {{$booking->customer->address}} -
                {{$booking->customer->city}} -
                {{$booking->customer->country}}
                <strong>Room Capacity:</strong> {{$booking->room->roomCapacity->name}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-5">
        <a href="{{route('booking.edit', $booking->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{route('booking.index', $booking->id)}}" class="btn btn-success"><< Back</a><br>
    </div>
    <div class="col-5">
        {!! Form::open(['method' => 'DELETE', 'route' => ['booking.destroy', $booking->id]]) !!}
        <button type="submit" class="btn btn-danger">Delete</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection
