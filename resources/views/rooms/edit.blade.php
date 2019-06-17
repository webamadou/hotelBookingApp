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
        {!! Form::open(array('url' => route('room.update', $room->id),'method' => 'PUT')) !!}
        <div class="form-group">
            @csrf
            <label for="name">Room Name:</label>
            <input type="text" class="form-control" name="name" value="{{$room->name}}"/>
        </div>
        <div class="form-group">
            {!! Form::Label('roomType_id', 'Room Type') !!}
            {!! Form::select('roomType_id', $roomType, @$room->roomType_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::Label('roomCapacity_id', 'Room Type') !!}
            {!! Form::select('roomCapacity_id', $roomCapacity, null, ['class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-success" href="{{route('room.index')}}"> << Back</a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
