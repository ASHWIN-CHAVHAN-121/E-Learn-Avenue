<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style type="text/css">
  .navbar-nav {
    margin-left:420px;
    color:white;
    margin-top:10px;
    font-size:15px;
    font-weight:bold;
  }
  .navbar-inverse{
    border-radius:0;
    background:black;
    
  }
  
  
</style>

</head>
<body>



<nav class="navbar navbar-inverse" style="color: white;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: orange;padding:15px;margin-top:10px;font-weight:bold; font-size:26px;margin-left:5px;"> Welcome <?php echo $_SESSION['sname'];?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    
      <li class="active"><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li class="active"><a href="courses.php"><span class="glyphicon glyphicon-list"></span> Courses</a></li>
      <li class="active"><a href="history.php"><span class="glyphicon glyphicon-dashboard"></span> History</a></li>
      <li class="active"><a href="query.php"><span class="glyphicon glyphicon-list-alt"></span> Query</a></li>

      <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Explore<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="payment_history.php">Payment History</a></li>
          <li><a href="query_responce.php">Query Responses</a></li>
          
        </ul>
      </li>

      <li> <a href="logout.php">
            <button type="button" class="btn btn-info btn-sm" >
              <span class="glyphicon glyphicon-log-out"></span> Log out
            </button>
          </a></li>

</ul>
      
    
  </div>
</nav>

</body>
</html>
