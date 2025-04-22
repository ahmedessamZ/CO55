@extends('ui_layout')
@section('content')

{{--FAQS--}}
<section class="light-grey-bg-img">
    <div class="py-5">
        <div class="container">

            <div class="d-flex justify-content-center">
                <div class="position-relative mb-4">
                    <h1>FAQs</h1>
                    <div class="position-absolute border-small-dot-new"></div>
                    <div class="position-absolute border-small-line w-100"></div>
                </div>
            </div>

                <div class="border-bottom d-flex mb-4">
                    <div class="pb-3 px-2 text-center faq-category pointer faq-active" data-target="#general-content">
                        General
                    </div>
                    <div class="pb-3 pl-2 text-center faq-category pointer" data-target="#memberships-content">
                        Memberships
                    </div>
                </div>

                <div id="faq-content">
                    <div class="" id="general-content">

                        @foreach($generalQuestions as $item)
                        <div class="py-4 px-5 my-3">
                            <div class="d-flex justify-content-between pointer faq-header collapsed"
                                 data-target="#gAnswer{{$item->id}}"
                                 data-toggle="collapse">
                                <p class="my-auto">{{$item->question}}</p>

                                <img alt="" class="pointer my-auto plus d-inline"
                                     src="{{asset('images/plus.svg')}}" srcset="">

                                <img alt="" class="pointer mins my-auto d-none"
                                     src="{{asset('images/minus.svg')}}" srcset="">

                            </div>
                            <div class="collapse" id="gAnswer{{$item->id}}" style="">
                                <div class="pt-4">
                                    <p class=" mt-5 d-inline">
                                        {{$item->answer}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-none" id="memberships-content">
                        @foreach($membershipQuestions as $item)
                        <div class="py-4 px-5 my-3">
                            <div class="d-flex justify-content-between pointer faq-header collapsed"
                                 data-target="#mAnswer{{$item->id}}"
                                 data-toggle="collapse">
                                <p class="my-auto">{{$item->question}}</p>
                                <img alt="" class="pointer my-auto plus d-inline"
                                     src="{{asset('images/plus.svg')}}" srcset="">

                                <img alt="" class="pointer mins my-auto d-none"
                                     src="{{asset('images/minus.svg')}}" srcset="">
                            </div>
                            <div class="collapse" id="mAnswer{{$item->id}}" style="">
                                <div class="pt-4">
                                    <p class=" mt-5 d-inline">
                                        {{$item->answer}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="blue-bg p-3 my-5 mx-2">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <h4 class="text-uppercase text-white"> Still need help?</h4>
                        <a href="{{ url('contact-us') }}" class="btn bg-white py-3 col-md-3">contact us</a>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</section>

@stop

@push('uiScripts')
    <script>
        $(document).ready(function () {
            $(".collapse")
                .on("show.bs.collapse", function () {
                    $(this).prev(".faq-header").find(".plus").removeClass("d-inline").addClass("d-none"), $(this).prev(".faq-header").find(".mins").removeClass("d-none").addClass("d-inline");
                })
                .on("hide.bs.collapse", function () {
                    $(this).prev(".faq-header").find(".mins").removeClass("d-inline").addClass("d-none"), $(this).prev(".faq-header").find(".plus").removeClass("d-none").addClass("d-inline");
                }),
                $(".faq-category ").click(function () {
                    $(this).addClass("faq-active").siblings().removeClass("faq-active"), $($(this).data("target")).removeClass("d-none"), $($(this).data("target")).siblings().addClass("d-none");
                }),
                setInterval(() => e(), 1),
                e();
        });
    </script>
@endpush

