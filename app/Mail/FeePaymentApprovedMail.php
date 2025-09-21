<?php

namespace App\Mail;

use App\FeePayment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeePaymentApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    public function __construct(FeePayment $payment)
    {
        $this->payment = $payment;
    }

    public function build()
    {
        return $this->subject('Your Fee Payment Has Been Approved')
                    ->view('emails.fee.approved');
    }
}
