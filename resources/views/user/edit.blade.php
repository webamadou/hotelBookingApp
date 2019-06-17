@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Edit User</div>
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
        {!! Form::open(array('url' => route('user.update', $user->id),'method' => 'PUT')) !!}
        <div class="form-group">
            @csrf
            <label for="name">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}"/>
        </div>
        <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}"/>
        </div>
        <div class="form-group">
            <label for="name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}"/>
        </div>
        <div class="form-group">
            <label for="name">Address:</label>
            <input type="text" class="form-control" name="address" value="{{$user->address}}"/>
        </div>
        <div class="form-group">
            <label for="name">City:</label>
            <input type="text" class="form-control" name="city" value="{{$user->city}}"/>
        </div>
        <div class="form-group">
            <label for="name">Country:</label>
            <input type="text" class="form-control" name="country" value="{{$user->country}}"/>
        </div>
        <div class="form-group">
            <label for="name">Phone Number:</label>
            <input type="text" class="form-control" name="phone" value="{{$user->phone}}"/>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{route('user.index')}}" class="btn btn-success"> Cancel </a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
