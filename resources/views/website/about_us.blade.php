@extends('ui_layout')
@section('content')

    {{--ABOUT US--}}
    @foreach($abouts as $about)

        <section class="light-grey-bg-img mx-0 px-0">

            <div class="d-flex justify-content-center about-us-bg px-0">
                <div class="px-0 d-flex align-items-center">
                    <h1 class="p-4 text-white about_us_h-h d-none d-xl-block">CHANGING WHERE AND HOW YOU WORK</h1>
                    <h2 class="p-4 text-white about_us_h-h d-none d-xl-none d-lg-block">CHANGING WHERE AND HOW YOU
                        WORK</h2>
                    <h4 class="p-4 text-white about_us_h-h d-none d-xl-none d-lg-none d-md-block">CHANGING WHERE AND HOW
                        YOU WORK</h4>
                    <h6 class="p-4 text-white about_us_h-h d-none d-xl-none d-lg-none d-md-none d-sm-block">CHANGING
                        WHERE AND HOW YOU WORK</h6>
                    <p class="p-2 text-white about_us_p-p d-block d-xl-none d-lg-none d-md-none d-sm-none">CHANGING
                        WHERE AND HOW YOU WORK</p>
                </div>
            </div>

            <div class="container pt-3 pb-5">

                <div class="row px-3">
                    <div class="col-lg-4 col-md-12 order-lg-1 order-1">
                        <h1 class="head-h-h">ABOUT&nbsp;<br class="d-none d-lg-block"><span class="co-55">US</span></h1>
                    </div>
                    <div class="col-lg-8 col-md-12 order-lg-2 order-2">
                        <p>{{$about->about}}</p>
                    </div>
                </div>

                <div class="row px-3">
                    <div class="col-12">
                        <hr class="px-0 dark-pg">
                    </div>
                </div>

                <div class="row px-3">
                    <div class="col-lg-4 col-md-12 order-lg-2 order-1 text-lg-right">
                        <h2 class="head-h-h"><span class="co-55">OUR&nbsp;</span><br class="d-none d-lg-block"><span>PHILOSOPHY</span>
                        </h2>
                    </div>

                    <div class="col-lg-8 col-md-12 order-lg-1 order-2">
                        <p>{{$about->philosophy}}</p>
                    </div>

                </div>
            </div>
        </section>

    @endforeach
@stop
