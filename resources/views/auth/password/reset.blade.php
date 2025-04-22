<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-5 p-0">
            <img class="img-fluid vh-100" src="{{asset('images/logo.png')}}">
        </div>


        <div class="col-7 p-0 ">

            <div class="row m-0 pt-5 pb-3 justify-content-center">
                <div class="col-6 text-center"><h3>Reset password</h3></div>
            </div>


            <form action="{{route('resetPassword')}}" method="POST">
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
                <input type="hidden" name="token" value="{{$token}}">

                <div class="row m-0 pb-3 justify-content-center">
                    <div class="col-6">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{$email ?? old('email')}}" required autocomplete="email"
                               autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>


                <div class="row m-0 justify-content-center">
                    <div class="col-6">
                        <label for="password">New password</label>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row m-0 pb-2 justify-content-center">
                    <div class="col-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row m-0 pt-4 pb-5 justify-content-center">
                    <div class="col-4">
                        <button class="btn btn-block btn-primary" type="submit">Reset Password
                        </button>
                    </div>
                </div>

                <div class="row m-0 justify-content-center">
                    <div class="col-5 text-center">
                        <a href="{{ url('login') }}">Login Here</a>
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
