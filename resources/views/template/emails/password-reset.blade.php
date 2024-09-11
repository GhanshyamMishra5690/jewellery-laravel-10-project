<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
            color: #51545E;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 30px;
            border-bottom: 1px solid #EAEAEC;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }
        .content {
            padding: 30px 20px;
            text-align: left;
        }
        .content p {
            margin: 0 0 20px;
            font-size: 16px;
            line-height: 1.6;
        }
        .button {
            background-color: #3869D4;
            color: #ffffff;
            padding: 15px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #2c5bbf;
        }
        .link {
            color: #3869D4;
            text-decoration: none;
            word-wrap: break-word;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #EAEAEC;
            margin-top: 30px;
        }
        .footer p {
            color: #6B6E76;
            font-size: 14px;
        }
        .footer a {
            color: #3869D4;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset Request</h1>
        </div>
        <div class="content">
            <p>Hi there,</p>
            <p>We received a request to reset your password for your account. If you did not request a password reset, please ignore this email.</p>
             <p>Click the button below to reset your password:</p>
            <a href="{{ $resetLink }}" class="button">Reset Your Password</a>
            <p>If the button above doesn’t work, copy and paste this link into your web browser:</p>
            <p><a href="{{ $resetLink }}" class="link">{{ $resetLink }}</a></p>
            <p>This link will expire in 60 minutes.</p>
        </div>
        <div class="footer">
            <p>If you didn’t request a password reset, please ignore this email or <a href="mailto:support@example.com">contact support</a> if you have questions.</p>
            <p>Thanks,<br>Your Company Name</p>
        </div>
    </div>
</body>
</html>
