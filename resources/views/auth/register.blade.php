@extends('layouts.auth-app')

@section('content')
<div class="container">
    <section class="wrapper">
        <div class="heading">
            <h1 class="text text-large">Sign Up</h1>
            <p class="text text-normal">Already have an account? <span><a href="{{ route('login.show') }}"
                        class="text text-links">Sign In</a></span>
            </p>
        </div>
        <form method="POST" action="{{ route('register.perform') }}" class="form">
            @csrf

            {{-- @include('layouts.components.messages') --}}
            <div class="input-control">
                <label for="name" class="input-label" hidden>Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="input-field"
                    placeholder="Your Full Name" autofocus>
                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="input-control">
                <label for="email" class="input-label" hidden>Email Address</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" class="input-field"
                    placeholder="name@example.com">
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="input-control">
                <label for="phone" class="input-label" hidden>Phone Number</label>
                <input type="number" name="phone" id="phone" value="{{ old('phone') }}" class="input-field"
                    placeholder="Phone Number" required="required" autofocus>
                @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="input-control">
                <label for="password" class="input-label" hidden>Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="input-field"
                    placeholder="Password">
                @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="input-control">
                <label for="password" class="input-label" hidden>Confirm Password</label>
                <input type="password" name="password_confirmation" id="password"
                    value="{{ old('password_confirmation') }}" class="input-field" placeholder="Confirm Password">
                @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="input-control">
                <input type="submit" name="submit" class="input-submit" value="Sign Up">
            </div>
        </form>
    </section>
</div>
@endsection