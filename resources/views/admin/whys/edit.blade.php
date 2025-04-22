@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/why') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/why/'.$why->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$why->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">

                    <div class="col-7 px-5 pb-3">

                        <label for="sort">why Sort</label>
                        <select name="sort" class="form-control">
                            <option value="">please select slider order</option>
                            <option {{ $why->sort == "1" ? "selected" : "" }} value="1">1</option>
                            <option {{ $why->sort == "2" ? "selected" : "" }} value="2">2</option>
                            <option {{ $why->sort == "3" ? "selected" : "" }} value="3">3</option>
                        </select>
                        <span class="text-danger">@error('sort'){{$message}} @enderror</span>


                    </div>
                    <div class="col-7 px-5 py-3">
                        <label for="title">why Title</label>
                        <input type="text" class="form-control" placeholder="Enter why card title"
                               name="title" value="{{$why->title}}">
                        <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 py-3">
                        <label for="body">why body</label>
                        <input type="text" class="form-control" placeholder="Enter why card body"
                               name="body" value="{{$why->body}}">
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7 px-5 py-3">
                        <label for="image">why Image</label>
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
