<?php
session_start();
include('connect.php');

if (empty($_SESSION['id'])) 
{
 header('location:index.php'); 	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Adamina' rel='stylesheet'>
	<?php include('bootcdn.php'); ?>
    <style type="text/css">
        
        .carousel-caption h3,h2 {
            animation-duration: 3s;
            animation-name: slidein;
            font-size: 2rem;
            margin-top: -400px;
        }

        .carousel-caption h3,h2 {
            animation-duration: 3s;
            animation-name: slidein1;
            font-size: 2rem;

        }

        @keyframes slidein {
            from {
                margin-top: 100%;
            }

            to {
                margin-top: 0%;
            }
        }

        @keyframes slidein1 {
            from {
                margin-top: 150%;
            }

            to {
                margin-top: 0%;
            }
        }
    </style>

</head>
<body>

	<?php include('header.php'); ?>

 <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: -19px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>

  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/carousel3.jpg" style="width:100%;height: 700px;">
      <div class="carousel-caption">
        <h3 style="color:aqua;font-weight:bold;font-size: 50px;">Welcome TO E-Learn Avenue!</h3> 
        <h2 style="color: white; font-size: 30px; ">The Greatest Online Learning Platform!</h2>
      </div>
    </div>

    <div class="item">
      <img src="images/carousel4.png" style="width:100%; height: 700px;">
      <div class="carousel-caption">
        <h3 style="color:white;font-weight:bold;font-size: 50px;">Best Online Courses</h3>
        <h2 style="color: orangered; font-size: 22px; font-weight: bold;">Take the next step towards your personal and professional goals with E-Learn Avenue</h2>
     </div>
    </div>

  
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

	<!-- <section id="head">
		<div class="container">
				<div class="row">
					<div class="col-sm-10 col-lg-10">
						<div class="header-text">
							<h2 style="color: cyan; font-weight: bold;">Best Online Courses</h2>
							<br>
							<h2 style="color: white; font-size: 40px; font-weight: bold;">E-LEARNING WEBSITE</h2>
							<br> 
							<h2 id="heading" style="color: white; font-size: 50px; font-weight: bold;">The Greatest Online Learning Platform !</h2>
							
						</div>
					</div>
				</div>
			</div>
		</section> -->

<br><br>
		<div class="container">
            <h1 class="well well-sm text-center" style="background-color: lightgoldenrodyellow; font-weight:bold;">Activities</h1>
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3" style="background-color: darkcyan; color: black; height: 260px;">
                        <div class="p-4" style="padding: 60px;">
                            <?php
                        $sdata = mysqli_query($con,"SELECT * FROM booking WHERE uid = '".$_SESSION['id']."' ");
                        $result = mysqli_num_rows($sdata);
                        ?>
                            <span class="glyphicon glyphicon-book" style="font-size: 40px;"></span>
                            <h3>Bookings - <?php echo $result ?></h3>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3" style="background-color: darkcyan; color: black; height: 260px;">
                        <div class="p-4" style="padding: 60px;">
                            <?php
                        $sdata = mysqli_query($con,"SELECT * FROM courses ");
                        $result = mysqli_num_rows($sdata);
                        ?>
                            <span class="glyphicon glyphicon-list" style="font-size: 40px;"></span>
                            <h3>Courses - <?php echo $result ?></h3>
                            
                        </div>
                    </div>
                </div>
       
               
            </div>
        </div>
        <br><br>

        <div class="container">

        <h1 class="well well-sm text-center" style="background-color: lightgoldenrodyellow; font-weight:bold;">About Us</h1>

            <div class="row g-5">

                <div class="col-lg-6">
                    <img src="images/about.jpg" style="height:400px; width: 100%">
                </div>

                <div class="col-lg-6">
                    <p style="text-indent: 50px;font-size: 20px;margin-top: 40px;color: black;">Welcome to eLearning Platform, your gateway to a world of knowledge and discovery. As pioneers in online education, we're dedicated to providing high-quality learning experiences that are accessible anytime, anywhere. Our platform brings together expert instructors and cutting-edge technology to offer a diverse range of courses spanning various disciplines.
                    </p>
                    <br>
                    <p style="text-indent: 50px;font-size: 20px;color: black;">Whether you're looking to enhance your skills, explore new interests, or advance your career,eLearning Platform has something for everyone. Our user-friendly interface and interactive features make learning engaging and effective, allowing you to progress at your own pace.</p>
                    <br>
                    
                </div>
                
            </div>
            
        </div>

 <?php include('footer.php'); ?>        


</body>
</html>