@extends('app')
@section('content')

    <div class="page-banner-area item-bg3">
        <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Forgot Password</h2>
                    <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>Forgot Password</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>

    
    <section class="login-area ptb-100">
        <div class="container">
        <div class="login-form">
            <h2>Forgot Password</h2>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                
                <div class="form-group">
                    <label>Email or phone</label>
                    <input type="email" name="email" class="form-control" placeholder="Email or phone">
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