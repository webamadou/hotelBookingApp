@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Edit Booking</div>
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
        {!! Form::open(array('url' => route('booking.update', $booking->id),'method' => 'PUT')) !!}
        <div class="form-group">
            @csrf
            {!! Form::Label('room_id', 'Room') !!}
            {!! Form::select('room_id', $room, @$booking->room_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::Label('user_id', 'Customer') !!}
            {!! Form::select('user_id', $customer, @$booking->user_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="name">Date Start:</label>
            <input type="text" class="time-picker form-control" name="date_start" value="{{$booking->date_start}}"/>
        </div>
        <div class="form-group">
            <label for="name">Date End:</label>
            <input type="text" class="time-picker form-control" name="date_end" value="{{$booking->date_end}}"/>
        </div>
        <button type="submit" class="btn btn-primary" autofocus>Save</button> -
        <a href="{{route('booking.index')}}" class="btn btn-success"> Cancel </a>
        <a href="{{route('booking.calendar')}}" class="btn btn-success"> Go To Calendar </a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
