@extends('layout')

@section('content')
<a href="{{ route('price.create')}}" class="btn btn-primary">Add A Price</a>

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif
<div class="row">
    @foreach($prices as $price)
    <div class="col-md-4 book-desc">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a href="{{route('price.show', $price->id)}}">{{ $price->name}}</a></h4>
                <b>Price: ${{$price->price_value}}</b>
                <b>Type: {{$price->price_type > 0? 'dynamic':'Regular'}}</b>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
