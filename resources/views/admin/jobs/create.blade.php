@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/job') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/job') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row my-3 justify-content-center">
                    <div class="col-6">
                        <label for="title">job title</label>
                        <input type="text" class="form-control" placeholder="Enter job title"
                               name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>
                </div>

                <div class="row pt-3 pb-3 m-0 justify-content-center">
                    <div>
                        <button class="btn btn-success" value="Save" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
