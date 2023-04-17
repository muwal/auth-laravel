@extends('layouts.master-app')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <h1>Home page</h1>
    <p class="lead">Only authenticated users can access this section.</p>
    <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-warning me-2">Goto Dashboard</a>
    @endauth

    @guest
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
    @endguest
</div>
@endsection