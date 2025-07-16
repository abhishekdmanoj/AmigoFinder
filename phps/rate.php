<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $rating = $_POST['rating'];
        
        $con = mysqli_connect('localhost', 'root', '', 'amigofinder');
        if(!$con)
        {
            die("Failed to connect: " . mysqli_connect_error());
            header("Location: ../home.html");
            exit();
        }

        $sql = "UPDATE amigos SET points = points + $rating where username = '$username'";

        if(mysqli_query($con, $sql))
        {
            header("Location: ../ratedone.html");
            exit();
        }
        else 
        header("Location: ../rate.html");
    exit();
    mysqli_close($con);
    }
}
?>