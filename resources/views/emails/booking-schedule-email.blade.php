<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olax Power Appointment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px 0;
            text-align: center;
        }
        .content h1 {
            color: #333333;
        }
        .content p {
            color: #555555;
            font-size: 16px;
            line-height: 1.6;
        }
        .appointment-details {
            background-color: #f9f9f9;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            text-align: left;
        }
        .appointment-details h2 {
            color: #333333;
            font-size: 18px;
        }
        .appointment-details p {
            color: #555555;
            font-size: 16px;
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            color: #777777;
            font-size: 14px;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('/assets/Olax_Logo.svg') }}" alt="Olax Power">
        </div>
        <div class="content">
            <h1>Thank You for Booking an Appointment!</h1>
            <p>Dear {{$customerName}},</p>
            <p>Thank you for scheduling an appointment with Olax Power. We’re excited to help you with your Olax Power needs and look forward to meeting with you.</p>
            <div class="appointment-details">
                <h2>Appointment Details</h2>
                @php
                $appointmentDate = Carbon\Carbon::createFromFormat('Y-m-d', $appointmentDate)->format('m/d/Y');
                @endphp
                <p><strong>Date:</strong> {{$appointmentDate}}</p>
                <p><strong>Time:</strong> {{$appointmentTime}}</p>
            </div>
            <p>If you need to reschedule or have any questions, please don’t hesitate to contact us.</p>
            <p>We look forward to seeing you!</p>
        </div>
        <div class="footer">
            <p>Best Regards,</p>
            <p>The Olax Power Team</p>
            <p><a href="{{env('APP_URL')}}">www.Olaxpower.us</a></p>
        </div>
    </div>
</body>
</html>
