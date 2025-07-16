<?php
$id = $_POST['var'];
echo $id;
session_start(); // Start the session if not already started
  
// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // You can now use $username in this page
} 
echo $username;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['submit']))
    {
        $con = mysqli_connect('localhost', 'root', '', 'amigofinder');

        if(!$con){
die("Connection failed".mysqli_connect_error());
        }
$sql = "select units, price from stock where id = $id";
$sql1 = "select points from amigos where username = '$username'";
$sql2 = "update stock set units = units - 1 where id = $id";
$result = mysqli_query($con, $sql);
$result1 = mysqli_query($con, $sql1);

if($result){
   $row = mysqli_fetch_assoc($result);
   $price = $row['price'];
   $units = $row['units'];
}
if($result1){
    $row = mysqli_fetch_assoc($result1);
    $points = $row['points'];
}

if(($units > 0) && ($points > $price))
{
    $result2 = mysqli_query($con, $sql2);
    $sql3 = "update amigos set points = points - $price where username = '$username'";
    $result3 = mysqli_query($con, $sql3);
    if(!$result3)
    {
        header("Location: failed.html");
        exit();

    }
    $sql4 = "update amigos set purchases = purchases + 1, pointsspent = pointsspent + $price where username = '$username'";
   mysqli_query($con, $sql4);
    header("Location: finish.php?id=$id");

}
else{
    header("Location: failed.html");
}
    }
}

?>