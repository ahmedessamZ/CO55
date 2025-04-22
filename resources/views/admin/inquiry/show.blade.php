@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/inquiry') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-7">
                <p>Location: {{ $inquiry->location->title }}</p>
                <p>Service: {{ $inquiry->service->title }}</p>
                <p>Name: {{ $inquiry->name }}</p>
                <p>Mobile: {{ $inquiry->mobile }}</p>
                <p>Email: {{ $inquiry->email }}</p>
                <p>Company: {{ $inquiry->company }}</p>
                <p>Message: {{ $inquiry->body }}</p>
            </div>
        </div>
    </div>
@stop
