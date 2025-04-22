@extends('dashboard_layout')
@section('content')
    <div class="container-fluid p-0">
        <a href="{{ url('admins') }}" class="btn btn-danger float-end">BACK</a>
        <div class="col-12 p-0">
            <form action="{{ url('admins') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row my-3 justify-content-center">
                    <div class="col-5">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" placeholder="Enter full name"
                               name="name" value="{{old('name')}}">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>
                    <div class="col-5">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter your email"
                               name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>
                </div>

                <div class="row my-3 justify-content-center">
                    <div class="col-5">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password"
                               name="password" value="">
                        <span class="text-danger">@error('password'){{'Password is required and must be 8 characters with numbers and at least one capital litter'}} @enderror</span>
                    </div>
                    <div class="col-5">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Retype your password"
                               name="password_confirmation" value="">
                        <span class="text-danger">@error('confirm_password'){{$message}} @enderror</span>
                    </div>
                </div>

                <div class="row my-3 justify-content-center">
                    <div class="col-5">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" placeholder="Enter your Mobile"
                               name="mobile" value="{{old('mobile')}}">
                        <span class="text-danger">@error('mobile'){{$message}} @enderror</span>
                    </div>
                    <div class="col-5">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image">
                        <span class="text-danger">@error('image'){{$message}} @enderror</span>
                    </div>
                </div>

                <div class="row pt-5 pb-3 m-0 justify-content-center">
                    <div>
                        <button class="btn btn-success" value="Save" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
