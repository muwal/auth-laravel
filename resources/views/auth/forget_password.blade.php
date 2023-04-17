@extends('layouts.auth-app')

@section('content')
<div class="container">
    <section class="wrapper">
        <div class="heading">
            <h1 class="text text-large">Reset Password</h1>
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('forget.password.post') }}" class="form">
            @csrf

            <div class="input-control">
                <label for="email" class="input-label" hidden>Email Address</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" class="input-field"
                    placeholder="name@example.com">
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="input-control">
                <a href="{{ route('login.show') }}" class="text text-links">Back</a>
                <input type="submit" name="submit" class="input-submit" value="Send Password Reset Link">
            </div>
        </form>
    </section>
</div>
@endsection