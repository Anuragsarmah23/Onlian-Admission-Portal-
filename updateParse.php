<?php
	$con=mysqli_connect('localhost','root','','oap');
		if(!$con){
			die("CONNECTION NOT FOUND".mysqli_error());
		} 
	$uid=$_POST['uid'];
	$hslcB=$_POST['hslcB'];
	$hslcI=$_POST['hslcI'];
	$hslcY=$_POST['hslcY'];
	$hslcP=$_POST['hslcP'];
	$hsS=$_POST['hsS'];
	$hsB=$_POST['hsB'];
	$hsI=$_POST['hsI'];
	$hsY=$_POST['hsY'];
	$hsP=$_POST['hsP'];
	if( ($_POST['courseAdE'] == 'mca') || ($_POST['courseAdE'] == 'ma') || ($_POST['courseAdE'] == 'msc') ){
		$gD=$_POST['gD'];
		$gM=$_POST['gM'];
		$gU=$_POST['gU'];
		$gI=$_POST['gI'];
		$gY=$_POST['gY'];
		$gP=$_POST['gP'];
		if($gD == 'bca')
			$gM='';
	}else{
		$gD='';
		$gM='';
		$gU='';
		$gI='';
		$gY='';
		$gP='';
	}
	$q="update academic set hslcB='$hslcB',hslcI='$hslcI',hslcY='$hslcY',hslcP='$hslcP',hsS='$hsS',hsB='$hsB',hsI='$hsI',hsY='$hsY',hsP='$hsP',gD='$gD',gM='$gM',gU='$gU',gI='$gI',gY='$gY',gP='$gP' where stdID='$uid'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Updated Successfully");</script>';
		echo '<script>location.href="editEducational.php"</script>';
	}else{
		echo '<script>alert("Error while updating..");</script>';
		echo '<script>location.href="editEducational.php"</script>';
	}