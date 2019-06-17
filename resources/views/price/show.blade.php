@extends('layout')

@section('content')

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<div class="row">
    <div class="col-md-4 book-desc">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $price->name}} - ${{$price->price_value}}</h4>
                <p><b>Price Type: {{$price->price_type > 0?'Dynamic':'Regular'}}</b></p>
                @if($price->price_type > 0)
                <p><b>From</b> {{$price->date_range_start}} <b>To</b> {{$price->date_range_end}}</p>
                @else
                <p><b>Room Type:</b> {{$price->roomType->name}}</p>
                <p><b>Room Capacity:</b> {{$price->roomCapacity->name}}</p>
                @endif
                <a href="{{ route('price.edit', $price->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('price.index') }}" class="btn btn-success">Back</a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['price.destroy', $price->id]]) !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
