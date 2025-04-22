@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/testimonial') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12">
                <img class="pb-2" src="{{asset('images/'.$testimonial->company_logo)}}" width="100px" height="100px" alt="">
                <p>Testimonial company: {{ $testimonial->company }}</p>
                <p>Testimonial author: {{ $testimonial->author }}</p>
                <p>Testimonial Title: {{ $testimonial->author_title }}</p>
                <p>Testimonial body: {{ $testimonial->body }}</p>
            </div>
        </div>
    </div>
@stop
