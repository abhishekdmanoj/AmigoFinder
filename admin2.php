<html>
    <body>
        <form method = 'POST' action = ''>
            <input type = 'text' name = 'username' placeholder = 'USERNAME'><br><br>
         
             
            <input type = 'submit' name = 'select' value = 'SELECT'>
            <input type = 'submit' name = 'search' value = 'SEARCH'>
            <input type = 'submit' name = 'delete' value = 'DELETE'>

            <br><br><br>
            <input type = 'text' name = 'name' placeholder = 'ITEMNAME'><br><br>
            <input type = 'number' name = 'id' placeholder = 'ITEMID'><br><br>
            <input type = 'text' name = 'price' placeholder = 'ITEMPRICE'><br><br>
            <input type = 'number' name = 'units' placeholder = 'ITEMUNITS'><br><br>


            <input type = 'submit' name = 'selectstock' value = 'SHOWSTOCK'>
            <input type = 'submit' name = 'updatestock' value = 'UPDATESTOCK'>
            <input type = 'submit' name = 'insertstock' value = 'INSERTSTOCK'>
            <input type = 'submit' name = 'deletestock' value = 'DELETESTOCK'>


    </body>
    <?php


if(isset($_POST['select']))
{
    $con = mysqli_connect('localhost', 'root', '', 'amigofinder');

    if(!$con)
    {
        die("Failed to connect:" . mysqli_connect_error());
    }

    $sql ="select username from amigos";
    $sql1 = "select username from finders";

    $result = mysqli_query($con, $sql);
    $result1 = mysqli_query($con, $sql1);

    if(mysqli_num_rows($result) > 0)
    {
        echo "<br>The data is<br>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br><br>Username: " . $row['username'];
        }
    }
    else if(mysqli_num_rows($result1) > 0)
    {
        echo "<br>The data is<br>";
        while($row = mysqli_fetch_assoc($result1))
        {
            echo "<br><br>Username: " . $row['username'];
        }
    }
    else echo "Failed to fetch results: " . mysqli_error($con);
mysqli_close($con);
}

if(isset($_POST['search']))
{
    $username = $_POST['username'];


    $con = mysqli_connect('localhost', 'root', '', 'amigofinder');
    if(!$con)
    {
        die("Failed to connect: " . mysqli_connect_error());
    }

    $sql = "select username from amigos where username = '$username'";
    $sql1 = "select username from finders where username = '$username'";


    $result = mysqli_query($con, $sql);
    $result1 = mysqli_query($con, $sql1);


    if(mysqli_num_rows($result) > 0)
    {
        echo "THE RESULTS ARE<br>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br>USERNAME: " . $row['username']; 
        }

    }
    else if(mysqli_num_rows($result1) > 0)
    {
        echo "THE RESULTS ARE<br>";
        while($row = mysqli_fetch_assoc($result1))
        {
            echo "<br>USERNAME: " . $row['username']; 
        }

    }
else echo "Error in finding results: " . mysqli_error($con);
mysqli_close($con);
}

if(isset($_POST['delete']))
{
    $con = mysqli_connect('localhost', 'root', '', 'amigofinder');
if(!$con)
{
    die("Failed to connect: " . mysqli_connect_error());
}
$username = $_POST['username'];

$sql = "delete from amigos where username = '$username'";
$sql1 = "delete from finders where username = '$username'";

$result = mysqli_query($con, $sql);
$result1 = mysqli_query($con, $sql1);


if($result || $result1)
{
    echo "<br><br>Values deleted successfully<br><br>";
}
else echo "<br><br>Failed to delete values: " . mysqli_error($con);
mysqli_close($con);

}


if(isset($_POST['selectstock']))
{
    $con = mysqli_connect('localhost', 'root', '', 'amigofinder');

    if(!$con)
    {
        die("Failed to connect:" . mysqli_connect_error());
    }

    $sql ="select * from stock";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        echo "<br>The data is<br>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<br><br>ITEM ID: " . $row['id'] . "<br>ITEM NAME: " . $row['name'] . "<br>ITEM PRICE: " . $row['price'] . "<br>UNITS LEFT: " . $row['units'];
        }
    }
    else echo "Failed to fetch results: " . mysqli_error($con);
mysqli_close($con);
}


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



if(isset($_POST['insertstock']))
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

    $sql ="insert into stock values($id, '$name', $price, $units)";

    $result = mysqli_query($con, $sql);

    if($result)
    {    
        echo "<br><br>Values inserted successfully<br><br>";
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
</html>

