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
            <img class="img-fluid vh-100 p-5" src="{{asset('images/logo.png')}}">
        </div>


        <div class="col-7 p-0">
            <br>
            <div class="row m-0 pt-3 justify-content-center">
                <div class="col-6">
                    <div class="col-12 text-center"><h1>Registration</h1></div>
                    <div class="col-12 text-center" id="show_success_alert"></div>
                </div>
            </div>


            <form id="ajax_register_form" action="#" method="post" class="form-group">
                @csrf
                <div class="row m-0 justify-content-center p-2">
                    <div class="col-6">
                        <div class="col-12 mt-3">
                            <label for="name">Full name</label>
                            <input type="text" class="form-control" placeholder="Enter full name"
                                   id="name" name="name" value="{{old('name')}}">
                            <div class="invalid-feedback"></div>

                        </div>

                        <div class="col-12 mt-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="Enter your email"
                                   id="email" name="email" value="{{old('email')}}">
                            <div class="invalid-feedback"></div>

                        </div>

                        <div class="col-12 mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Enter your password"
                                   id="password" name="password" value="">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-12 my-3">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Retype your password"
                                   id="password_confirmation" name="password_confirmation" value="">

                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="row py-3 m-0 justify-content-center">
                    <div class="col-4">
                        <button id="ajax_register_btn" value="register" class="btn btn-block btn-primary" type="submit">
                            Register
                        </button>
                    </div>
                </div>

                <div class="row m-0 justify-content-center pt-2 pb-2">
                    <div class="col-6 text-center">
                        Already Registered ?<a href="{{url('/coLogin')}}"> Login Here</a>
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
        $("#ajax_register_form").submit(function (e) {
            e.preventDefault();
            $("#ajax_register_btn").val('please wait ...');
            $.ajax({
                url: '{{route('ajax.auth.register')}}',
                method: 'post',
                data: $(this).serialize(),
                datatype: 'json',
                success: function (res) {
                    if (res.status == 422) {
                        showError('name', res.messages.name);
                        showError('email', res.messages.email);
                        showError('password', res.messages.password);
                        showError('password_confirmation', res.messages.password_confirmation);
                        $("#ajax_register_btn").val('Register')
                    } else if (res.status == 200) {
                        $("#show_success_alert").html(showMessage('success', res.messages));
                        $("#ajax_register_form")[0].reset();
                        removeValidationClasses("#ajax_register_form");
                        $("#ajax_register_btn").val('Register');
                    }
                }
            });
        });
    });
</script>
</body>
</html>



