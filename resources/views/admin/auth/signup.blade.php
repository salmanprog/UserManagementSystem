@extends('admin.auth.master')
@section('content')
    <div class="col-5">
        @include('admin.flash-message')
        @include('admin.auth.header')
        <div class="misc-box">
            <form method="post" action="" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label  for="exampleuser1">Name</label>
                    <div class="group-icon">
                        <input id="exampleuser1" type="text" name="name" placeholder="Name" class="form-control" required="">
                        <span class="icon-user text-muted icon-input"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label  for="exampleuser1">Phone</label>
                    <div class="group-icon">
                        <input id="mobile_no" type="text" name="mobile_no " placeholder="Phone" class="form-control" required="">
                        <span class="icon-user text-muted icon-input"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label  for="exampleuser1">Email</label>
                    <div class="group-icon">
                        <input id="email" type="email" name="email" placeholder="Email" class="form-control" required="">
                        <span class="icon-user text-muted icon-input"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="group-icon">
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control">
                        <span class="icon-lock text-muted icon-input"></span>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="float-right">
                        <button type="submit" class="btn btn-block btn-primary btn-rounded box-shadow">SignUp</button>
                    </div>
                </div>
                <hr>
                <p class="text-center">
                <a href="{{ route('admin.login') . '?auth_token=' . config('constants.ADMIN_AUTH_TOKEN') }}">Login</a> | 
                    <a href="{{ route('admin.forgot-password') }}">Forgot Password?</a>
                </p>
            </form>
        </div>
        @include('admin.auth.footer')
    </div>
@endsection

