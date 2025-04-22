@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/job') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/job/'.$job->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$job->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">

                    <div class="col-5">
                        <label for="title">job title</label>
                        <input type="text" class="form-control" placeholder="Enter job title"
                               name="title" value="{{$job->title}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>

                </div>


                <div class="row pt-3 pb-3 m-0 justify-content-center">
                    <div>
                        <button value="Update" class="btn btn-success" type="submit">update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
