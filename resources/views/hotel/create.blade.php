@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Add A Room Capacity</div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <!-- <form method="post" action="{{ route('room.store') }}"> -->
        {!! Form::open(array('url' => route('roomcapacity.store'),'method' => 'POST','files'=> 'true')) !!}
            <div class="form-group">
                @csrf
                <label for="name">Room Capacity Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{route('roomcapacity.index')}}" class="btn btn-success"> Cancel </a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
