@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/link') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/link') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row my-3 justify-content-center">
                    <div class="col-7 my-3">
                        <label for="title">link Title</label>
                        <input type="text" class="form-control" placeholder="Enter link title"
                               name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>
                    <div class="col-7 my-3">
                        <label for="body">link Body</label>
                        <input type="text" class="form-control" placeholder="Enter link body"
                               name="body" value="{{old('body')}}">
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 my-3">
                        <label for="logo">link icon</label>
                        <input type="file" class="form-control" name="logo">
                        <span class="text-danger">@error('logo'){{$message}} @enderror</span>
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
