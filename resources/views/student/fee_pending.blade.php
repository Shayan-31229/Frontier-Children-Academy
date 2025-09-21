@extends('layouts.app')

@section('title', 'Fee Pending')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin:0">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-danger" style="font-family: Arial, Helvetica, sans-serif !important;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-exclamation-triangle"></i> Registration Fee Payment Required</h3>
                    </div>

                    <div class="panel-body">
                        <p>Dear <strong>{{ $student->name ?? $student->first_name . ' ' . $student->last_name }}</strong>,
                        </p>
                        <p>Your account is currently inactive because your registration charges have not been received.
                            Please submit
                            the payment information below for verification by administration.</p>
                        <p>The fee may be deposited/transferred <b>PKR: 1500</b> online in the following
                            accounts</p>
                        <ol>
                            <li>
                                Bank Name: <b>Allied bank</b> IBAN No: <b>PK03ABPA0010147337210012</b>, Account Title:
                                <b>Muhammad Ali</b>
                            </li>
                            <li>
                                Easy paisa: <b>03069675177</b> (<i>Muhammad Ali</i>)
                            </li>
                            <li>
                               JazzCash/RAAST: Dial <b>*786*10#</b> and enter TILL ID (<b>981589225</b>) to pay via JazzCash account
                            </li>
                        </ol>

                        <div class="text-center" style="margin: 20px 0;">
                            <p><b>Or scan QR Code to pay:</b></p>
                            <img src="{{ asset('images/paymentqr.jpg') }}" alt="Payment QR Code"
                                style="max-width:180px; border: 2px solid #ccc; padding: 5px; border-radius: 10px;">
                        </div>

                        <form method="POST" action="{{ route('user-student.fee.submit') }}">
                            <fieldset class="well well-sm">
                                <legend class="text-primary" style="font-size: 18px; font-weight: bold; 
                                   background: #f9f9f9; 
                                   border: 1px solid #ddd; 
                                   padding: 8px 15px; 
                                   border-radius: 6px; 
                                   display: flex; 
                                   align-items: center; 
                                   gap: 8px;">
                                    <i class="ace-icon fa fa-university" style="color: #337ab7; font-size: 20px;"></i>
                                    Your Bank's Info
                                </legend>

                                @csrf

                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="bank_name">
                                            Bank Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bank_name" id="bank_name"
                                                placeholder="EasyPaisa/Jazz Cash/HBL/UBL etc."
                                                class="col-xs-10 col-sm-7 form-control" value="{{ old('bank_name') }}"
                                                required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="bank_account">
                                            Bank Account No.
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bank_account" id="bank_account"
                                                class="col-xs-10 col-sm-7 form-control"
                                                placeholder="From where your paid the amount"
                                                value="{{ old('bank_account') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="transaction_id">
                                            Transaction ID <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="transaction_id" id="transaction_id"
                                                class="col-xs-10 col-sm-7 form-control"
                                                placeholder="Transaction/Reference ID" value="{{ old('transaction_id') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="amount">
                                            Amount Paid <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="number" step="0.01" name="amount" id="amount"
                                                class="col-xs-10 col-sm-7 form-control"
                                                placeholder="Amount Paid/Transferred" value="{{ old('amount') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="payment_date">
                                            Payment Date <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="date" name="payment_date" id="payment_date"
                                                class="col-xs-10 col-sm-7 form-control"
                                                value="{{ old('payment_date', date('Y-m-d')) }}" required>
                                        </div>
                                    </div>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-success">
                                                <i class="ace-icon fa fa-check"></i> Submit Fee Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                        @if($payments && $payments->count())
                            <hr>
                            <h5>Your previous submissions</h5>
                            <table class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Txn ID</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->transaction_id }}</td>
                                            <td>{{ $p->amount }}</td>
                                            <td>{{ $p->payment_date }}</td>
                                            <td>{{ ucfirst($p->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection