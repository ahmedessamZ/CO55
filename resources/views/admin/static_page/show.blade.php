@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/static_page') }}" class="btn btn-danger">BACK</a>
        </div>

        <br>

        <div class="row justify-content-center">
            <div class="col-10">
            <p>{{$page->title}}</p>
                <hr>
            <p>{{$page->body}}</p>
                <hr>
            </div>
        </div>
    </div>
@stop
