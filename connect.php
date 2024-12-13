<?php

$con = mysqli_connect("localhost","root","");
if ($con) 
{
	mysqli_select_db($con, "college_project");
	// echo "yes";
}

?>