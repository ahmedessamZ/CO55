@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/static_page') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <h4 class="text-center">{{$page->title}}</h4>
            <form action="{{ url('admin/static_page/'.$page->id) }}" method="post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input type="hidden" name="id" value="{{$page->id}}" id="id"/>

                <div class="row m-0 justify-content-center p-2">
                    <div class="col-12 my-3">
                        <label for="body">About Us</label>
                        <textarea rows="8" type="text" class="form-control" placeholder="Enter the text"
                                  name="body">{{$page->body}}</textarea>
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
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
