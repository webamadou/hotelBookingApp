@extends('layout')

@section('content')
<div class="card uper">
    <div class="card-header">Add A Price</div>
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
        {!! Form::open(array('url' => route('price.store'),'method' => 'POST','files'=> 'true')) !!}
            <div class="form-group">
                @csrf
                <label for="name">Price Type:</label>
                <select name="price_type" id="price_type" class="form-control">
                    <option value=""> --- </option>
                    <option value="0"> Regular </option>
                    <option value="1"> Dynamic </option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Price Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label for="name">Price Value:</label>
                <input type="text" class="form-control" name="price_value"/>
            </div>
            <div id="regular_price_type" style="display: none">
                <div class="form-group">
                    {!! Form::Label('roomType_id', 'Room Type') !!}
                    {!! Form::select('roomType_id', $roomType, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::Label('roomCapacity_id', 'Room Capacity') !!}
                    {!! Form::select('roomCapacity_id', $roomCapacity, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div id="dynamic_price_type" style="display: none">
                <div class="form-group">
                    <label for="name">Range Start:</label>
                    <input type="text" class="time-picker form-control" name="price_range_start"/>
                </div>
                <div class="form-group">
                    <label for="name">Range End:</label>
                    <input type="text" class="time-picker form-control" name="price_range_end"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{route('roomcapacity.index')}}" class="btn btn-success"> Cancel </a>
        {!! Form::close() !!}
        </form>
    </div>
</div>
@endsection
