<?php
	session_start();
	$con=mysqli_connect('localhost','root','','oap');
	if(!$con)
 		die("CONNECTION NOT FOUND".mysqli_error());
	$id=$_GET["id"];
	$q="delete from academic where stdID='$id'";
	$q_run=mysqli_query($con,$q);
	$q1="delete from course where stdID='$id'";
	$q1_run=mysqli_query($con,$q1);
	$q2="delete from meritlist where stdID='$id'";
	$q2_run=mysqli_query($con,$q2);
	$q3="delete from student where id='$id'";
	$q3_run=mysqli_query($con,$q3);
	if($q3_run){
		echo '<script>alert("Record deleted succesfully...")</script>';
		echo '<script>location.href="students.php"</script>';
	}