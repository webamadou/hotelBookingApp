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
                <h4 class="card-title">{{ $roomType->name}}</h4>
                <a href="{{ route('roomtype.edit', $roomType->id) }}" class="btn btn-primary">Edit</a>
                {!! Form::open(['method' => 'DELETE',
                'route' => ['roomtype.destroy', $roomType->id]]) !!}
                <button type="submit" class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
