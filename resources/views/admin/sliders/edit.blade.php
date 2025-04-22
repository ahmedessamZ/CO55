@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/slider') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/slider/'.$slider->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$slider->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">

                    <div class="col-7 px-5 pb-3">

                        <label for="sort">slide Sort</label>
                        <select name="sort" class="form-control">
                            <option value="">please select slider order</option>
                            <option {{ $slider->sort == "1" ? "selected" : "" }} value="1">1</option>
                            <option {{ $slider->sort == "2" ? "selected" : "" }} value="2">2</option>
                            <option {{ $slider->sort == "3" ? "selected" : "" }} value="3">3</option>
                            <option {{ $slider->sort == "4" ? "selected" : "" }} value="4">4</option>
                        </select>
                        <span class="text-danger">@error('sort'){{$message}} @enderror</span>

                    </div>

                    <div class="col-7 px-5 py-3">
                        <label for="title">slider Header Title</label>
                        <input type="text" class="form-control" placeholder="Enter card title"
                               name="title" value="{{$slider->title}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 py-3">
                        <label for="image">slide Image</label>
                        <input type="file" class="form-control" name="image">
                        <span class="text-danger">@error('image'){{$message}} @enderror</span>
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
