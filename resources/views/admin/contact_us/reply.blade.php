@extends('dashboard_layout')
@section('content')

    <div class="container-fluid p-0">
        <a href="{{ url('admin/contact_us') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admin/contact_us/reply') }}" method="post">
                @csrf

                <div class="row m-0 justify-content-center p-2">

                    <div class="col-7">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name"
                               name="name" value="{{$contact->name}}">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7">
                        <label for="email">Reply</label>
                        <input type="text" class="form-control" placeholder="Enter email"
                               name="email" value="{{$contact->email}}">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>

                    <div class="col-7">
                        <label for="body">Email</label>
                        <textarea rows="4" type="text" class="form-control" placeholder="Enter reply"
                                  name="body"></textarea>
                        <span class="text-danger">@error('body'){{$message}} @enderror</span>
                    </div>

                </div>


                <div class="row pt-3 pb-3 m-0 justify-content-center">
                    <div>
                        <button value="Update" class="btn btn-success" type="submit">Reply</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop
