@extends('layouts.master-app')

@section('content')
<div class="container" style="margin: 60px auto">

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="m-0">{{ $message }}</p>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title m-0">Contact</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <form class="form" method="get" action="{{ route('contacts.search') }}">
                        <div class="form-group w-100">
                            <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                                placeholder="Masukkan keyword">
                            <button type="submit" class="btn btn-primary m-0">Cari</button>
                        </div>
                    </form>
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <form action="{{ route('contacts.destroy',$item->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('contacts.edit',$item->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection