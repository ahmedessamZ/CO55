@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/amenity') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12">
                <img class="pb-4" src="{{asset('images/'.$amenity->icon)}}" width="100px" height="100px" alt="">
                <p>Amenity Title: {{ $amenity->title }}</p>
            </div>
        </div>
    </div>
@stop
