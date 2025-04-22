@extends('ui_layout')
@section('content')

    {{--CAROUSEL--}}
    <div class="carousel slide" data-ride="carousel" id="carouselExampleCaptions">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carouselExampleCaptions"></li>
            <li data-slide-to="1" data-target="#carouselExampleCaptions"></li>
            <li data-slide-to="2" data-target="#carouselExampleCaptions"></li>
            <li data-slide-to="3" data-target="#carouselExampleCaptions"></li>
        </ol>

        <div class="carousel-inner position-relative">

            @foreach($sliders as $slider)

                <div class="carousel-item position-relative @if($loop->first) active @endif">
                    <img alt="..." class="d-block w-100 slidee" src="{{asset('images/'.$slider->image)}}">
                    <div class="container">
                        <div class="carousel-caption d-md-block">
                            <div class="header-card position-absolute p-lg-3 p-2">
                                <h2 class="text-uppercase text-white mb-0 text-left">
                                    {{$slider->title}}
                                </h2>
                                <hr class="bg-white my-1">
                                <a class="btn d-block text-capitalize text-white w-100 blue-bg-hover p-2"
                                   href="{{ url('contact-us') }}">
                                    book a view</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="d-lg-block d-none carousel-control-prev" data-slide="prev" data-target="#carouselExampleCaptions"
                type="button">
            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
        </button>

        <button class="d-lg-block d-none carousel-control-next" data-slide="next" data-target="#carouselExampleCaptions"
                type="button">
            <span aria-hidden="true" class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    {{--SERVICES--}}
    <div class="container">
        <div class=" d-flex justify-content-center mt-5">
            <div class="position-relative">

                <h2 class="head-h-h mt-0 text-uppercase"><span class="co-55">CO-55</span>
                    SERVICES</h2>
                <div class="position-absolute border-small-dot-new"></div>
                <div class="border-small-line"></div>
            </div>
        </div>
    </div>
    <div class="services-bg-dynamic">
        @foreach($services as $service)
            <section>
                <div class="container">
                    <div class="row py-5">
                        <div class="col-md-4 d-flex flex-column @if($loop->odd) order-md-1 @else order-md-2 @endif  order-2">

                            <div class="position-relative mb-4">
                                <h2 class="text-uppercase">{{$service->title}}</h2>
                                <div class="position-absolute border-small-line w-75"></div>
                                <div class="border-small-dot-new"></div>
                            </div>

                            <p>{{$service->body}}</p>

                            <div class="mt-auto">
                <span class="text-center py-2 bg-light d-block mb-3">
                    <div class="d-flex justify-content-center">
                        @foreach($service->service_plans as $plan)
                            <div class="mx-lg-3 mr-md-1 mx-3">
                            <div class="">
                                <img alt="" height="15" src="{{asset('images/'.$plan->plan->logo)}}" srcset=""
                                     width="15">
                            </div>
                            <div>{{$plan->plan->title}}</div>
                        </div>
                        @endforeach
                    </div>
                </span>
                                <a class="btn mx-0 py-2 blue-bg d-block text-white"
                                   href="{{url('services#'.$service->title)}}">learn more</a>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex flex-column @if($loop->odd) order-md-2 @else order-md-1 @endif  order-1">
                            <div class="position-relative">
                                <img alt="" class="img-fluid" src="{{asset('images/'.$service->image)}}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </div>

    {{--WHY--}}
    <div class="dark-image-bg">
        <div class="overlay py-5">
            <div class="container py-1">


                <div class=" d-flex justify-content-center">
                    <div class="position-relative">
                        <h1 class="head-h-h text-uppercase text-white mb-3">
                            WHY <span class="co-55">CO-55</span>
                        </h1>
                        <div class="position-absolute border-small-dot-new-white"></div>
                        <div class="position-absolute border-small-line-white w-100"></div>
                    </div>
                </div>


                <div class="row text-white justify-content-center mt-3 pt-5">
                    @foreach($whys as $why)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 col-12 mb-3">
                            <div class="mb-3">
                                <img alt="" class="img-fluid mx-auto d-block" src="{{asset('images/'.$why->image)}}">
                            </div>
                            <h3 class="why_h_h text-uppercase text-white">{{$why->title}}</h3>
                            <div>
                                <img alt="" class="img-fluid" src="{{asset('images/primary-line.svg')}}" width="255">
                            </div>
                            <p class="why-content">{{$why->body}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{--AMENITIES--}}
    <section class="light-grey-bg-img pb-3">
        <div class="container pb-5">
            <div class="d-flex justify-content-center pt-5 pb-4">
                <div class="position-relative">
                    <h2 class="head-h-h"><span class="co-55">CO-55</span> AMENITIES</h2>
                    <div class="position-absolute border-small-dot-new"></div>
                    <div class="border-small-line"></div>
                </div>
            </div>
            <div class="row justify-content-center">

                @foreach($amenities as $amenity)
                    <div class="col-lg-2 col-md-4 col-6 d-flex flex-column align-items-center mb-5">
                        <div>
                            <img height="40" src="{{asset('images/'.$amenity->icon)}}" width="40">
                        </div>
                        <div class="amenities-small-line my-2"></div>
                        <p class="text-center">{{$amenity->title}}</p>
                        <div class="amenities-big-line "></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{--TESTIMONIALS--}}
    <section class="light-grey-bg-img pb-3">
        <div class="container">

            <div class="d-flex justify-content-center pt-5 mb-3">
                <div class="position-relative">
                    <h2 class="head-h-h"><span class="co-55">CO-55</span> TESTIMONIALS</h2>
                    <div class="position-absolute border-small-dot-new"></div>
                    <div class="border-small-line"></div>
                </div>
            </div>

            <div class="owl-carousel owl-carousel-main py-3 custom-owl owl-loaded owl-drag">

                <div class="owl-stage-outer">
                    <div class="owl-stage">

                        @foreach($testimonials as $testimonial)

                            <div class="owl-item active">
                                <div class="bg-white shadow-custom text-center radius-16 px-4 pb-5 mt-5 mb-4 min-h-350">
                                    <div class="trans-30">

                                        <div class="p-2 d-inline-block light-grey-bg-img shadow radius-16">
                                            <div
                                                class="radius-16 home-carousel-img"
                                                style="background-image: url('{{asset('images/'.$testimonial->company_logo)}}');">
                                            </div>
                                        </div>
                                        <h3 class="my-1">{{$testimonial->author}}</h3>
                                        <div class="why-content mx-auto w-75 light-grey-bg-img my-1 mb-3">
                                            {{$testimonial->author_title}} | {{$testimonial->company}}
                                        </div>

                                        <p class="text-left why-content">{{$testimonial->body}}</p>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div class="owl-nav">
                        <button class="owl-prev" type="button">
                            <i aria-hidden="true" class="fa fa-angle-left"></i></button>
                        <button class="owl-next" type="button">
                            <i aria-hidden="true" class="fa fa-angle-right"></i></button>
                    </div>
                    <div class="owl-dots disabled"></div>
                </div>

            </div>
        </div>
    </section>

@stop



