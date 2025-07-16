<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redeem page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    section{
      padding: 60px 0;
    }
  </style>
</head>

<body>
<div id="balance">
        
        <?php
  session_start(); // Start the session if not already started
  
  // Check if the username is set in the session
  if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      // You can now use $username in this page
  } 
       
          $conn = mysqli_connect('localhost', 'root', '', 'amigofinder');
      
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
      
          // You might want to implement user authentication to determine which user's balance to fetch.
          // For simplicity, let's assume a user ID for this example.
        
      
          // Query the database to get the user's balance
          $query = "SELECT points FROM amigos WHERE username = '$username'";
          $result = mysqli_query($conn, $query);
      
          if ($result) {
              $row = mysqli_fetch_assoc($result);
              $points = $row["points"];
      
              // Output the balance
              echo "Points available: " . $points . " points";
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      
          // Close the database connection
          mysqli_close($conn);
          ?>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



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
            </ul>
          </div>
        </div>
      </nav>














    <section id="pricing" class="bg-light mt-5">
        <div class="container-lg">
          <div class="text-center">
            <h2>Redeemable Rewards</h2>
            <p class="lead text-muted">Choose a reward to redeem.</p>
          </div>
    
          <div class="row my-5 g-0 align-items-center justify-content-center">
            <div class="col-8 col-lg-4 col-xl-3">
              <div class="card border-0">
                <div class="card-body text-center py-4">
                  <h4 class="card-title">500Rs Amazon Gift Card</h4>
                  <p class="lead card-subtitle">Points required:</p>
                  <p class="display-5 my-4 text-primary fw-bold">300</p>
                  <a href="success.php?var=1" class="btn btn-outline-primary btn-lg mt-3">
                    Redeem
                  </a>
                </div>
              </div>
            </div>
    
            <div class="col-9 col-lg-4">
              <div class="card border-primary border-2">
                <div class="card-header text-center text-primary">Most Popular</div>
                <div class="card-body text-center py-5">
                  <h4 class="card-title">Bluetooth Headphone Worth Rs 2000</h4>
                  <p class="lead card-subtitle">Points required:</p>
                  <p class="display-4 my-4 text-primary fw-bold">1000</p>
                  <a href="success.php?var=2" class="btn btn-outline-primary btn-lg mt-3">
                   Redeem
                  </a>
                </div>
              </div>
            </div>
    
            <div class="col-8 col-lg-4 col-xl-3">
              <div class="card border-0">
                <div class="card-body text-center py-4">
                  <h4 class="card-title">30% Discount Coupon For McDonald's</h4>
                  <p class="lead card-subtitle">Points required:</p>
                  <p class="display-5 my-4 text-primary fw-bold">100</p>
                  <a href="success.php?var=3" class="btn btn-outline-primary btn-lg mt-3">
                    Redeem
                  </a>
                </div>
              </div>
            </div>
          </div>
    
        </div><!-- end container -->
      </section>
    
      <!-- topics at a glance -->
    
    
      <!-- reviews list -->
    
    
      <!-- contact form -->
    
    
      <!-- get updates / modal trigger -->
    
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



      
    </body>
    </html>