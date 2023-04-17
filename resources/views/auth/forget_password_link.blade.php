@extends('layouts.auth-app')

@section('content')
<div class="container">
    <section class="wrapper">
        <div class="heading">
            <h1 class="text text-large">Reset Password</h1>
        </div>
        <form method="POST" action="{{ route('reset.password.post') }}" class="form">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-control">
                <label for="email" class="input-label" hidden>Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" class="input-field"
                    placeholder="name@example.com" required="required">
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
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
                <label for="password" class="input-label" hidden>Confirm Password</label>
                <input type="password" name="password_confirmation" id="password"
                    value="{{ old('password_confirmation') }}" class="input-field" placeholder="Confirm Password"
                    required="required">
                @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="input-control">
                <input type="submit" name="submit" class="input-submit" value="Reset Password">
            </div>
        </form>
    </section>
</div>
@endsection