@extends('layouts.admin') {{-- Use your AdminACE master layout --}}

@section('title', 'Update Fee Status')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money"></i> Update Fee Status for {{ $student->first_name }} {{ $student->last_name }}
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('admin.students.fee.update', $student->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="fee_paid">Fee Status</label>
                            <select name="fee_paid" id="fee_paid" class="form-control">
                                <option value="1" {{ $student->fee_paid ? 'selected' : '' }}>Paid</option>
                                <option value="0" {{ !$student->fee_paid ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> Save
                        </button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
