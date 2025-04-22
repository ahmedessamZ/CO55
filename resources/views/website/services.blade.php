@extends('ui_layout')
@section('content')

    {{--SERVCIES--}}
    <div class="container">
        <div class=" d-flex justify-content-center mt-5 ">
            <div class="position-relative">
                <h2 class="head-h-h mt-0 text-uppercase">SERVICES</h2>
                <div class="position-absolute border-small-dot-new"></div>
                <div class="position-absolute border-small-line w-100"></div>
            </div>
        </div>
    </div>

    <div class="services-bg-dynamic">
@foreach($services as $service)
        <section class="pt-5" id="{{$service->title}}">
            <div class="container py-4">
                <div class="col-lg-8 offset-lg-2">

                    <div class="position-relative mb-4">
                        <h2 class="text-uppercase pt-5">{{$service->title}}</h2>
                        <div class="position-absolute border-small-dot-new"></div>
                        <div class="position-absolute border-small-line line"></div>
                    </div>

                    <div class="position-relative">
                        <img alt="" class="img-fluid" src="{{asset('images/'.$service->image)}}">
                    </div>

                    <p class="col-12 pt-5">{{$service->body}}</p>

                    <span class="text-center py-2 d-block text-capitalize mt-3 mb-3">
                    <div class="d-flex row justify-content-around">

                        @foreach($service->service_logos as $logo)

                        <div class="col-md-3 col-6 my-4">
                            <div class="pb-3 mx-auto">
                                <img alt="" height="50" src="{{asset('images/'.$logo->logo)}}" srcset=""
                                     width="50">
                            </div>
                            <div>{{$logo->logo_title}}</div>
                        </div>

                        @endforeach

                    </div>
            </span>
                    <div class="text-center mt-3 mb-5">
                        <a class="btn mb-5 mt-auto blue-bg text-white nav_hover px-5"
                           href="{{ url('make-an-inquiry') }}">Inquiry Now </a>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    </div>
@stop
