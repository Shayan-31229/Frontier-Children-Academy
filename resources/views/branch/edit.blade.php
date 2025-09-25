@extends('layouts.master')

@section('content')
<h2>Edit {{ $panel }}</h2>
<form method="POST" action="{{ route($base_route.'.update',$data['row']->id) }}">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="title" value="{{ $data['row']->title }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Code</label>
        <input type="text" name="code" value="{{ $data['row']->code }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" value="{{ $data['row']->address }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $data['row']->phone }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
