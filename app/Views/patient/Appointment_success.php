<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Success</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
            margin: 0;
        }
        .success-container {
            text-align: center;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .success-container h1 {
            color: #28a745;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .success-container p {
            margin: 10px 0;
            font-size: 16px;
            color: #333;
        }
        .success-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .success-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Success!</h1>
        <p>Your appointment has been successfully booked.</p>
        <a href="/">Back to Home</a>
    </div>
</body>
</html>
