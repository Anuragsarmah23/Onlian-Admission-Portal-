<?php
	//RADHEY
	$con=mysqli_connect('localhost','root','','oap');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$cno=mysqli_real_escape_string($con,$_POST['cno']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$dob=mysqli_real_escape_string($con,$_POST['dob']);
	$pass=mysqli_real_escape_string($con,$_POST['password']);
	$cnfpass=mysqli_real_escape_string($con,$_POST['cnfpass']);
	$idR=rand(1000,9999);
	$nameID=str_replace(' ', '', $name);
	$id=$nameID.$idR;
	if($pass==$cnfpass){
		$q="insert into student values('$id','$name','$cno','$address','$dob','$pass')";
		$q_run=mysqli_query($con,$q);
		if($q_run)
			$dispmsg=$id;	
		else	
			$dispmsg='error';
	}else
		$dispmsg='passError';
	mysqli_close($con);
	echo json_encode($dispmsg);
?>