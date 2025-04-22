<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>


<div class="container-fluid p-0">
    <div class="row m-0">

        <div class="col-5 p-0">
            <img class="img-fluid vh-100 p-5" src="{{asset('images/logo.png')}}">
        </div>
        <div class="col-7 p-0 ">

            <br>
            <br>
            <div class="row m-0 pt-5 pb-4 justify-content-center">
                <div class="col-6">
                    <div class="col-12 text-center"><h1>Sign In</h1></div>
                    <div class="col-12 text-center" id="show_login_alert"></div>
                </div>
            </div>
            <br>


            <form id="ajax_login_form" class="form-group" action="#" method="post">
                @csrf
                <div class="row m-0 pb-3 justify-content-center">
                    <div class="col-6">

                        <div class="col-12 py-3">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control" placeholder="Enter your email"
                                   name="email" value="{{old('email')}}">
                            <div class="invalid-feedback"></div>
                        </div>


                        <div class="col-12">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Enter your password"
                                   name="password" value="">
                            <div class="invalid-feedback"></div>
                        </div>


                        <div class="col-12">
                            <label>
                                <input type="checkbox" id="remember_token" name="remember_token">
                                <span>Remember me</span>
                            </label>
                        </div>


                        <div class="row py-3 m-0 justify-content-center p-2">
                            <div class="col-6">
                                <button id="ajax_login_btn" value="login" class="btn btn-block btn-primary"
                                        type="submit">Login
                                </button>
                            </div>
                        </div>


                        <div class="col-12 pb-5 text-center">
                            Don't have an account ?<a href="{{url('/coRegister')}}"> Create One</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.6.2.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/function.js') }}"></script>
<script>
    $(function () {
        $("#ajax_login_form").submit(function (e) {
            e.preventDefault();
            $("#ajax_login_btn").val('please wait ...');
            $.ajax({
                url: '{{route('ajax.auth.login')}}',
                method: 'post',
                data: $(this).serialize(),
                datatype: 'json',
                success: function (res) {
                    if (res.status == 422) {
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);
                        $("#ajax_login_btn").val('login');
                    } else if (res.status == 401) {
                        $("#show_login_alert").html(showMessage('danger', res.messages));
                        $("#ajax_login_btn").val('login');
                    } else {
                        if (res.status == 200 && res.messages == 'success') {
                            window.location = '{{ route('homeHome') }}';
                        }
                    }
                }
            });
        });
    });
</script>
</body>
</html>


