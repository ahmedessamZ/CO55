@extends('ui_layout')
@section('content')

{{--JOBAPPLY--}}
<div class="container">

    <div class="d-flex justify-content-center">
        <div class="position-relative m-5">
            <h1 class="head-h-h">APPLY FOR JOB</h1>
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

                <div class="col-10 col-md-8 col-lg-6">

                <h2 class="text-white text-center pb-3">APPLY NOW</h2>
                <div class="mb-2 why-content border-small-line-white"></div>

                <form action="{{ url('job-apply') }}" method="post" class="text-white" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="why-content" for="job_id">Job Title</label>
                        <select class="form-control textarea text-white" name="job_id">
                            <option class="text-dark" value="">please select the title you applying for</option>
                            @foreach($jobs as $item)
                                <option class="text-dark" value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('job_id'){{'The job title field is required'}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label class="why-content" for="name">Name</label>
                        <input type="text" name="name" class="form-control textarea text-white"
                               placeholder="Enter Your Name" value="{{old('name')}}">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label class="why-content" for="mobile">Mobile number</label>
                        <input type="text" name="mobile" class="form-control textarea text-white"
                               placeholder="00 000 000 000" value="{{old('mobile')}}">
                        <span class="text-danger">@error('mobile'){{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label class="why-content" for="email">E-mail</label>
                        <input type="email" name="email" class="form-control textarea text-white"
                               placeholder="example@gmail.com" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label class="why-content" for="filee">Files</label>
                        <input type="file" name="filee">
                       <p><span class="text-danger">@error('filee'){{$message}} @enderror</span></p>
                    </div>

                    <button type="submit" class="btn  d-block blue-bg text-white py-3 w-100">Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
