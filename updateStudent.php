<?php
	session_start();
	$con=mysqli_connect('localhost','root','','oap');
	if(!$con)
 		die("CONNECTION NOT FOUND".mysqli_error());
	$id=$_POST["uid"];
	$name=$_POST["name"];
	$contact=$_POST["contact"];
	$address=$_POST["address"];
	$dob=$_POST["dob"];
	$q="update student set name='$name',contact='$contact',address='$address',dob='$dob' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Updated Successfully")</script>';
		echo '<script>location.href="students.php"</script>';
	}
	else{
		echo '<script>alert("Error while updating...please try again..")</script>';
		echo '<script>location.href="students.php"</script>';
	}