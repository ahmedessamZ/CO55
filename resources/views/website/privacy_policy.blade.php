@extends('ui_layout')
@section('content')

    {{--TITLE--}}
<div class="container">
    <div class=" d-flex justify-content-center mt-5 ">
        <div class="position-relative">
            <h2 class="head-h-h mt-0 text-uppercase">PRIVACY POLICY</h2>
            <div class="position-absolute border-small-dot-new"></div>
            <div class="position-absolute border-small-line w-100"></div>
        </div>
    </div>
</div>
<div class="container py-4">
    <div class="col-12 d-flex flex-column">
        <div class="position-relative mb-4">
            <p>
                @foreach($privacy as $item)
                    {{$item->body}}
                @endforeach
            </p>
        </div>
    </div>
</div>

@stop
