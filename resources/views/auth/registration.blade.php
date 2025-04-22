<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        #scrollforma{
            height:100vh ;
            overflow-y: scroll ;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-5 p-0">
            <img class="img-fluid vh-100" src="{{asset('images/logo.png')}}">
        </div>

        <div id="scrollforma" class="col-7 p-0">

            <div class="row m-0 p-5 justify-content-center">
                <div class="col-6 text-center"><h3>Registration</h3></div>
            </div>

            <form action="{{route('registration')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row m-0 justify-content-center p-2">
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

                <div class="row m-0 justify-content-center p-2">
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

                <div class="row m-0 justify-content-center p-2">
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

                <div class="row pt-5 pb-3 m-0 justify-content-center p-2">
                    <div class="col-4">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>

                </div>
                <div class="row m-0 justify-content-center pt-2 pb-2">
                    <div class="col-6 text-center">
                        Already Registered ?<a href="login"> Login Here</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script src="{{ asset('js/jquery-3.6.2.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>



