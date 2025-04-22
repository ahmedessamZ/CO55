@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/plan') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/plan/'.$plan->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$plan->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">

                    <div class="col-7 px-5 py-3">
                        <label for="title">Amenity Title</label>
                        <input type="text" class="form-control" placeholder="Enter title"
                               name="title" value="{{$plan->title}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 py-3">
                        <label for="icon">Amenity Icon</label>
                        <input type="file" class="form-control" name="logo">
                        <span class="text-danger">@error('logo'){{$message}} @enderror</span>
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
