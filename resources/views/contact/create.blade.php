@extends('layouts.master-app')

@section('content')
<div class="container" style="margin: 60px auto">
    <div class="row justify-content-center align-items-center">
        <div class="card p-0" style="width: 40rem;">
            <div class="card-header">
                Tambah Contact
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                </div>
                @endif
                <form method="post" action="{{ route('contacts.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                        @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mt-2">
                        <label for="phone">Phone</label>
                        <input type="number" min="0" name="phone" class="form-control" id="phone"
                            aria-describedby="phone">
                        @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection