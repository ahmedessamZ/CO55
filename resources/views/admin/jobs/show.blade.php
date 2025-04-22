@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/job') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-5">
            <p>job title: {{ $job->title }}</p>
            </div>
        </div>
    </div>
@stop
