@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Editing Hotel Details</div>
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
        {!! Form::open(array('url' => route('hotel.update', $hotel->id),'method' => 'PUT')) !!}
        <div class="form-group">
            @csrf
            <label for="name">Room Name:</label>
            <input type="text" class="form-control" name="name" value="{{$hotel->name}}"/>
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" name="address" value="{{$hotel->address}}"/>
        </div>
        <div class="form-group">
            <label for="name">City</label>
            <input type="text" class="form-control" name="city" value="{{$hotel->city}}"/>
        </div>
        <div class="form-group">
            <label for="name">State</label>
            <input type="text" class="form-control" name="state" value="{{$hotel->state}}"/>
        </div>
        <div class="form-group">
            <label for="name">Country</label>
            <input type="text" class="form-control" name="country" value="{{$hotel->country}}"/>
        </div>
        <div class="form-group">
            <label for="name">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" value="{{$hotel->phone_number}}"/>
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" name="email" value="{{$hotel->email}}"/>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-success" href="{{route('hotel.index')}}"> << Back</a>
        {!! Form::close() !!}
    </div>
</div>
@endsection
