@extends('ui_layout')
@section('content')

{{--CONTACT US--}}
<div class="container">

    <div class="d-flex justify-content-center">
        <div class="position-relative my-5">
            <h1 class="head-h-h">CONTACT US</h1>
            <div class="position-absolute border-small-dot-new"></div>
            <div class="position-absolute border-small-line w-100"></div>
        </div>
    </div>
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-12">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        </div>
    </div>
    <div class="w-100 h-100 py-5 my-5 contact-us-bg">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8 ">
                <h3 class="text-white text-center mx-0 px-0 pb-3">GET IN TOUCH</h3>
                <div class="mb-2 w-100 why-content border-small-line-white"></div>

                <form action="{{ url('contact-us') }}" method="post" class="form-row justify-content-center text-white" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="why-content" for="name">Name</label>
                            <input type="text" name="name" class="form-control textarea text-white"
                                   placeholder="Name" value="{{old('name')}}">
                            <span class="text-danger">@error('name'){{$message}} @enderror</span>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="why-content" for="company">Company</label>
                            <input type="text" name="company" class="form-control textarea text-white"
                                   placeholder="Company" value="{{old('company')}}">
                            <span class="text-danger">@error('company'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="why-content" for="mobile">Mobile number</label>
                            <input type="text" name="mobile" class="form-control textarea text-white"
                                   placeholder="00 000 000 000" value="{{old('mobile')}}">
                            <span class="text-danger">@error('mobile'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="why-content" for="email">E-mail</label>
                            <input type="email" name="email" class="form-control textarea text-white"
                                   placeholder="example@gmail.com" value="{{old('email')}}">
                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label class="why-content" for="body">Message</label>
                        <textarea class="form-control textarea text-white" name="body" rows="4"
                                  placeholder="Message">{{old('body')}}</textarea>
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
                    </div>

                    <button type="submit" class="btn d-block blue-bg text-white py-3 col-12 col-md-8 mx-auto">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>

@stop
