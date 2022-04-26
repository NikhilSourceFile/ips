@extends('app')
@section('content')

    <div class="page-banner-area item-bg3">
        <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Login</h2>
                    <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>

    
    <section class="login-area ptb-100">
        <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <form>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Email or phone</label>
                    <input type="text" class="form-control" placeholder="Email or phone">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" placeholder="Password">
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkme">
                        <label class="form-check-label" for="checkme">Remember me</label>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password">
                    <a href="#" class="lost-your-password">Forgot your password?</a>
                    </div>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="important-text">
                <p>Don't have an account? <a href="register.html">Register now!</a></p>
            </div>
        </div>
        </div>
    </section>

@endsection
@section('script')
@endsection