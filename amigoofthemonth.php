<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigo of the Month</title>
    <style>
        body {
            background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/hero.jpg');
            background-size: cover;
            color: #fff; /* White text color */
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 50px;
            margin: 0; /* Remove default body margin */
        }

        h1 {
            color: #eee; /* Light grey heading color */
        }

        h2 {
            color: #ccc; /* Medium grey subheading color */
        }

        .amigo-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.7); /* Dark grey container background with transparency */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Dark shadow for contrast */
            border-radius: 8px;
            margin-top: 30px;
        }

        p {
            margin: 0;
            font-size: 18px;
        }

        strong {
            color: #ffd700; /* Gold color for strong text */
        }
    </style>
</head>
<body>
    <h1>AMIGO OF THE MONTH</h1>
    <h2>The Most Helpful Amigo is:</h2>
    
    <div class="amigo-container">
        <?php
        // Connect to the database
        $con = mysqli_connect('localhost', 'root', '', 'amigofinder');
        if (!$con) {
            die("Failed to connect: " . mysqli_connect_error());
        }

        // Fetch the most helpful amigo from the table
        $sql = "SELECT username, pointsspent FROM amigos ORDER BY pointsspent DESC LIMIT 1";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<p>The Most Helpful Amigo is: <strong>{$row['username']}</strong></p>";
            echo "<p>Points Spent: <strong>{$row['pointsspent']}</strong></p>";
        } else {
            echo "<p>No amigo found in the database.</p>";
        }

        // Close the database connection
        mysqli_close($con);
        ?>
        <a href = "home.php">Go Home</a>
    </div>
</body>
</html>
