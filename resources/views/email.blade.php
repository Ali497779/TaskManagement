<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to Our Task Management!</h1>
    <p>Dear {{ auth()->user()->name }},</p>
    <p>Your Task Has Been Completed</p>
</body>
</html>
