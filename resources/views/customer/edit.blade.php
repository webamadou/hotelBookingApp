@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Edit Customer</div>
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
        {!! Form::open(array('url' => route('customer.update', $customer->id),'method' => 'PUT')) !!}
        <div class="form-group">
            @csrf
            <label for="name">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$customer->email}}"/>
        </div>
        <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="{{$customer->first_name}}"/>
        </div>
        <div class="form-group">
            <label for="name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="{{$customer->last_name}}"/>
        </div>
        <div class="form-group">
            <label for="name">Address:</label>
            <input type="text" class="form-control" name="address" value="{{$customer->address}}"/>
        </div>
        <div class="form-group">
            <label for="name">City:</label>
            <input type="text" class="form-control" name="city" value="{{$customer->city}}"/>
        </div>
        <div class="form-group">
            <label for="name">Country:</label>
            <input type="text" class="form-control" name="country" value="{{$customer->country}}"/>
        </div>
        <div class="form-group">
            <label for="name">Phone Number:</label>
            <input type="text" class="form-control" name="phone" value="{{$customer->phone}}"/>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{route('customer.index')}}" class="btn btn-success"> Cancel </a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
