<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fee Payment Approved</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6fff9; padding: 20px;">

    <div style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); overflow: hidden;">
        <div style="background-color: #28a745; color: #fff; text-align: center; padding: 15px 10px;">
            <h2 style="margin: 0;">✅ Payment Approved</h2>
        </div>
        <div style="padding: 20px; color: #333;">
            <p>Dear <strong>{{ $payment->student->name }}</strong>,</p>
            <p style="font-size: 16px;">
                We are pleased to inform you that your fee payment 
                <b>(Transaction ID: {{ $payment->transaction_id }})</b> has been 
                <span style="color: #28a745; font-weight: bold;">APPROVED</span>.
            </p>
            <p>You can now access your student dashboard and continue with your academic journey.</p>
            <p style="margin-top: 20px;">Thank you,<br><b>University Administration</b></p>
        </div>
    </div>

</body>
</html>
