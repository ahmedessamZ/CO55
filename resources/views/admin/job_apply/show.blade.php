@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/job_apply') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-7">
                <p>JobTitle: {{ $application->job->title }}</p>
                <p>Name: {{ $application->name }}</p>
                <p>Mobile: {{ $application->mobile }}</p>
                <p>Email: {{ $application->email }}</p>
                <p>File: {{ $application->file }}</p>
            </div>
        </div>
    </div>
@stop
