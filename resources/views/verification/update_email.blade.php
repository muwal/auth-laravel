@extends('layouts.master-app')

@section('content')
<div class="container py-4">
    <div class="form-group form-floating mb-3">
        <input type="email" class="form-control" name="email_old" value="{{ $email }}" disabled
            placeholder="name@example.com" required="required" autofocus>
        <label for="floatingEmail">Email address</label>
    </div>
    <form action="{{ route('verification.update') }}" method="POST" class="d-inline">
        @csrf
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Update Email</label>
            @if ($errors->has('email'))
            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <button type="submit" class="d-inline btn btn-primary" style="vertical-align: initial">
            Update
        </button>
    </form>
</div>
@endsection