@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/about_us') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/about_us/'.$about->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$about->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">

                    <div class="col-12 my-3">
                        <label for="about">About Us</label>
                        <textarea type="text" class="form-control" placeholder="Enter the text"
                                  name="about" rows="3">{{$about->about}}</textarea>
                        <span class="text-danger">@error('about'){{$message}} @enderror</span>
                    </div>

                    <div class="col-12 my-3">
                        <label for="philosophy">Our Philosophy</label>
                        <textarea type="text" class="form-control" placeholder="Enter the text"
                                  name="philosophy" rows="3">{{$about->philosophy}}</textarea>
                        <span class="text-danger">@error('philosophy'){{$message}} @enderror</span>
                    </div>
                </div>

                <div class="row pt-3 pb-3 m-0 justify-content-center">
                    <div>
                        <button value="Update" class="btn btn-success px-5" type="submit">update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
