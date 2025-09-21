<?php

namespace App\Http\Controllers\Account\Fees;


use App\Http\Controllers\CollegeBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\FeePayment;
use App\Mail\FeePaymentApprovedMail;
use App\Mail\FeePaymentRejectedMail;
use App\Models\Student;

class FeePaymentController extends CollegeBaseController
{

    protected $base_route = 'admin.fees.payments';
    protected $view_path = 'account.fees.payments';
     protected $panel = 'Prospectus Fee Payment';
    /**
     * Show the fee pending page & submission form for the logged-in student.
     */
    public function showPendingForm()
    {
        $student = Auth::user();

        // previous submissions by this student (optional)
        $payments = FeePayment::where('student_id', $student->id)
                              ->orderByDesc('created_at')
                              ->get();
        $view_path = $this->loadDataToView('student.fee_pending');
        return view($view_path, compact('student', 'payments'));
        //return view('student.fee_pending', compact('student', 'payments'));
    }

    /**
     * Store fee submission from student.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $student = Student::where('id', $user->hook_id)->first();

        $request->validate([
            'bank_name'     => 'required|string|max:191',
            'bank_account'  => 'required|string|max:191',
            'transaction_id'=> 'required|string|max:191|unique:fee_payments,transaction_id',
            'amount'        => 'required|numeric|min:0.01',
            'payment_date'  => 'required|date',
        ]);

        $payment = FeePayment::create([
            'student_id'     =>   $user->id,
            'reg_no'         =>   $student->reg_no,
            'mobile'         =>   $student->mobile_1, 
            'bank_name'      =>   $request->bank_name,
            'bank_account'   =>   $request->bank_account,
            'transaction_id' =>   $request->transaction_id,
            'amount'         =>   $request->amount,
            'payment_date'   =>   $request->payment_date,
            'status'         =>   'pending',
        ]);

        return redirect()->route('fee.pending')->with('success', 'Your payment details have been submitted for verification.');
    }

    /**
     * Admin: list all payments.
     */

    public function index()
    {
        $payments = FeePayment::with('student')->orderByDesc('created_at')->get();
        
        // your blade file is resources/views/account/fees/payments.blade.php
        
        $view_path = $this->loadDataToView('account.fees.payments');
        return view($view_path, compact('payments'));
    }

    /**
     * Admin: approve a payment.
     */
    public function approve(Request $request, $id)
    {
        $payment = FeePayment::findOrFail($id);

        if ($payment->status !== 'approved') {
            $payment->status = 'approved';
            $payment->save();

            $student = $payment->student;
            if ($student) {
                $student->fee_paid = true;
                $student->save();

                try {
                    Mail::to($student->email)->send(new FeePaymentApprovedMail($payment));
                    \Log::info("The email is sent from FeePaymentController.php");

                } catch (\Exception $e) {
                    // log if needed
                }
            }
        }

        return redirect()->route('admin.fees.payments.index')->with('success', 'Payment approved and student activated.');
    }

    public function reject(Request $request, $id)
    {
        $payment = FeePayment::findOrFail($id);
        $payment->status = 'rejected';
        $payment->save();

        if ($payment->student) {
            try {
                Mail::to($payment->student->email)->send(new FeePaymentRejectedMail($payment));
            } catch (\Exception $e) {
                // log if needed
            }
        }

        return redirect()->route('admin.fees.payments.index')->with('success', 'Payment rejected.');
    }
}
