@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Add A Customer</div>
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
        {!! Form::open(array('url' => route('customer.store'),'method' => 'POST','files'=> 'true')) !!}
        <div class="form-group">
            @csrf
            <label for="name">Email:</label>
            <input type="text" class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" name="first_name"/>
        </div>
        <div class="form-group">
            <label for="name">Last Name:</label>
            <input type="text" class="form-control" name="last_name"/>
        </div>
        <div class="form-group">
            <label for="name">Address:</label>
            <input type="text" class="form-control" name="address"/>
        </div>
        <div class="form-group">
            <label for="name">City:</label>
            <input type="text" class="form-control" name="city"/>
        </div>
        <div class="form-group">
            <label for="name">Country:</label>
            <input type="text" class="form-control" name="country"/>
        </div>
        <div class="form-group">
            <label for="name">Phone Number:</label>
            <input type="text" class="form-control" name="phone"/>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{route('customer.index')}}" class="btn btn-success"> Cancel </a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
