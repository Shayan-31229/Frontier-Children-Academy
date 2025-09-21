@extends('layouts.master')
@section('title', 'Payments Info Received')
@section('css')
@endsection

@section('content')

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <div class="page-header">
                    <h1>
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Fee Payments Confirmation
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-xs-12 ">
                        @include('includes.flash_messages')
                        @include('includes.validation_error_messages')

                        <h3>Fee Payments</h3>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student</th>
                                    <th>Bank</th>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Status</th>
                                    <th width="200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->student_id }} - ({{ $payment->reg_no }})</td>
                                        <td>{{ optional($payment->student)->name ?? '—' }} ({{ $payment->mobile }})</td>
                                        <td>{{ $payment->bank_name }}</td>
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->payment_date }}</td>
                                        <td>{{ ucfirst($payment->status) }}</td>
                                        <td>
                                            @if($payment->status == 'pending')
                                                <form method="POST"
                                                    action="{{ route('admin.fees.payments.approve', $payment->id) }}"
                                                    style="display:inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.fees.payments.reject', $payment->id) }}"
                                                    style="display:inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                </form>
                                            @else
                                                <span
                                                    class="badge badge-{{ $payment->status == 'approved' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection