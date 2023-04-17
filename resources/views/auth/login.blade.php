@extends('layouts.auth-app')

@section('content')
<div class="container">
    <section class="wrapper">
        <div class="heading">
            <h1 class="text text-large">Sign In</h1>
            <p class="text text-normal">New user? <span><a href="{{ route('register.show') }}"
                        class="text text-links">Create an
                        account</a></span>
            </p>
        </div>
        <form method="POST" action="{{ route('login.perform') }}" class="form">
            @csrf
            @include('layouts.components.messages')

            <div class="input-control">
                <label for="phone" class="input-label" hidden>Email Address or Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="input-field"
                    placeholder="Email Address" required="required" autofocus>
                @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <div class="input-control">
                <label for="password" class="input-label" hidden>Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="input-field"
                    placeholder="Password" required="required">
                @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="input-control">
                <a href="{{ route('forget.password.get') }}" class="text text-links">Forgot Password</a>
                <input type="submit" name="submit" class="input-submit" value="Sign In">
            </div>
        </form>
        <div class="striped">
            <span class="striped-line"></span>
            <span class="striped-text">Or</span>
            <span class="striped-line"></span>
        </div>
        <div class="method">
            <div class="method-control">
                <a href="{{ url('authorized/google') }}" class="method-action">
                    <img src="{{ asset('assets/image/logo-google.svg') }}"
                        style="width: 26px; height: 26px; margin-right: 10px"></img>
                    <span>Sign in with Google</span>
                </a>
            </div>
        </div>
    </section>
</div>
@endsection