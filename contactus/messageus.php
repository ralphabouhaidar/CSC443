<html>

<?php 
session_start();
?>

<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     
     <link rel="stylesheet" href="../css/main.css">
     <link rel="stylesheet" href="../css/messageus.css">

</head>

<body>

        <!-- NAVIGATION BAR AT THE TOP OF THE PAGE -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
            <a class="navbar-brand" href="../index.php"> <img src="../img/lebanon-flag-icon.png" alt="icon" id="icon-navbar"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
  
                <li class="nav-item active">
                  <a class="nav-link" href="../index.php"> Home </span></a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link" href="../tours/index.php">Tours</a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link disabled" href="index.php" tabindex="-1" aria-disabled="true">Contact Us</a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link" href="../about/about.php">About</a>
                </li>
              </ul>
  
              
  
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
  
              <!--CHECKS IF USER IS LOGGED IN TO SEE WHETHER TO DISPLAY LOG IN BUTTON OR NOT-->
            <?php if (isset($_SESSION["email"]) )
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
                    <a class="dropdown-item" href="#">Log out</a>
                  </div>
                  </li>
                  </ul>
  
                <!--IF USER IS NOT LOGGED IN-->
                  <?php } 
                  else
                  { ?>
              <form class="form-inline my-2 my-lg-0">
                    <a href="../login/login.php"> <button type="button" class="btn btn-success" id="login_bt" style="margin-left: 10px">Log in</button> </a>
              </form>
                    <?php } ?>
            </div>
          </nav>
      <!-- END OF NAVIGATION BAR-->

            
            

      <div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                  <div class="well well-sm">
                      <form class="form-horizontal" method="post" action="send.php">
                          <fieldset>
                              <legend class="text-center header">Contact us</legend>
      
                              <div class="form-group row">
                                  <span class="col-md-2 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i></span>
                                  <div class="col-md-8">
                                      <input id="fname" name="fname" type="text" placeholder="First Name" class="form-control">
                                  </div>
                              </div>
                              <br/>

                              <div class="form-group row">
                                  <span class="col-md-2 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i></span>
                                  <div class="col-md-8">
                                      <input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control">
                                  </div>
                              </div>
                              <br/>
      
                              <div class="form-group row">
                                  <span class="col-md-2 col-md-offset-1 text-center"><i class="fa fa-envelope bigicon"></i></span>
                                  <div class="col-md-8">
                                      <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                                  </div>
                              </div>
                              <br/>
      
                              <div class="form-group row">
                                  <span class="col-md-2 col-md-offset-1 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                  <div class="col-md-8">
                                      <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                                  </div>
                              </div>
                              <br/>
      
                              <div class="form-group row">
                                  <span class="col-md-2 col-md-offset-1 text-center"><i class="fas fa-pen-square bigicon"></i></span>
                                  <div class="col-md-8">
                                      <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here. We will get back to you within 2 business days." rows="7"></textarea>
                                  </div>
                              </div>
                              <br/>
      
                              <div class="form-group row">
                                  <div class="col-md-12 text-center">
                                      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                  </div>
                              </div>
                              <br/>
                          </fieldset>
                      </form>
                  </div>
              </div>
          </div>
      </div>


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
          <p>Unnamed Project 443 strives to make your stay in Lebanon most memorable. For more info about what we do, click <a href="../about/index.php">here.</a></p>
  
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