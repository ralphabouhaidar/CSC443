<!DOCTYPE html>
<html lang="en">

<?php 
    session_start();

    if(!isset($_GET["location"]) || !isset($_GET["trail_id"]))
    {
        echo "Error";
        header("Location: index.php");
    }

    else
    {
        $location = $_GET["location"];
        $trail_id = $_GET["trail_id"];
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/tours.css">
    <link rel="stylesheet" href="../css/details.css">

    <script src="../js/homepage.js"></script>


    <title><?= $location ?></title>
</head>

<body style="background-color: white">

    <!-- NAVIGATION BAR AT THE TOP OF THE PAGE -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
          <a class="navbar-brand" href="../index.php"> <img src="../img/lebanon-flag-icon.png" alt="icon" id="icon-navbar"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php">Tours<span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../contactus/index.php">Contact Us</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../about/index.php">About</a>
              </li>
            </ul>

            

            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <!--CHECKS IF USER IS LOGGED IN TO SEE WHETHER TO DISPLAY LOG IN BUTTON OR NOT-->
          <?php if (isset($_SESSION["email"]) && isset($_SESSION["first_name"]))
                { ?>

                <ul class="navbar-nav ml-sm-0">   
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $_SESSION["first_name"] ?>
                </a>
                
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Profile</a>
                  <?php 
                      if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true)
                      {
                    ?>
                        <a class="dropdown-item" href="admin/index.php">Admin page</a>
                    <?php
                      }
                      else
                      {
                    ?>
                        <a class="dropdown-item" href="#">Settings</a>
                    <?php
                      }
                    ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php">Log out</a>
                </div>
                </li>
                </ul>

             <!--IF USER IS NOT LOGGED IN-->
                <?php } 
                else
                { ?>
            <form class="form-inline my-2 my-lg-0">
                 <a href="../login/index.php"> <button type="button" class="btn btn-success" id="login_bt" style="margin-left: 10px">Log in</button> </a>
            </form>
                  <?php } ?>
          </div>
        </nav>
    <!-- END OF NAVIGATION BAR-->

        
    <?php 
            require("../database/connection.php");

            $sql = "SELECT DISTINCT * FROM Trails a, Trips b  WHERE a.trail_id = b.trail_id AND a.trail_id = \"".$trail_id."\"";
            $result=$connection->query($sql);

            if($result->num_rows > 0) /*if the query returns a non-empty result*/
            {
                $row = $result->fetch_assoc();
      ?>
                <div class="container">
                        <div class="card">
                            <div class="container-fliud">
                                <div class="wrapper row">
                                    <div class="preview col-md-6">
                                        
                                        <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-1"><img src="../img/<?= $location; ?>.jpg" /></div>
                                        <div class="tab-pane" id="pic-2"><img src="../img/<?= $location; ?>2.jpg" /></div>
                                        <div class="tab-pane" id="pic-3"><img src="../img/<?= $location; ?>3.jpg" /></div>
                                        <div class="tab-pane" id="pic-4"><img src="../img/<?= $location; ?>4.jpg" /></div>
                                        <div class="tab-pane" id="pic-5"><img src="../img/<?= $location; ?>5.jpg" /></div>
                                        </div>
                                        <ul class="preview-thumbnail nav nav-tabs">
                                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="../img/<?= $location; ?>.jpg" /></a></li>
                                        <li><a data-target="#pic-2" data-toggle="tab"><img src="../img/<?= $location; ?>2.jpg" /></a></li>
                                        <li><a data-target="#pic-3" data-toggle="tab"><img src="../img/<?= $location; ?>3.jpg" /></a></li>
                                        <li><a data-target="#pic-4" data-toggle="tab"><img src="../img/<?= $location; ?>4.jpg" /></a></li>
                                        <li><a data-target="#pic-5" data-toggle="tab"><img src="../img/<?= $location; ?>5.jpg" /></a></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="details col-md-6">
                                        <h3 class="product-title"><?= $location ?></h3>
                                        <div class="rating">
                                            <div class="stars">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <span class="review-no">41 reviews</span>
                                        </div>
                                        <p class="product-description">Start location: <?= $row["start_location"]; ?> <br/>
                                                                       End location: <?= $row["end_location"]; ?> <br/>
                                                                       Distance: <?= $row["distance"]; ?></p>
                                        <h4 class="price">current price: <span class="mr-1">
                                                                                <del><?= 1.2*$row['price']." LL"; ?></del>
                                                                               </span>
                                                                                 <span><?= $row['price']." LL"; ?></span></h4>

                        <!-- CHECKS IF TRIP HAS TRANSPORTATION -->
                        <?php 
                            $query = "SELECT DISTINCT * FROM Trips a, Transportation b, trips_has_transportation c WHERE c.transportation_id = b.transport_id AND c.trip_id = a.trip_id AND a.trail_id = \"".$trail_id."\"";
                            $result2 = $connection->query($query);
                            if($result2->num_rows > 0)
                            {
                                $row2=$result2->fetch_assoc();
                        ?>

                                        <h4 class="price">with transportation: <span class="mr-1">
                                      <del><?= 1.2*$row2['price']+$row2['transport_price']." LL"; ?></del>
                                     </span>
                                        <span><?= $row2['price']+$row2['transport_price']." LL"; ?></span></h4>
                                        <p> Driver's phone number: <?= $row2["transport_phone"]; ?></p>

                        <?php 
                            }
                            else
                            {
                            ?>

                            

                                        <h4 class="price">with transportation: 
                                        <span> No transportation for this trail. </span></h4>

                            <?php 
                            }
                            ?>

                                        <p class="vote"><strong>91%</strong> of our customers enjoyed this trail! <strong>(87 votes)</strong></p>

                                        <div class="action">
                                            <form method="GET" action="verification.php">
                                                <input type = "hidden" name = "trip_id" value = "<?= $row["trip_id"]; ?>" />
                                                <button class="add-to-cart btn btn-default" type="submit">Book now</button>
                                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php

            }

            ?>

            <br>
            <br>

     



<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Unnamed Project 443</h5>
        <p>Unnamed Project 443 strives to make your stay in Lebanon most memorable. For more info about what we do, click <a href="#">here.</a></p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Useful Links</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Join us!</a>
          </li>
          <li>
            <a href="#!">Location</a>
          </li>
          <li>
            <a href="#!">Pricing</a>
          </li>
          <li>
            <a href="#!">Settings</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">About</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">About</a>
          </li>
          <li>
            <a href="#!">Careers</a>
          </li>
          <li>
            <a href="#!">Privacy Policy</a>
          </li>
          <li>
            <a href="#!">Terms and Conditions</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Developers</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!">Halim Tannous</a>
          </li>
          <li>
            <a href="#!">Christina Aouad</a>
          </li>
          <li>
            <a href="#!">Youssef Abboud</a>
          </li>
          <li>
            <a href="#!">Ralph Abou Haidar</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <hr>

  <!-- Social buttons -->
  <ul class="list-unstyled list-inline text-center">
    <li class="list-inline-item">
      <a class="btn-floating btn-fb mx-1" href="facebook.com">
        <i class="fab fa-facebook-f"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-tw mx-1" href="www.twitter.com">
        <i class="fab fa-twitter"> </i>
      </a>
    </li>
    <li class="list-inline-item" >
      <a class="btn-floating btn-gplus mx-1" href="www.google.com">
        <i class="fab fa-google-plus-g"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-li mx-1" href="linkedin.com">
        <i class="fab fa-linkedin-in"> </i>
      </a>
    </li>
  </ul>
  <!-- Social buttons -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="https://github.com/ralphabouhaidar/CSC443"> Web Group</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
        
    
</body>



</html>