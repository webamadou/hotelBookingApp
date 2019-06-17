@extends('layout')

@section('content')
<a href="{{ route('room.create')}}" class="btn btn-primary">Add A Room</a>

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<div class="row">
@foreach($rooms as $room)
<div class="col-md-4 book-desc">
    <div class="card">
        <img class="" src="{{ asset("storage/$room->image") }}" widt="200" height="200" >
        <div class="card-body">
            <h4 class="card-title">Room Name: {{ $room->name}}</h4>
            <a href="{{ route('room.edit', $room->id) }}" class="btn btn-primary">Edit</a>
            {!! Form::open(['method' => 'DELETE',
            'route' => ['room.destroy', $room->id]]) !!}
            <ul>
                <li>Room Type: {{ $room->roomType->name}}</li>
                <li>Room Capacity: {{ $room->roomCapacity->name}}</li>
            </ul>
            <button type="submit" class="btn btn-danger">Delete</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
