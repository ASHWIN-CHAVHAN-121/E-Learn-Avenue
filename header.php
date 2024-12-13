<style type="text/css">
  .navbar-inverse {
    background-color: #000000;
    border: none;
    border-radius: 0;
    height: 40px;

  }

  #myNavbar ul li a {
    color: white;
    font-size: 14px;
  }
</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color:orange; font-weight:bold; font-size:26px" class="navbar-brand" href="#">
        Welcome <?php echo $_SESSION['sname']; ?>
      </a>
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">
            <span class="glyphicon glyphicon-home"></span>
            Home</a></li>

        <li><a href="profile.php">
            <span class="glyphicon glyphicon-user"></span>
            Profile</a></li>

        <li><a href="courses.php">
            <span class="glyphicon glyphicon-list"></span>
            Courses</a></li>

        <li><a href="history.php">
            <span class="glyphicon glyphicon-dashboard"></span>
            History</a></li>

        <li><a href="query.php">
            <span class="glyphicon glyphicon-list-alt"></span>
            Query</a></li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Explore
            <span class="caret"></span>
            <ul class="dropdown-menu">
              <li><a href="payment_history.php" style="color: black;">Payment History</a></li>
              <li><a href="query_response.php" style="color: black;">Query Responses</a></li>
              
            </ul>
          </a>
          
        </li>


        <li> <a href="logout.php">
            <button type="button" class="btn btn-info btn-sm" style="margin-top:-6px">
              <span class="glyphicon glyphicon-log-out"></span> Log out
            </button>
          </a></li>
      </ul>

    </div>
  </div>
</nav>