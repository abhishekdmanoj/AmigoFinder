<?php
// Create a database connection
$con = mysqli_connect('localhost', 'root', '', 'amigofinder');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve data

$sql = "SELECT `name`, `price` FROM `stock` WHERE `id` = $id";
$result = mysqli_query($con, $sql);

if ($result) {
   
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Insert the data directly into the HTML
        echo "<br><br>USERNAME: " . $username . "<br><br><br>ITEM: " . $row['name'] . "<br><br><br>PRICE: " . $row['price'];
    } else {
        echo "No data found";
    }
}

mysqli_close($con);
?>
