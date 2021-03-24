<?php
	$con=mysqli_connect("localhost","root","","oap");
	if(!$con)
		die("Error");
	$id=$_GET["id"];
	$q="delete from meritlist where stdID='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Removed from merit list..");</script>';
		echo '<script>location.href="meritList.php";</script>';
	}else{
		echo '<script>alert("Error while removing..Try Again..");</script>';
		echo '<script>location.href="meritList.php";</script>';
	}