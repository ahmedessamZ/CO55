@extends('dashboard_layout')
@section('content')

    <div class="container text-center">
        <div class="row m-0 p-0 justify-content-center">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
        </div>
        <div class="row">
            <a href="{{ url('admin/location') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12 flex-column">
                <div> <h3 class="my-3">Location Name: </h3>{{ $location->title }}</div>
                <br>
                <br>
                <div><h3 class="my-3">Location description:</h3><p> {{ $location->body }} </p></div>
                <br>
                <br>
                <div><h3 class="my-3">Location Image:</h3><img src="{{asset('images/'.$location->image)}}" width="400px" height="auto"></div>
                <br>
                <br>
                <div><h3 class="my-3">Location Address:</h3> <p> {{ $location->location }} </p></div>
                <br>
                <br>
                <div><h3 class="my-3">Google Maps Link:</h3> <p>{{ $location->google_link }}</p></div>
                <br>
                <br>
                    <h3 class="my-3">Logos</h3>

                <div class="row mb-3 justify-content-center">
                @foreach($location->location_logos as $logoo)
                        <div class="col">
                            {{ $logoo->logo_title }}

                            <img class="mx-5" src="{{asset('images/'.$logoo->logo)}}" width="20px"
                                 height="20px">

                        </div>
                @endforeach
                </div>
                <br>
                <br>
                    <h3 class="my-3">Slider images</h3>
                @foreach($location->images as $slidee)
                    <div class="row justify-content-around mb-3">
                        <div class="col">
                            <img src="{{asset('images/'.$slidee->slide)}}" class="mb-3 mx-5" width="300px"
                                 height="auto">

                        </div>
                    </div>
                @endforeach
                <br>
                <br>
            </div>
        </div>
    </div>
@stop
