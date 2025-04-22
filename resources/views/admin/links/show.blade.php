@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/link') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12">
                <img style="background: #7a8793; padding: 5px" class="mb-5" src="{{asset('images/'.$link->logo)}}" width="100px" height="100px" alt="">
                <p>link Title: {{ $link->title }}</p>
                <p>link body: {{ $link->body }}</p>
            </div>
        </div>
    </div>
@stop
