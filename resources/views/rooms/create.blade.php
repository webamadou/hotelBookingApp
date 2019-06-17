@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Add A Room</div>
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
        {!! Form::open(array('url' => route('room.store'),'method' => 'POST','files'=> 'true')) !!}
            <div class="form-group">
                @csrf
                <label for="name">Room Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                {!! Form::Label('roomType_id', 'Room Type') !!}
                {!! Form::select('roomType_id', $roomType, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::Label('roomCapacity_id', 'Room Type') !!}
                {!! Form::select('roomCapacity_id', $roomCapacity, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="image">Room Image:</label>
                {!! Form::file("image", [ "class" => "form-control", ]) !!}
                <!--<input type="file" class="form-control" name="image"/>-->
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
