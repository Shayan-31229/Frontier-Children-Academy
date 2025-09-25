@extends('layouts.master')

@section('content')
<h2>{{ $panel }} List</h2>
<a href="{{ route($base_route.'.create') }}" class="btn btn-primary">Add Branch</a>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Name</th><th>Code</th><th>Phone</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['rows'] as $row)
        <tr>
            <td>{{ $row->title }}</td>
            <td>{{ $row->code }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->status ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="{{ route($base_route.'.edit',$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form action="{{ route($base_route.'.destroy',$row->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                <a href="{{ route($base_route.'.toggle',$row->id) }}" class="btn btn-sm btn-warning">Toggle</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $data['rows']->links() }}
@endsection
