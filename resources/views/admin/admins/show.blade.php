@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admins') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-5">
            <img class="pb-2" src="{{asset('images/'.$admin->image)}}" width="150px" height="150px" alt="">
            <p>Name : {{ $admin->name }}</p>
            <p>Mobile : {{ $admin->mobile }}</p>
            <p>Email : {{ $admin->email }}</p>
            </div>
        </div>
    </div>
@stop
