<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <link rel="stylesheet" href="../css/about.css">

    <title>About us</title>

</head>


<body>
    <!-- NAVIGATION BAR AT THE TOP OF THE PAGE -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
            <a class="navbar-brand" href="#"> <img src="../img/lebanon-flag-icon.png" alt="icon" id="icon-navbar"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
  
                <li class="nav-item active">
                  <a class="nav-link" href="../index.php"> Home </span></a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link" href="#">Tours</a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link" href="#">Guides</a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact <span class="sr-only">(current)</span> </a>
                </li>
  
                <li class="nav-item">
                  <a class="nav-link" href="../about/about.php">About</a>
                </li>
                
  
                <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
                    <?= '$_SESSION["name"]' ?>
                  </a>
                  
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
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
                    <a href="../login/login.html"> <button type="button" class="btn btn-success" id="login_bt" style="margin-left: 10px">Log in</button> </a>
              </form>
                    <?php } ?>
            </div>
          </nav>
      <!-- END OF NAVIGATION BAR-->

      <section class="about-us py-5 " id="about-us">
        <div class="container mt-5">
        <div class="row">
                <div class="col-md-6">
                    <h1 class='text-success'>Welcome!</h1>
                    <h2 style="color: white">Know More About Us</h2>
                    <hr>
                    <p style="color: white">Unnamed Project 443 is a big project tackled by a small team! This private company based in Lebanon, Jbeil, was founded in Fall of 2019 when Halim Tannous, the CEO of Unnamed, gave a graded project to be completed by the end of the semester. Thus, Unnamed Project 443 was born!</p>
                    <p style="color: white">What makes our company special? Maybe it's the combination of three of the best software developers in the country! Or maybe it is because Unnamed Project 443 recieved the highest grade among its competitors! Our premise is simple: Provide the best service at the best rate. Give us a chance, and we promise you a memorable holiday! </p>
                    <button type="button" class="btn btn-success">Let's Know More</button>

                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="../img/about-us.png" alt="">
                </div>
            </div>
        </div>
        </section>


<section id="team" class="pb-5">

    <div class="container">
        <h5 class="section-title h1">OUR TEAM</h5>
        <div class="row">
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="../img/halim-tannous.jpg" alt="card image"></p>
                                    <h4 class="card-title">Halim Tannous</h4>
                                    <p class="card-text">CEO</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Halim Tannous</h4>
                                    <p class="card-text"><quote>"OK, I accept the project proposal. " <br>-Halim 2019</quote> <br>
                                                            Developing high quality business strategies and plans ensuring their alignment with short-term and long-term objectives,
                                                            overseeing all operations and business activities to ensure they produce the desired results and are consistent with the overall strategy and mission.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="../img/haidar-harmanani.jpg" alt="card image"></p>
                                    <h4 class="card-title">Haidar Harmanani</h4>
                                    <p class="card-text">CTO</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Haidar Harmanani</h4>
                                    <p class="card-text"><quote>"Shou hal project el habal. " <br>-Haidar 2019</quote> <br>
                                    Leading and motivating subordinates to advance employee engagement develop a high performing managerial team and
                                    making high-quality investing decisions to advance the business and increase profits. </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="../img/youssef-abboud.jpeg" alt="card image"></p>
                                    <h4 class="card-title">Youssef Abboud</h4>
                                    <p class="card-text">Software Developer.</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Youssef Abboud</h4>
                                    <p class="card-text">Youssef is one of our amazing developers that helped build this website! 
                                        After graduating from Harvard in 2018 with a degree in Computer Science, Youssef joined our team
                                        as a Software Developer, making sure everything is suitable for you!
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="../img/ralph-abh.jpeg" alt="card image"></p>
                                    <h4 class="card-title">Ralph Abou Haidar</h4>
                                    <p class="card-text">Software Developer</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Ralph Abou Haidar</h4>
                                    <p class="card-text">Ralph is one of our amazing developers that helped build this website! 
                                        After graduating from Stanford in 2016 with a degree in Computer Science, Ralph joined our team
                                        as a Software Developer, making sure everything is suitable for you!</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="../img/christina-aouad.jpeg" alt="card image"></p>
                                    <h4 class="card-title">Christina Aouad</h4>
                                    <p class="card-text">Software Developer</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Christina Aouad</h4>
                                    <p class="card-text">Christina is one of our amazing developers that helped build this website! 
                                        After graduating from MIT in 2018 with a degree in Computer Science, Christina joined our team
                                        as a Software Developer, making sure everything is suitable for you!</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->

        </div>
    </div>
</section>
<!-- Team -->


<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4 ">

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