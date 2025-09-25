@extends('layouts.master')

@section('content')
<h2>Add {{ $panel }}</h2>
<form method="POST" action="{{ route($base_route.'.store') }}">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Code</label>
        <input type="text" name="code" class="form-control">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
