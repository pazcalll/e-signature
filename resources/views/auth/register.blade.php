@extends('layout.guest')

@section('title')
    Login
@endsection

@section('page')
    <div class="col-sm-6 col-md-5 form-section">
        <div class="login-wrapper">
            <h2 class="login-title">Sign in</h2>
            <form action="#!">
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <input name="login" id="login" class="btn login-btn" type="button" value="Login">
                    <a href="#!" class="forgot-password-link">Password?</a>
                </div>
            </form>           
            <p class="login-wrapper-footer-text">Need an account? <a href="#!" class="text-reset">Signup here</a></p>
        </div>
    </div>
@endsection