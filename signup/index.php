<!DOCTYPE html>
<html lang="en">

<?php
  session_start();

  if(isset($_SESSION["email"])) //if already signed in
    header("Location: ../index.php");
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- PopperJs-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <!-- FOR THE RECAPTCHA API-->
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <script src="../js/signup.js"></script>

  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/signup.css">
  <title>Sign up!</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
    <a class="navbar-brand" href="../index.php"> <img src="../img/lebanon-flag-icon.png" alt="icon" id="icon-navbar"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="../index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../tours/index.php">Tours</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../contactus/contactus.php">Contact Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../about/about.php">About</a>
        </li>
      </ul>



      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign Up</h5>

            <form class="form-signin" method="POST" action="registration.php" novalidate>

              <div class="form-label-group">
                <!--Email address-->
                <input type="email" id="inputEmail" name="email" class="specificFormat form-control"
                  placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address*</label>
                </p>
              </div>
              <br>

              <!--Telephone number-->
              <div class="form-label-group">
                <input class="form-control" type="tel" placeholder="Telephone" id="phone" name="telephone">
                <label for="phone">Telephone</label>
              </div>
              <br>

              <!--First name-->
              <div class="form-label-group">
                <input class="form-control alphaonly" type="text" placeholder="Name" id="inputName" name="firstname"
                  required>
                <label for="inputName">First Name*</label>
              </div>

              <!--Last name-->
              <div class="form-label-group">
                <input class="form-control alphaonly" type="text" placeholder="Last Name" id="inputLast" name="lastname"
                  required>
                <label for="inputLast">Last Name*</label>
              </div>

              <!--Address-->
              <div class="form-label-group">
                <input class="form-control alphaonly" type="text" placeholder="Address" id="inputAddress" name="address">
                <label for="inputAddress">Address*</label>
              </div>
              <br>

              <!--Password-->
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="specificFormat form-control"
                  placeholder="Password" rel="popover"
                  data-content="Must be at least 8 characters long, contain at least one lower case letter, one upper case letter, one special character, and a numeric character."
                  required>
                <label for="inputPassword">Password*</label>
              </div>

              <!--Verify password-->
              <div class="form-label-group">
                <input type="password" id="inputPassword2" name="password2" class="form-control"
                  placeholder="Confirm password" required>
                <label for="inputPassword2">Confirm password*</label>
                <div class="alert alert-danger" role="alert" hidden>
                  Passwords don't Match!
                </div>
              </div>
              <br>

              <!--RECAPTCHA USING TEST KEY-->
              <div class="form-label-group text-xs-center">
                <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                <input class="form-control d-none" data-recaptcha="true" required
                  data-error="Please complete the Captcha">
                <div class="help-block with-errors"></div>
              </div>

              <!--SUBMIT button-->
              <button class="btn btn-lg btn-signup btn-block text-uppercase" type="submit" id="signup_btn" disabled>Sign
                up</button>
            </form>
          </div>

        </div>
      </div>

    </div>
  </div>

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
          <p>Unnamed Project 443 strives to make your stay in Lebanon most memorable. For more info about what we do,
            click <a href="#">here.</a></p>

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
      <li class="list-inline-item">
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