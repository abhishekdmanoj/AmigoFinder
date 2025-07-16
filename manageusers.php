<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabbed Page</title>
    <link rel="stylesheet" href="adminstyle.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .tabs {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .tab-button {
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            color: #fff; /* Set the font color to white */
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
        }
        .tab-content {
            display: none;
        }
        .active-tab {
            display: block;
        }
    </style>
</head>
<body>
    <div class="tabs">
        <button class="tab-button" onclick="openTab('tab1')">Tab 1</button>
        <button class="tab-button" onclick="openTab('tab2')">Tab 2</button>
    </div>

    <div class="tab-content" id="tab1">
        <h2 style="color: #fff;">User Display</h2>
        <p style="color: #fff;">Click to Display list of all existing users</p>
        <form method = 'POST' action = ''>             
            <input type = 'submit' name = 'select' value = 'DISPLAY'>
    </form>
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
?>
    </div>

    <div class="tab-content" id="tab2">
        <h2 style="color: #fff;">User Management</h2>
        <p style="color: #fff;">Enter Username and select the required operation</p>
        <form method = 'POST' action = ''>
            <input type = 'text' name = 'username' placeholder = 'USERNAME'><br><br>
            <input type = 'submit' name = 'search' value = 'SEARCH'>
            <input type = 'submit' name = 'delete' value = 'DELETE'>
</form>
            
<?php

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

mysqli_query($con, $sql);
mysqli_query($con, $sql1);


if(mysqli_affected_rows($con))
{
    echo "<br><br>Values deleted successfully<br><br>";
}
else echo "<br><br>Failed to delete values: " . mysqli_error($con);
mysqli_close($con);

}


?>

    </div>

    <script>
        function openTab(tabName) {
            var i, tabContent;
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }

        // Show the initial tab (you can choose to show Tab 1 or Tab 2)
        openTab('tab1');
    // Prevent form submission from refreshing the page
    document.querySelector("#tab2 form").addEventListener("submit", function (event) {
        event.preventDefault();
    });
    
    </script>
    
</body>
</html>
