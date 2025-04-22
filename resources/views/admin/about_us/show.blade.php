@extends('dashboard_layout')
@section('content')

    <div class="container text-center">

        <div class="row">
            <a href="{{ url('admin/about_us') }}" class="btn btn-danger">BACK</a>
        </div>

        <br>

        <div class="row justify-content-center">
            <div class="col-5">
            <p>About Us :{{$about->about}}</p>
                <hr>
            <p>Our Philosophy :{{$about->philosophy}}</p>
                <hr>
            </div>
        </div>
    </div>
@stop
