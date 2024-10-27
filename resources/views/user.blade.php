<!DOCTYPE html>
<html>
<head>
    <title>User Management System | {{ env('APP_NAME') }}</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
             <div class="panel-body">
                <div class="text-center">
                    <h2 class="text-center">User Management System</h2>
                    @php
                        $loginurl = route('admin.login') . '?auth_token=zekkmdvhkm';
                        $signupurl = route('admin.signup') . '?auth_token=zekkmdvhkm';
                    @endphp
                    <p><a href="{{$loginurl}}">Login</a> | <a href="{{$signupurl}}">SignUp</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
