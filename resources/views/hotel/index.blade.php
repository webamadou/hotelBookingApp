@extends('layout')

@section('content')
<a href="{{ route('roomcapacity.create')}}" class="btn btn-primary">Add A Room Capacity</a>

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<div class="row">
    <div class="col-md-8 book-desc">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Hotel Name: {{ $hotels->name}}</h4>
                <hr width="100%">
                <ul>
                    <li>{{$hotels->address}} - {{$hotels->city}} {{$hotels->state}} - {{$hotels->country}}</li>
                    <li><strong>Email:</strong>{{ $hotels->email }}</li>
                    <li><strong>Phone Number:</strong> {{ $hotels->phone_number }}</li>
                </ul>
                <br><br>
                <p><a href="{{route('hotel.edit',$hotels->id)}}" class="btn btn-primary">Edit</a></p>
            </div>

        </div>
    </div>
</div>
@endsection
