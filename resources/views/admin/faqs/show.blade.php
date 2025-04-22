@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/faqs') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-5">
            <p>Name : {{ $faq->type }}</p>
            <p>Mobile : {{ $faq->question }}</p>
            <p>Email : {{ $faq->answer }}</p>
            </div>
        </div>
    </div>
@stop
