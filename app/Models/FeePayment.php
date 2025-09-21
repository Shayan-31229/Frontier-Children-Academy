<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeePayment extends Model
{
    protected $table = 'fee_payments';

    protected $fillable = [
        'student_id',
        'reg_no',
        'mobile',
        'bank_name',
        'bank_account',
        'transaction_id',
        'amount',
        'payment_date',
        'status',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function student()
    {
        // use configured user model (works for App\User or App\Models\User)
        $userModel = config('auth.providers.users.model', \App\User::class);
        return $this->belongsTo($userModel, 'student_id');
    }
}
