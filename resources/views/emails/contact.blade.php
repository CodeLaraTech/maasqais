<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 6px;
            background-color: #f9f9f9;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .label {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="heading">📩 New Contact Form Submission</div>

        <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Phone:</strong> {{ $phone }}</p>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Service:</strong> {{ $services }}</p>
    <p><strong>Message:</strong><br>{{ $message }}</p>

    </div>
</body>

</html>