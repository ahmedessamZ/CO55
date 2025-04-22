@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/plan') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/plan') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row my-3 justify-content-center">
                    <div class="col-7 my-3">
                        <label for="title">Plan Title</label>
                        <input type="text" class="form-control" placeholder="Enter title"
                               name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 my-3">
                        <label for="icon">Plan logo</label>
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
