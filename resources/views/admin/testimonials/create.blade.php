@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/testimonial') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/testimonial') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row my-3 justify-content-center">

                    <div class="col-7 mb-2">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" placeholder="Enter Author name"
                               name="author" value="{{old('author')}}">
                        <span class="text-danger">@error('author'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 my-2">
                        <label for="author_title">Author Title</label>
                        <input type="text" class="form-control" placeholder="Enter Author title"
                               name="author_title" value="{{old('author_title')}}">
                        <span class="text-danger">@error('author_title'){{$message}} @enderror</span>
                    </div>

                        <div class="col-7 my-2">
                            <label for="body">Body</label>
                            <input type="text" class="form-control" placeholder="Enter testimonial body"
                                   name="body" value="{{old('body')}}">
                            <span class="text-danger">@error('body'){{$message}} @enderror</span>
                        </div>
                        <div class="col-7 my-2">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" placeholder="Enter company name"
                                   name="company" value="{{old('company')}}">
                            <span class="text-danger">@error('company'){{$message}} @enderror</span>
                        </div>

                        <div class="col-7 mt-2">
                            <label for="company_logo">Company Logo</label>
                            <input type="file" class="form-control" name="company_logo">
                            <span class="text-danger">@error('company_logo'){{$message}} @enderror</span>
                        </div>

                </div>

                    <div class="row pb-3 m-0 justify-content-center">
                        <div>
                            <button class="btn btn-success" value="Save" type="submit">Add</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@stop
