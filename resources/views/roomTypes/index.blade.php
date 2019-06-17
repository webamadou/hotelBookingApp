@extends('layout')

@section('content')
<a href="{{ route('roomtype.create')}}" class="btn btn-primary">Add A Room Type</a>

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<div class="row">
    @foreach($roomTypes as $room)
    <div class="col-md-4 book-desc">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a href="{{route('roomtype.show', $room->id)}}">{{ $room->name}}</a></h4>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
