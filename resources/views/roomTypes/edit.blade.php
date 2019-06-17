@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Editing Room Type</div>
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
        {!! Form::open(array('url' => route('roomtype.update', $roomType->id),'method' => 'PUT')) !!}
        <div class="form-group">
            @csrf
            <label for="name">Room Name:</label>
            <input type="text" class="form-control" name="name" value="{{$roomType->name}}"/>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-success" href="{{route('roomtype.index')}}"> << Back</a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
