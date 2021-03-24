<?php
	$con=mysqli_connect("localhost","root","","oap");
	if(!$con)
		die("Error");
	$id=$_GET["id"];
	$q="select * from course where stdID='$id'";
	$q_run=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($q_run);
	$q2="select * from meritlist where course='$row[name]'";
	$q2_run=mysqli_query($con,$q2);
	if(mysqli_num_rows($q2_run) >= 10){
		echo '<script>alert("No more students allowed under this course...")</script>';
		echo '<script>location.href="meritlist.php"</script>';
		die();
	}
	$q1="insert into meritlist(course,major,stdID) values('$row[name]','$row[major]','$id')";
	$q1_run=mysqli_query($con,$q1);
	if($q1_run){
		echo '<script>alert("Added To Merit List..");</script>';
		echo '<script>location.href="meritlist.php"</script>';
	}else{
		echo '<script>alert("Error while adding..Try again..");</script>';
		//echo '<script>location.href="meritlist.php"</script>';
	}
	