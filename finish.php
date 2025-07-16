<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="styles/contact.css">
    <style>
        body {
            background-color: #f5f5f5; /* Light grey background */
            color: #fff; /* Dark grey text color */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #333; /* White container background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            color: #fff; /* Dark grey heading color */
        }

        .receipt {
            margin-top: 20px;
        }

        a {
            color: #007bff; /* Blue link color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    session_start();
    $username = $_SESSION['username'];
    ?>

    <div class="container">
        <h1>Thank you for your purchase!</h1>
        <div class="receipt">
            <h2>Transaction Receipt</h2>
            <?php include('receipt.php'); ?>
            <br><br><a href="home.php">Go Home</a>
        </div>
    </div>
</body>
</html>
