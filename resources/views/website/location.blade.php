@extends('ui_layout')
@section('content')

    {{--NEWCAIRO--}}

    <section class="light-grey-bg-img">
        <div class="container">
            <div class="col-lg-8 offset-lg-2">

                <div class="row d-flex justify-content-center px-3 pb-3 pt-5">
                    <div class="position-relative">
                        <h2 class="head-h-h mt-0 text-uppercase">{{$location->title}}</h2>
                        <div class="position-absolute border-small-dot-new"></div>
                        <div class="position-absolute border-small-line w-100"></div>
                    </div>
                </div>

                <div class="carousel slide position-relative" data-ride="carousel" id="carouselExampleCaptions">
                    <ol class="carousel-indicators">
                        @foreach($location->images as $slide)

                        <li data-target="#carouselExampleCaptions"  data-slide-to="{{$loop->iteration-1}}" class="@if($loop->first) active @endif"></li>

                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($location->images as $slide)
                            <div class="carousel-item position-relative @if($loop->first) active @endif">
                                <img src="{{asset('images/'.$slide->slide)}}" class="d-block w-100 slideeee" alt="...">
                            </div>
                        @endforeach

                    </div>

                    <button class="carousel-control-prev" data-slide="prev" data-target="#carouselExampleCaptions"
                            type="button">
                        <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                    </button>

                    <button class="carousel-control-next" data-slide="next" data-target="#carouselExampleCaptions"
                            type="button">
                        <span aria-hidden="true" class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>

                <p class="col-12 mt-3 pt-2">{{$location->body}}</p>

                <div class="d-flex row justify-content-center text-center py-2 mt-3 mb-3">

                    @foreach($location->location_logos as $logo)
                    <div class="col-md-4 col-6 my-2">
                        <div class="pb-3 mx-auto">
                            <img src="{{asset('images/'.$logo->logo)}}" width="50" height="50" alt="" srcset="">
                        </div>
                        <div>{{$logo->logo_title}}</div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <section class="container pb-5">
            <div class="row bg-forms py-3">
                <div class="col-md-8 px-3">
                    <div id="map">
                        <iframe
                            src="{{$location->google_link}}"
                            width="100%" class="rounded-sm mabfram" height="400" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-column text-white">
                    <p>Contact info</p>
                    <div>
                        <div class="d-flex text-white">
                            <div class="mr-3"><i aria-hidden="true" class="fas fa-mobile-alt"></i></div>
                            <div>
                                <p><a class="text-white" href="#">+201004847171</a></p>
                            </div>
                        </div>

                        <hr class="border-small-line-white">
                    </div>
                    <div class="d-flex text-white">
                        <div class="mr-3"><i aria-hidden="true" class="fas fa-envelope"></i></div>
                        <div>
                            <p><a class="text-white" href="#">info@co55eg.com</a></p>
                        </div>
                    </div>
                    <div class="d-flex text-white">
                        <div class="mr-3"><i aria-hidden="true" class="fa fa-map-marker"></i></div>
                        <div>
                            <p>
                                {{$location->location}}
                            </p>
                        </div>
                    </div>
                    <a class="btn blue-bg text-white d-block text-capitalize mt-auto py-2 mb-3"
                       href="{{ url('contact-us') }}"> contact us </a>
                </div>
            </div>
        </section>
    </section>
@stop
