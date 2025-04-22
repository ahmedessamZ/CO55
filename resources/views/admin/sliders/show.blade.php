@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/slider') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12">
                <img class="pb-2" src="{{asset('images/'.$slider->image)}}" width="600px" height="300px" alt="">
                <p>slider Header Title: {{ $slider->title }}</p>
                <p>slider sort: {{ $slider->sort }}</p>
            </div>
        </div>
    </div>
@stop
