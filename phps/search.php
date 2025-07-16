<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['search']))
    {
        $city = $_POST['city'];
        $languageprimary = $_POST['languageprimary'];
        $languagesecondary = $_POST['languagesecondary'];

        if(empty($languagesecondary))
        {
            $languagesecondary = $languageprimary;
            exit();
        }

        $con = mysqli_connect('localhost', 'root', '', 'amigofinder');
        if(!$con)
        {
            die("Failed to connect: " . mysqli_connect_error());
            header("Location: ../home.html");
            exit();
        }
        $sql = "select * from amigos where (languageprimary = '$languageprimary' OR languageprimary = '$languagesecondary' OR languagesecondary = '$languageprimary' OR languagesecondary = '$languagesecondary') AND city = '$city'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<br><br>Username: " . $row['username'] . "<br>Gender: " . $row['gender'] . "<br>Age: " . $row['age'] . "<br>City: " . $row['city'] . "<br>Street: " . $row['street'] . "<br>Languages spoken: " . $row['languageprimary'] . ", " . $row['languagesecondary'] . "<br>Contact number: " . $row['contactnumber'];  
            }

        }
        else{
        header("Location: ../home.html");
        }
    mysqli_close($con);
    }
}
