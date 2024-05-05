<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <p>Please click the following link to verify your email:</p>
    <a href="{{ $verificationUrl }}">{{ $verificationUrl }}</a>
</body>
<body>
    <p>{{ $emailContent }}</p>
    <!-- Другие разделы письма -->
</body>
</html>
