@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Add A Room Type</div>
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
        {!! Form::open(array('url' => route('roomtype.store'),'method' => 'POST','files'=> 'true')) !!}
            <div class="form-group">
                @csrf
                <label for="name">Room Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
