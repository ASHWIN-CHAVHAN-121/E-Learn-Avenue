<style type="text/css">

.navbar-inverse
{
  background-color:#000000;
  border: none;
  border-radius: 0;
}
#myNavbar ul li a 
{
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
      <a style="color:orange; font-weight:bold; font-size:24px" class="navbar-brand" href="#">
        Welcome <?php echo $_SESSION['admin']; ?>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php">
          <span class="glyphicon glyphicon-home"></span>
        Home</a></li>

        <li><a href="students.php">
        <span class="glyphicon glyphicon-user"></span>
        Students</a></li>

        <li><a href="courses.php">
        <span class="glyphicon glyphicon-list"></span>
        Courses</a></li>

        <li><a href="clist.php">
        <span class="glyphicon glyphicon-list"></span>
        Courses List </a></li>

        <li><a href="history.php">
        <span class="glyphicon glyphicon-dashboard"></span>
        History  </a></li>

        <li><a href="qlist.php">
        <span class="glyphicon glyphicon-list-alt"></span>
        Query</a></li>
        <li><a href="qresponse.php"><span class="glyphicon glyphicon-share-alt"></span> Query Responses</a></li>

        <li><a href="logout.php">
        <span class="glyphicon glyphicon-off"></span>

        Logout</a></li>

      </ul>
     
    </div>
  </div>
</nav>