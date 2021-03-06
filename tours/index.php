<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
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

    <script src="../js/homepage.js"></script>


    <title>Book a tour</title>
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
                <a class="nav-link" href="../index.php"> Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link disabled" href="tours.php" tabindex="-1" aria-disabled="true">Tours <span class="sr-only">(current)</span></a>
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
                        <a class="dropdown-item" href="../admin/index.php">Admin page</a>
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

 <!-- page-header -->
 <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">
                        <h1 class="page-title">Book a Tour</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
        
 <!--Main layout-->
 <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <?php 
            require("../database/connection.php");

            $sql = "SELECT DISTINCT * FROM Trails a, Trips b WHERE a.trail_id = b.trail_id";
            $result=$connection->query($sql);

            if($result->num_rows <= 0)
            {
      ?>
        <h1> No current trails, check again later.</h1>

        <?php } //if
            else
            {

                while($row = $result->fetch_assoc())
                {
        ?>
                    <div class="row wow fadeIn">

                        <!--Grid column-->
                        <div class="col-md-6 mb-4 img-wrapper">

                        <img src="../img/<?= $row['location']; ?>.jpg" class="pull-right img-fluid rounded product-img" alt="<?= $row['location'] ?>">

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 mb-4">

                        <!--Content-->
                        <div class="p-4">

                            <div class="mb-3">
                            <a href="">
                                <span class="badge badge-info mr-1"><?= $row['difficulty']; ?></span>
                            </a>
                            </div>

                            <p class="lead">
                            <span class="mr-1">
                                <del><?= 1.2*$row['price']." LL"; ?></del>
                            </span>
                            <span><?= $row['price']." LL"; ?><strong>*</strong></span>
                            </p>

                            <p class="lead font-weight-bold"><?= $row['location']; ?></p>

                            <p>Integrated in the reserve as a peripheral circuit connecting the two main entrances of Mchati and Qehmez through an attractive landscape, this trail, 
                            better known as the Roman Stairs, is part of the local and regional heritage of Jabal Moussa.
                            Along the way a large Latin inscription of Emperor Hadrian is engraved on an upright rock, clearly visible, contributing to the “Roman flavor” of this trail.</p>

                            <form class="d-flex justify-content-left" method="get" action="details.php">
                            <!-- Default input -->
                            <input type = "hidden" name = "location" value = "<?= $row["location"]; ?>" />
                            <input type = "hidden" name = "trail_id" value = "<?= $row["trail_id"]; ?>" />
                            <button class="btn btn-primary btn-md my-0 p" type="submit">Find out more!
                                <i class="fas fa-shopping-cart ml-1"></i>
                            </button>

                            </form>

                        </div>
                        <!--Content-->

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <hr>

      <?php
                }//while
            }//else

      ?>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 text-center">

          <h4 class="my-4 h4">Additional information</h4>

          <p><strong>*</strong>Prices do not include transportation fees.</p>

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
      <br>
    </div>
  </main>
  <!--Main layout-->

     



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