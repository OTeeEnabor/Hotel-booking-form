<?php
// require 'inc/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--BootStrap CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--Font Awesome-->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<script src="https://kit.fontawesome.com/0cd95c0d58.js" crossorigin="anonymous"></script>
<!--Custom CSS-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Hotel Nav</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="">

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark "style="background-color: #202948;">
    <a class="navbar-brand" href="indexssss.php">NAV BOOKINGS</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="hotels.php">HOTELS</a>
            </li>
        </ul>
    </div>
    </nav>

    <!--LANDING CAROUSEL-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url(./images/landing-background.jpg)">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-3">Book Now</h2>
          <p class="lead">Make your booking with us and receive great deals and discounts.</p>
          <a href="bookings.php" class="btn btn-outline-primary landing-link"><i class="fas fa-arrow-right fa-fw"></i>BOOK NOW</a>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url(./images/landing-background-2.jpg)">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-3">Great Prices</h2>
          <p class="lead">Do not miss out on our great deals.</p>
          <a href="bookings.php" class="btn btn-outline-primary landing-link"><i class="fas fa-arrow-right fa-fw"></i>BOOK NOW</a>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url(./images/landing-background-3.jpg)">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-3">Great Deals at 5 Star Hotels</h2>
          <p class="lead">This is a description for the third slide.</p>
          <a href="bookings.php" class="btn btn-outline-primary landing-link"><i class="fas fa-arrow-right fa-fw"></i>BOOK NOW</a>
        </div>
      </div>
        <!-- Slide four - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url(./images/landing-background-4.jpg)">
        <div class="carousel-caption d-none d-md-block">
        <h2 class="display-3">Quality Servivce</h2>
          <p class="lead">Great customer service for all our guests.</p>
          <a href="bookings.php" class="btn btn-outline-primary landing-link"><i class="fas fa-arrow-right fa-fw"></i>BOOK NOW</a>
        </div>
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
    <!--LANDING CAROUSEL-->
    <!--LANDING PAGE START-->
    <!-- <div class="landing-page mt-4 mb-4">
    <h1 class="text-center">WELCOME TO NAV HOTEL BOOKINGS</h1>
    <p>Book a stay at one of our amazing hotels.</p>
    <a href="indexssss.php" class="btn bg-primary landing-link">Make a reservation now</a>
    </div> -->
    

   <!--LANDING PAGE END--> 
</body>
</html>