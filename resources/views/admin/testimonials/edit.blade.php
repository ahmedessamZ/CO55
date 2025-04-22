@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/testimonial') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/testimonial/'.$testimonial->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$testimonial->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">

                    <div class="col-7 px-5 pm-2">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" placeholder="Enter author name"
                               name="author" value="{{$testimonial->author}}">
                        <span class="text-danger">@error('author'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 py-2">
                        <label for="author_title">Author Title</label>
                        <input type="text" class="form-control" placeholder="Enter author title"
                               name="author_title" value="{{$testimonial->author_title}}">
                        <span class="text-danger">@error('author_title'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 py-2">
                        <label for="body">body</label>
                        <input type="text" class="form-control" placeholder="Enter body"
                               name="body" value="{{$testimonial->body}}">
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 py-2">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" placeholder="Enter company"
                               name="company" value="{{$testimonial->company}}">
                        <span class="text-danger">@error('company'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 pt-2">
                        <label for="company_logo">Company Logo</label>
                        <input type="file" class="form-control" name="company_logo">
                        <span class="text-danger">@error('company_logo'){{$message}} @enderror</span>
                        <br>
                    </div>
                </div>

                <div class="row pb-4 m-0 justify-content-center">
                    <div>
                        <button value="Update" class="btn btn-success" type="submit">update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
