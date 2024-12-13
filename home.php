<?php
session_start();

include ('connect.php');

if (empty($_SESSION['id'])) {
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="images/logo1.jpg">
  <title>User Home Page</title>
  <!-- external links  -->
  <link rel="stylesheet" href="style.css">

  <!-- carosel links -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- carosel links end -->
  <!-- payment glyphicon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <?php
  include ('bootcdn.php');
  ?>

</head>

<body>
  <!-- navbar include -->
  <?php include ('header1.php'); ?>

  <!-- carosel start -->
  <header>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        

      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/carousel3.jpg" alt="..." style="height: 900px;width:100%;">
          <div class="carousel-caption">
            <h2 class="animated bounceInRight" style="animation-delay: 2s;color:aqua;font-weight:bold;font-size: 50px;margin-top:-500px;">
              Welcome TO E-Learn Avenue!</h2>
            <h3 class="animated bounceInLeft" style="animation-delay:2s;color: white; font-size: 30px">The Greatest
              Online Learning Platform!</h3>
          </div>
        </div>

        <div class="item">
          <img src="images/bg2.jpg" alt="..." style="height: 900px;width:100%">
          <div class="carousel-caption">
            <h2 class="animated zoomIn" style="animation-delay: 2s;color:aqua;font-weight:bold;font-size: 50px;margin-top:-500px;">Best
              Online Courses</h2>
            <h3 class="animated zoomIn" style="animation-delay: 2s;color:white; font-size: 30px; font-weight: bold;">
              Take the next step
              towards your personal and professional goals with E-Learn Avenue.</h3>
          </div>
        </div>

      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
  </header>
  <!-- end carousel -->

  <!-- booking and data show on home page -->
  <br><br>
  <div class="container">
    <h1 class="well well-sm text-center" style="font-weight:bold;">Activities
    </h1>
    <div class="row g-4">
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item text-center pt-3" style="background-color:bisque; color: black; height: 260px;">
          <div class="p-4" style="padding: 60px;">
            <?php
            $sdata = mysqli_query($con, "SELECT * FROM booking WHERE uid = '" . $_SESSION['id'] . "' ");
            $result = mysqli_num_rows($sdata);
            ?>
            <span class="glyphicon glyphicon-book" style="font-size: 40px;"></span>
            <h3>Bookings - <?php echo $result ?></h3>

          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item text-center pt-3" style="background-color:bisque; color: black; height: 260px;">
          <div class="p-4" style="padding: 60px;">
            <?php
            $sdata = mysqli_query($con, "SELECT * FROM courses ");
            $result = mysqli_num_rows($sdata);
            ?>
            <span class="glyphicon glyphicon-list" style="font-size: 40px;"></span>
            <h3>Courses - <?php echo $result ?></h3>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item text-center pt-3" style="background-color:bisque; color: black; height: 260px;">
          <div class="p-4" style="padding: 60px;">
            <?php
            $sdata = mysqli_query($con, "SELECT * FROM `query` WHERE `uid`= '" . $_SESSION['id'] . "'");
            $result = mysqli_num_rows($sdata);
            ?>
            <span class="glyphicon glyphicon-question-sign" style="font-size: 40px;"></span>
            <h3>Query - <?php echo $result ?></h3>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item text-center pt-3" style="background-color:bisque; color: black; height: 260px;">
          <div class="p-4" style="padding: 60px;">
            <?php
            $sdata = mysqli_query($con, "SELECT * FROM `payment_orders` WHERE `uid`= '" . $_SESSION['id'] . "'");
            $result = mysqli_num_rows($sdata);
            ?>
            <span class="fa fa-rupee" style="font-size: 40px;"></span>
            <h3>Payments- <?php echo $result ?></h3>
          </div>
        </div>
      </div>

    </div>
  </div>
  <br><br>

  <!-- categories section Popular courses -->
  <section id="popular" class="categories-section spad" style="margin-top:10px;">
    <div class="container">
      <div class="section-title">
        <h2 class="well text-center" style="font-weight: bold; margin-bottom: 50px; color:black;">Popular<span
            style="color:orangered"> Courses</span></h2>
        <h4 class="text-center" style="margin-top: -20px;font-weight:bold;">An extensive courses for anyone to get into
          Information Technology</h4>
      </div>
      <div class="row" style="margin-top:20px">
        <!-- categorie -->
        <div class="col-lg-4 col-md-6">
          <div class="categorie-item">
            <div class="ci-thumb set-bg">
              <img src="images/datascience.jpg" width="100%" height="190px">
            </div>
            <div class="ci-text">
              <h4 style="font-weight:bold;  color:orange; font-size:30px">Data Science</h4>
              <p style="color:black; font-weight:bold; font-size:small">Full Stack Data Science Courses with notes </p>
              <span>2 Courses</span>
              <a href="courses.php">
                <button class="btn btn-primary btn-sm form-control" style="margin-top: 10px;"> Read More</button>
              </a>
            </div>

          </div>
        </div>
        <!-- categorie -->
        <div class="col-lg-4 col-md-6">
          <div class="categorie-item">
            <div class="ci-thumb set-bg">
              <img src="images/webdev..jpg" width="100%">
            </div>
            <div class="ci-text">
              <h4 style="font-weight:bold; color:orange; font-size:30px">Web Design </h4>
              <p style="color:black; font-weight:bold; font-size:small"> Full Stack Web Dev Courses with notes </p>
              <span>5 Courses</span>
              <a href="courses.php">
                <button class="btn btn-primary btn-sm form-control" style="margin-top: 10px;"> Read More</button>
              </a>
            </div>
          </div>
        </div>
        <!-- categorie -->
        <div class="col-lg-4 col-md-6">
          <div class="categorie-item">
            <div class="ci-thumb set-bg">
              <img src="images/java.png" width="100%" height="190px">
            </div>
            <div class="ci-text">
              <h4 style="font-weight:bold; color:orange; font-size:26px">Java Programming</h4>
              <p style="color:black; font-weight:bold; font-size:small"> Full Stack Java Courses with notes </p>
              <span>3 Courses</span>
              <a href="courses.php">
                <button class="btn btn-primary btn-sm form-control" style="margin-top: 10px;"> Read More</button>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- categories section end -->
  </div>

  <!-- key highlights start -->
  <section id="highlight" style="margin-top:10px;">
    <div class="container">

      <div class="highlight-title">
        <h2 class="well text-center">Key <span style="color:orangered">Highlights</span></h2>
      </div>

      <div class="row" id="row-highlight">
        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/people.svg" width="30px"> <span>Limited Students Batch</span>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/search.svg" width="30px"> <span>Personalized attention</span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/people.svg" width="30px"> <span>Qualified Teachers</span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/hand-thumbs-up.svg" width="30px"> <span>Flexible Schedule</span>
        </div>

        <br> <br><br> <br>

        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/people.svg" width="30px"> <span>Interactive Learning</span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/people.svg" width="30px"> <span>Job Oriented Training</span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/check-circle.svg" width="30px"> <span>Free Sessions</span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 pt-3 my-4 text-center">
          <img src="images/people.svg" width="30px"> <span>Career Support</span>
        </div>
      </div>
    </div>
  </section>

  <!--cards section trainer start  -->
  <section id="trainer">
    <div class="trainer-title">
      <h2 class="well text-center">Learn Coding from this <span style="color:orangered"> Superheroes</span></h2>
    </div>

    <div class="row">
      <div class="col-sm-2">

      </div>
      <div class="col-sm-2">
        <div id="card" class="card">
          <img class="img-thumbnail" src="images/harry.jpg" alt="Avatar" width="100%">
          <div id="trainer">
            <h4> <span><img src="images/youtube.svg" width="30px"></span>
              <b><a href="https://www.youtube.com/@CodeWithHarry">Code with Harry !</a></b>
            </h4>
            <p><span>
                <img src="images/y.jpg" width="26px"> <b style="color:black;">6.4M Users </b>
              </span></p>
          </div>
        </div>
      </div>

      <div class="col-sm-2">
        <div id="card" class="card">
          <img class="img-thumbnail" src="images/telusko1.png" alt="Avatar" height="300px" width="100%">
          <div id="trainer">
            <h4> <span><img src="images/youtube.svg" width="30px"></span>
              <b><a href="https://www.youtube.com/@Telusko">Telusko!</a></b>
            </h4>
            <p><span>
                <img src="images/y.jpg" width="26px"><b>2.3M Users </b>
              </span></p>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div id="card" class="card">
          <img class="img-thumbnail" src="images/apnaclg1jpg.jpg" alt="Avatar" height="300px" width="100%">
          <div id="trainer">
            <h4><span><img src="images/youtube.svg" width="30px"></span>
              <b><a href="https://www.youtube.com/@ApnaCollegeOfficial">Apna College !</a></b>
            </h4>
            <p><span>
                <img src="images/y.jpg" width="26px"> <b>5.3M Users </b>
              </span></p>
          </div>
        </div>
      </div>

      <div class="col-sm-2">
        <div id="card" class="card">
          <img class="img-thumbnail" src="images/codingseekho1.jpg" alt="Avatar" height="300px" width="100%">
          <div id="trainer">
            <h4><span><img src="images/youtube.svg" width="30px"></span>
              <b><a href="https://www.youtube.com/@codingseekho">Coding Seekho!</a></b>
            </h4>
            <p><span>
                <img src="images/y.jpg" width="26px"> <b>100k Users </b>
              </span></p>
          </div>
        </div>
      </div>

      <div class="col-sm-2">

      </div>
    </div>
  </section>
  <!--cards section trainer end  -->

  <br><br>
  <!-- videos section start -->
  <div class="section-title">
    <h2 class="well text-center" style="font-weight: bold; margin-bottom: 10px; color:black;">Start learning with <span
        style="color:orangered"> FreeTutorial's</span></h2>
  </div>
  <div class="row" style="margin-top: 50px;">
    <div class="col-sm-3" id="video1">
      <video width="100%" height="200px" class="img-thumbnail" controls>
        <source src="vdo/ds.mp4" type="video/mp4">
      </video>
      <h4 style="font-weight: bold;" class="text-center">Basics of Data Science</h4>
      <hr style="border-bottom:3px solid black; margin-top:0; width:60%">
    </div>
    <div class="col-sm-3">
      <video width="100%" height="200px" class="img-thumbnail" controls>
        <source src="vdo/web.mp4" type="video/mp4">
      </video>
      <h4 style="font-weight: bold;" class="text-center">Roadmap-Web Development</h4>
      <hr style="border-bottom:3px solid black; margin-top:0; width:60%">
    </div>
    <div class="col-sm-3">
      <video width="100%" height="200px" class="img-thumbnail" controls>
        <source src="vdo/python.mp4" type="video/mp4">
      </video>
      <h4 style="font-weight: bold;" class="text-center">Introduction of Python</h4>
      <hr style="border-bottom:3px solid black; margin-top:0; width:60%">
    </div>

    <div class="col-sm-3">
      <video width="100%" height="200px" class="img-thumbnail" controls>
        <source src="vdo/java.mp4" type="video/mp4">
      </video>

      <h4 style="font-weight: bold;" class="text-center">Java in 5 Minutes</h4>
      <hr style="border-bottom:3px solid black; margin-top:0; width:60%">
    </div>

  </div>
  <br>
  <!-- footer include -->
  <?php include ('footer.php'); ?>

</body>

</html>


<style>
  /* cards css */
  /* cards trainers */

  #trainer .trainer-title h2 {
    font-weight: bold;
    margin-bottom: 50px;
    color: black;
  }

  #trainer .trainer-title h4 {
    margin-top: -30px;
    color: black;
    font-weight: bold;
  }

  #card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8);
    transition: 0.3s;
    box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.5);
    transition: 0.5s ease-in-out;
  }

  /* On mouse-over, add a deeper shadow */
  #card:hover {
    transform: translateX(20px);
    background-color: lightcoral;
  }

  #card:before {
    content: "";
    top: 0;
    left: 0;
    background-color: linear-gradient(to bottom, rgba(0, 176, 155, 0.5), rgba(150, 201, 61, 1));
    z-index: 2;
    transition: 0.5s all;
    opacity: 0;
  }

  #card:hover:before {
    opacity: 1;
  }

  /* Add some padding inside the card container */
  #trainer {
    padding: 2px 10px;

  }
</style>