@extends('ui_layout')
@section('content')

    {{--CAREERS--}}
    <section class="light-grey-bg-img">
        <div class="container py-5">
            <div class="d-flex justify-content-center">
                <div class="position-relative mb-5">
                    <h2 class="head-h-h">Careers</h2>
                    <div class="position-absolute border-small-dot-new"></div>
                    <div class="position-absolute border-small-line w-100"></div>
                </div>
            </div>

            <div class="d-flex mx-0 justify-content-center careers-bg">
                <div class="px-0 d-flex align-items-center">
                    <h1 class="text-white d-none d-xl-block">JOIN OUR TEAM</h1>
                    <h2 class="text-white d-none d-xl-none d-lg-block">JOIN OUR TEAM</h2>
                    <h3 class="text-white d-none d-xl-none d-lg-none d-md-block">JOIN OUR TEAM</h3>
                    <h4 class="text-white d-none d-xl-none d-lg-none d-md-none d-sm-block">JOIN OUR TEAM</h4>
                    <h5 class="text-white d-block d-xl-none d-lg-none d-md-none d-sm-none">JOIN OUR TEAM</h5>
                </div>
            </div>
            <div class="career-bg-dynamic">
            @foreach($jobs as $job)
                    <div class="flex-column flex-md-row align-items-center d-flex justify-content-between my-5 px-4 py-4">
                        <div class="col-md-5 col-12 mx-0 px-0">
                            <h6>{{$job->title}}</h6>
                        </div>
                        <div class="col-md-4 col-12 mx-0 px-0">
                            <a href="{{ url('job-apply') }}"
                               class="btn blue-bg d-inline-block d-block text-white p-3 my-auto">Apply now </a>
                        </div>
                    </div>
            @endforeach
            </div>
        </div>
    </section>
@stop
