<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/homestyle.css">    
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        /* Custom CSS for the navigation bar */
        .navbar-brand {
          margin-right: 50px; /* Add margin to the right of the brand */
        }
      
        .navbar-nav .nav-item {
          margin-right: 20px; /* Add margin to the right of each navigation item */
        }

        .main-heading {
            font-size: 48px;
            color: #fff; /* Gold color for main heading */
            text-align: center;
            margin-top: 20px;
        }

        .big-text {
            font-size: 24px;
            color: #ffffff; /* White color for big text */
            text-align: center;
            margin-bottom: 20px;
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
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="help.html">Help</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="rate.html">Rate An Amigo</a>
              </li>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="redeem.php">Redeem</a>
              </li>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="amigoofthemonth.php">Amigo Of The Month</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="main-heading">AmigoSearch</div>
      <div class="big-text">Find The Right Amigo For You!</div>

      <form class="search" action="" method="POST">
        <input type="search" placeholder="Enter City" name="city" required style="color: #ffffff;">
        <input type="search" placeholder="Preferred language" name="languageprimary" required style="color: #ffffff;">
        <input type="search" placeholder="Second language" name="languagesecondary" style="color: #ffffff;"> <!--if secondlanguage != NULL-->
        <button type="submit" name="search">Search</button>
      </form>

      <div class="search-results" style="color: aqua; position: absolute; top: 30%; left: 30.25%;">
        <?php
        session_start(); // Start the session if not already started

        // Check if the username is set in the session
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            // You can now use $username in this page
        } 

        if(isset($_POST['search'])) {
            $city = $_POST['city'];
            $languageprimary = $_POST['languageprimary'];
            $languagesecondary = $_POST['languagesecondary'];

            if(empty($languagesecondary)) {
                $languagesecondary = $languageprimary;
            }

            $con = mysqli_connect('localhost', 'root', '', 'amigofinder');

            if(!$con) {
                die("Failed to connect: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM amigos WHERE (amigolanguageprimary = '$languageprimary' OR amigolanguagesecondary = '$languageprimary' OR amigolanguageprimary = '$languagesecondary' OR amigolanguagesecondary = '$languagesecondary') AND city = '$city'";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0) {
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered table-striped" style="background-color: lightblue;">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Name</th>';
                echo '<th>Gender</th>';
                echo '<th>Age</th>';
                echo '<th>Languages Spoken</th>';
                echo '<th>Contact Number</th>';
                echo '<th>City</th>';
                echo '<th>Street</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['gender'] . '</td>';
                    echo '<td>' . $row['age'] . '</td>';
                    echo '<td>' . $row['amigolanguageprimary'] . ', ' . $row['amigolanguagesecondary'] . '</td>';
                    echo '<td>' . $row['contactnumber'] . '</td>';
                    echo '<td>' . $row['city'] . '</td>';
                    echo '<td>' . $row['street'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                // Link to rate.html
                echo '<p>Did this Amigo help you out? Drop them a <a href="rate.html">rating!</a></p>';
            } else {
                echo "NO RESULTS FOUND";
            }

            mysqli_close($con);
        }
        ?>
      </div>
</body>
</html>
