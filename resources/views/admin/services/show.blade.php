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
            <a href="{{ url('admin/service') }}" class="btn btn-danger">BACK</a>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-12 flex-column">

                <div><h3 class="my-3"> Service Name: </h3> {{ $service->title }}</div>
                <br>
                <br>
                <div><h3 class="my-3"> Service description: </h3>
                    <p> {{ $service->body }} </p></div>
                <br>
                <br>
                <div><h3 class="my-3"> Service Image: </h3><img src="{{asset('images/'.$service->image)}}" width="400px"
                                                                height="auto"></div>
                <br>
                <br>
                <h3 class="my-3">Logo:</h3>

                @foreach($service->service_logos as $logoo)
                    <div class="row mb-3">
                        <div class="col">
                            {{ $logoo->logo_title }}

                            <img class="mx-5" src="{{asset('images/'.$logoo->logo)}}" width="20px"
                                 height="20px">

                        </div>
                    </div>
                @endforeach
                <br>
                <br>
                <h3 class="my-3"> Service Plans: </h3>

                @foreach($service->service_plans as $plan)
                    <div class="row mb-3">
                        <div class="col">
                            <div><p>{{$plan->plan->title}}</p></div>
                            <img src="{{asset('images/'.$plan->plan->logo)}}" class="mb-3 mx-0" width="90px"
                                 height="60px">
                        </div>
                    </div>
                @endforeach
                <br>
                <br>
            </div>
        </div>
@stop
