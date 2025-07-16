<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $con = mysqli_connect('localhost', 'root', '', 'amigofinder');

        if(!$con)
        {
            die("Failed to connect: " . mysqli_connect_error());
        }

        $username = mysqli_real_escape_string($con, $username); //sanitising the input
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select username, password from amigos where username = '$username' AND password = '$password'";
        $sql1 = "select username, password from finders where username = '$username' AND password = '$password'";
        $sql2 = "select username, password from admin where username = '$username' AND password = '$password'";

        $result = mysqli_query($con, $sql);
        $result1 = mysqli_query($con, $sql1);
        $result2 = mysqli_query($con, $sql2);
        
        if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0)
        {
            session_start();

            // Set session variables
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
        
            // Redirect to "home.html"
            header("Location: ../home.php");
            exit();
        }
        else if(mysqli_num_rows($result2) > 0)
        {
            session_start();

            // Set session variables
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;

            // Redirect to "home.html"
            header("Location: ../admin.php");
            exit();
        }
        else{
            $error_message = "Invalid login credentials.";
            header("Location: ../index.html");
        }

    }
}
?>