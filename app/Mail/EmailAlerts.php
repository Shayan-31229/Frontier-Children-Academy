<?php

namespace App\Mail;

use App\Models\EmailSetting;
use App\Models\GeneralSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAlerts extends Mailable
{
    use Queueable, SerializesModels;

    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $this->data = $array;


    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        // Fetch general institute settings
        $gsetting = GeneralSetting::select(
            'institute',
            'address',
            'phone',
            'email',
            'website',
            'logo',
            'print_header',
            'print_footer',
            'facebook',
            'twitter',
            'linkedIn',
            'youtube'
        )->first();

        // Fetch active email setting
        $setting = EmailSetting::select('user_name')
            ->where('status', 1)
            ->first();
        // Safeguard: ensure $setting is not null
        $fromEmail = $setting ? $setting->user_name : config('mail.from.address');
        $fromName = $gsetting ? $gsetting->institute : config('mail.from.name');

        return $this->from($fromEmail, $fromName)
            ->subject($this->data['subject'] ?? 'Notification')
            ->view('mail.alert', [
                'data' => $this->data,
                'generalSetting' => $gsetting,
            ]);
    }
}
