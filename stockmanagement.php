<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-image: url('https://wallpaperaccess.com/full/3362848.jpg'); background-size: cover;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>



        /* Custom CSS for the navigation bar */
        .navbar-brand {
          margin-right: 50px; /* Add margin to the right of the brand */
        }
      
        .navbar-nav .nav-item {
          margin-right: 20px; /* Add margin to the right of each navigation item */
        }
      </style>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <a class="navbar-brand" href="#" style="font-size: 30px;">AmigoFinder</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="admin.php">User List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="usermanagement.php">User Management</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="stockdisplay.php">Stock Display</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="addstock.php">Add Stock</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="stockmanagement.php">Stock Management</a>
              </li>
             

            </ul>
          </div>
        </div>
      </nav>



      <form action="" method="post">
      <input type = 'text' name = 'name' placeholder = 'ITEMNAME'><br><br>
            <input type = 'number' name = 'id' placeholder = 'ITEMID'><br><br>
            <input type = 'text' name = 'price' placeholder = 'ITEMPRICE'><br><br>
            <input type = 'number' name = 'units' placeholder = 'ITEMUNITS'><br><br>

            <input type = 'submit' name = 'updatestock' value = 'UPDATESTOCK'>
            <input type = 'submit' name = 'deletestock' value = 'DELETESTOCK'>
      <?php
     if(isset($_POST['updatestock']))
     {
         $con = mysqli_connect('localhost', 'root', '', 'amigofinder');
     
         $id = $_POST['id'];
         $name = $_POST['name'];
         $price = $_POST['price'];
         $units = $_POST['units'];
     
     
         if(!$con)
         {
             die("Failed to connect:" . mysqli_connect_error());
         }
     
         $sql ="update stock set price = $price, units = $units where id = $id";
     
         $result = mysqli_query($con, $sql);
     
         if(mysqli_affected_rows($con))
         {
             echo "<br><br>Values updated successfully<br><br>";
         }
         else echo "<br><br>Failed to update values: " . mysqli_error($con);
         mysqli_close($con);
     }    

     if(isset($_POST['deletestock']))
{
    $con = mysqli_connect('localhost', 'root', '', 'amigofinder');

    $id = $_POST['id'];

    if(!$con)
    {
        die("Failed to connect:" . mysqli_connect_error());
    }

    $sql ="delete from stock where id = $id";

    $result = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con))
    {
        echo "<br><br>Values deleted successfully<br><br>";
    }
    else echo "<br><br>Failed to delete values: " . mysqli_error($con);
    mysqli_close($con);
}    


?>

      </form>
      </body>
      </html>