<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget password</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-5 p-0">
            <img class="img-fluid vh-100" src="{{asset('images/logo.png')}}">
        </div>
        <div class="col-7 p-0 ">
            <div class="container padding-bottom-3x mb-2 mt-5">
                <div class="row justify-content-center">

                    <div class="row m-0 p-3 justify-content-center">
                        <div class="col-12 text-center"><h2>Forgot your password?</h2></div>
                    </div>
                    <p class="col-12 text-center">Change your password in three easy steps. This will help you to secure your password!</p>
                    <ol class="list-unstyled">
                        <li>1- Enter your email address below.</li>
                        <li>2- Our system will send you a temporary link</li>
                        <li>3- Use the link to reset your password</li>
                    </ol>
                </div>

                <form action="{{route('forgetLink')}}" method="POST">
                    <div class="row m-0 justify-content-center">
                        <div class="col-8 text-center">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
                        </div>
                    </div>
                    <div class="row m-0 p-3 justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <label for="email-for-pass">Enter your email address</label>
                            <input type="text" class="form-control" placeholder=""
                                   name="email" value="{{old('email')}}">
                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="row m-0 pt-3 pb-5 justify-content-center">
                        <div class="col-4">
                            <button class="btn btn-block btn-primary" type="submit">Get New Password
                            </button>
                        </div>
                    </div>
                    <div class="row m-0 justify-content-center">
                        <div class="col-6 text-center">
                            <a href="{{ url('login') }}">Login Here</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.6.2.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
