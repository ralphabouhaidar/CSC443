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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/main.css">

    <script src="js/homepage.js"></script>


    <title>Welcome!</title>
</head>

<body>
    <!-- NAVIGATION BAR AT THE TOP OF THE PAGE -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
          <a class="navbar-brand" href="#"> <img src="img/lebanon-flag-icon.png" alt="icon" id="icon-navbar"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="index.html"> Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Tours</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Guides</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
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
                <?} 
                else
                { ?>
            <form class="form-inline my-2 my-lg-0">
                 <a href="login/login.html"> <button type="button" class="btn btn-success" id="login_bt" style="margin-left: 10px">Log in</button> </a>
            </form>
                  <?}?>
          </div>
        </nav>
    <!-- END OF NAVIGATION BAR-->

     

        <!-- CAROUSEL SLIDE SHOW BOOTSTRAP -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-content">
                        <h1 class="slogan col-sm-12 text-sm-left">Relax… You’re with us! <br> We make it simple.</h1>
                        <h3 class="subslogan col-sm-12 text-sm-left"> Visit Lebanon with the click of a button. <br> </h3>
                      <button type="button" class="book_btn btn btn-info d-md-block">Book a tour</button>
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/lebanon-background-2.jpg" alt="First slide" style="width: 100%">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Pigeon's Rocks (Raouche)</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/lebanon-background-1.jpg" alt="Second slide" style="width: 100%">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/lebanon-background-3.jpg" alt="Third slide" style="width: 100%">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="img/lebanon-background-4.jpeg" alt="Fourth slide" style="width: 100%">
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="img/lebanon-background-5.jpg" alt="Fifth slide" style="width: 100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- END OF CAROUSEL SLIDE SHOW BOOTSTRAP -->
        
    
</body>



</html>