@extends('layouts.master-app')

@section('content')
<div class="container container-sm py-4">
    <form action="{{ route('verification.updatePhone') }}" method="POST" class="d-inline">
        @csrf
        <div class="form-group form-floating mb-3">
            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="+62"
                required="required" autofocus>
            <label for="floatingEmail">Phone Number</label>
            @if ($errors->has('phone'))
            <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
            @endif
        </div>

        <button type="submit" class="d-inline btn btn-primary" style="vertical-align: initial">
            Submit
        </button>
    </form>
</div>
@endsection