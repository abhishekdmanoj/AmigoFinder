<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        $con = mysqli_connect('localhost', 'root', '', 'amigofinder');

        if (!$con) {
            die("Failed to connect: " . mysqli_connect_error());
        }

        if ($_POST['user_type'] == 'amigo') {
            $amigolanguageprimary = $_POST['amigolanguageprimary'];
            $amigolanguagesecondary = $_POST['amigolanguagesecondary'];
            $contactnumber = $_POST['contactnumber'];
            $city = $_POST['city'];
            $street = $_POST['street'];
            $points = 0;
            $purchases = 0;
            $pointsspent = 0;

            $sql1 = "SELECT username, contactnumber FROM amigos WHERE username = '$username' OR contactnumber = $contactnumber";
            $result = mysqli_query($con, $sql1);

            if (mysqli_num_rows($result) > 0) {
                echo "<br>User with the same username or contact number already exists or an error occurred.<br>";
                header("Location: ../registererror.html");
                exit();
            } else {
                $sql = "INSERT INTO amigos VALUES ('$username', '$password', '$gender', $age, '$amigolanguageprimary', '$amigolanguagesecondary', $contactnumber, '$city', '$street', $points, $purchases, $pointsspent)";
                if (mysqli_query($con, $sql)) {
                    echo "<br>Values inserted successfully. <br>";
                    header("location: ../home.php");
                    exit();
                } else {
                    echo "<br>Error inserting values.<br>";
                    header("Location: ../register.html");
                    exit();
                }
            }
        } elseif ($_POST['user_type'] == 'finder') {
            $sql2 = "SELECT username FROM finders WHERE username = '$username'";
            $result2 = mysqli_query($con, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                echo "<br>User with the same username already exists or an error occurred.<br>";
                header("Location: ../registererror.html");
                exit();
            } else {
                $sql1 = "INSERT INTO finders VALUES('$username', '$password', '$gender', $age)";
                if (mysqli_query($con, $sql1)) {
                    echo "<br>Values inserted successfully. <br>";
                    header("location: ../home.php");
                    exit();
                } else {
                    echo "<br>Error inserting values.<br>";
                    header("Location: ../register.html");
                    exit();
                }
            }
        }
    }
}
?>