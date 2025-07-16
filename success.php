<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redemption Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #333; /* Dark background color */
            color: #fff; /* White text color */
            padding: 50px;
            margin: 0;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.7); /* Darker semi-transparent background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }

        h2 {
            color: #ffd700; /* Gold color */
            margin-bottom: 15px;
        }

        .form-control {
            background-color: #555; /* Dark input background */
            color: #fff; /* White text color in inputs */
        }

        .form-check-label {
            color: #fff; /* White color for checkboxes */
        }

        .submit-button {
            padding: 10px;
            background-color: #808080; /* Grey submit button */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #666666; /* Darker grey on hover */
        }
    </style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} 
if (isset($_GET['var'])) {
    $id = $_GET['var'];
    echo $id;
} else {
    echo "not passed";
}

$con = mysqli_connect("localhost", "root", "", "amigofinder");
if(!$con) {
    die("Failed to connect: " . mysqli_connect_error());
    header("Location: redeem.php");
    exit();
}
$sql = "select name, price from stock where id = $id";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<br><br>ITEM:                " . $row['name'] . "<br>PRICE:                " . $row['price'] . "<br><br><br><br>PLEASE ENTER DELIVERY DETAILS<br><br>";  
    }
}
?>

<div class="form-container">
    <h2>Delivery Details</h2>
    <form class="row g-3" method="POST" action="redemption.php">
        <input type="hidden" name="var" value="<?php echo $id; ?>">

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>

        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
        </div>

        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="address2">
        </div>

        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity" name="city">
        </div>

        <div class="col-md-6">
            <label for="inputState" class="form-label">State</label>
            <input type="text" class="form-control" id="inputState" name="state">
        </div>

        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="zip">
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="email_updates">
                <label class="form-check-label" for="gridCheck">
                    Email Me Updates
                </label>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="submit-button" name="submit">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
