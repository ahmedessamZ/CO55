@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/why') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12">
                <img class="pb-2" src="{{asset('images/'.$why->image)}}" width="300px" height="300px" alt="">
                <p>Why Title: {{ $why->title }}</p>
                <p>why body: {{ $why->body }}</p>
                <p>why sort: {{ $why->sort }}</p>
            </div>
        </div>
    </div>
@stop
