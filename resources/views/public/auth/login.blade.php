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
                        <a href="{{route('home')}}">Home</a>
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
            <h2>Login User</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email or phone" required autofocus value="{{ old('email') }}" >
                  
                    @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control"  type="password" name="password" placeholder="Password" required autocomplete="current-password">
                    @if ($errors->has('password'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember">
                        <label class="form-check-label" for="checkme">Remember me</label>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password">
                    <a href="{{route('password.request')}}" class="lost-your-password">Forgot your password?</a>
                    </div>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="important-text">
                <p>Don't have an account? <a href="{{route('register')}}">Register now!</a></p>
            </div>
        </div>
        </div>
    </section>

@endsection
@section('script')
@endsection