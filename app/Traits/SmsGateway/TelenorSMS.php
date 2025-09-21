<?php
namespace App\Traits\SmsGateway;
use Illuminate\Support\Facades\Log;

trait TelenorSMS{      
    public function TelenorSMS($contactNumbers, $message)
    {
        /* Get Setting */
        $smsSetting = $this->getSmsSetting();
        $sms = json_decode($smsSetting['TelenorSms'], true);

        $from    = $sms['Mask'];
        $sender   = $sms['Sender'];
        $password = $sms['Password'];

        // Normalize contact numbers
        if (!is_array($contactNumbers)) {
            $contactNumbers = [$contactNumbers];
        }

        $normalized = [];
        foreach ($contactNumbers as $num) {
            $num = trim($num);

            if (strpos($num, '03') === 0) {
                // Convert 03xxxxxxxxx → 00923xxxxxxxxx
                $num = '92' . substr($num, 1);
            } elseif (strpos($num, '923') === 0) {
                // Add leading 00 if missing
                //$num = '00' . $num;
            }
            // else assume already normalized (00923…)

            $normalized[] = str_replace(['-', ' '], '', trim($num));
        }

        $toNumbers = implode(',', $normalized);

        // 1. Authenticate
        $authUrl  = "https://telenorcsms.com.pk:27677/corporate_sms2/api/auth.jsp?msisdn={$sender}&password={$password}";
        $authResp = file_get_contents($authUrl);

        $authXml = simplexml_load_string($authResp);

        if ($authXml === false) {
            return ['status' => 'FAILED', 'message' => 'Invalid Auth XML Response'];
        }

        $sessionId = (string) $authXml->data;
        $status    = (string) $authXml->response;

        if ($status !== 'OK') {
            return ['status' => 'FAILED', 'message' => "Auth Failed: {$status}"];
        }

        // 2. Prepare SMS request
        $text = urlencode($message);

        $smsUrl = "https://telenorcsms.com.pk:27677/corporate_sms2/api/sendsms.jsp?"
                . "session_id={$sessionId}&to={$toNumbers}&text={$text}&mask={$from}";

        // 3. Send SMS
        $smsResp = file_get_contents($smsUrl);
        $smsXml  = simplexml_load_string($smsResp);

        if ($smsXml === false) {
            return ['status' => 'FAILED', 'message' => 'Invalid SMS XML Response'];
        }
        
        $smsStatus = (string) $smsXml->response;
        if ($smsStatus === 'OK') {
            return ['status' => 'SUCCESS', 'message' => 'SMS sent successfully'];
        } else {
            return ['status' => 'FAILED', 'message' => "SMS sending failed: {$smsStatus}"];
        }
    }



}