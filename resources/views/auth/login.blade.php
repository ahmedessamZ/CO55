<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
        <div id="scrollforma" class="col-7 p-0 ">


            <div class="row m-0 pt-5 pb-4 justify-content-center">
                <div class="col-6 text-center"><h3>Sign In</h3></div>
            </div>


            <form class="form-group" action="{{route('login')}}" method="post">

                <div class="row m-0 justify-content-center">
                    <div class="col-6 text-center">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                    </div>
                </div>


                <div class="row m-0 pb-3 justify-content-center">
                    <div class="col-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter your email"
                               name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>
                </div>


                <div class="row m-0 justify-content-center pt-2">
                    <div class="col-2">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-4 text-right">
                        <a href="password/forget">Forget Password ?</a>
                    </div>
                </div>


                <div class="row m-0 pb-2 justify-content-center">
                    <div class="col-6">
                        <input type="password" class="form-control" placeholder="Enter your password"
                               name="password" value="">
                        <span class="text-danger">@error('password'){{'Password is required and must be 8 characters with numbers and at least one capital litter'}} @enderror</span>
                    </div>
                </div>


                <div class="row m-0 pb-4 justify-content-center">
                    <div class="col-6">
                        <label>
                            <input type="checkbox" id="remember_token" name="remember_token">
                            <span>Remember me</span>
                        </label>
                    </div>
                </div>


                <div class="row m-0 pb-5 justify-content-center">
                    <div class="col-4">
                        <button class="btn btn-block btn-primary" type="submit">Login
                        </button>
                    </div>
                </div>

                <div class="row m-0 justify-content-center">
                    <div class="col-5 text-center">
                        Don't have an account ?<a href="registration"> Create One</a>
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
