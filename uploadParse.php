<?php
	session_start();
	$uid=$_SESSION['eUID'];
	$courseAd=$_SESSION['courseAd'];
	$major=$_SESSION['major'];
	$hslcB=$_SESSION['hlscB'];
	$hslcI=$_SESSION['hlscI'];
	$hslcY=$_SESSION['hlscY'];
	$hslcP=$_SESSION['hlscP'];
	$hsS=$_SESSION['hsS'];
	$hsB=$_SESSION['hsB'];
	$hsI=$_SESSION['hsI'];
	$hsY=$_SESSION['hsY'];
	$hsP=$_SESSION['hsP'];
	$gD=$_SESSION['gD'];
	$gM=$_SESSION['gM'];
	$gU=$_SESSION['gU'];
	$gI=$_SESSION['gI'];
	$gY=$_SESSION['gY'];
	$gP=$_SESSION['gP'];
	$course=$_SESSION['courseAd'];
	$major=$_SESSION['major'];
	$filePic=basename($_FILES["pic"]["name"]);
	$fileSign=basename($_FILES["sign"]["name"]);
	$fileHslc=basename($_FILES["hslcMark"]["name"]);
	$fileHs=basename($_FILES["hsMark"]["name"]);
	if($_SESSION["gD"]!=''){
		$fileG=basename($_FILES["gMark"]["name"]);
		$target_dir = "uploads/";
		$target_file = $target_dir.$fileG;
		$target_file1 = $target_dir.$filePic;
		$target_file2 = $target_dir.$fileSign;
		$target_file3 = $target_dir.$fileHslc;
		$target_file4 = $target_dir.$fileHs;
		$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
		$fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
		$fileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
		$fileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
		if ( ($_FILES["pic"]["size"] > 524288) || ($_FILES["sign"]["size"] > 524288) || ($_FILES["hslcMark"]["size"] > 524288) || ($_FILES["hsMark"]["size"] > 524288) || ($_FILES["gMark"]["size"] > 524288) ){
			echo '<script>alert("File size cannot exceed 500kb..")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
			
		}	
		if( ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf" && $fileType != "doc") 
			|| 
			($fileType3 != "jpg" && $fileType3 != "png" && $fileType3 != "jpeg" && $fileType3 != "pdf" && $fileType3 != "doc")
			||
			($fileType4 != "jpg" && $fileType4 != "png" && $fileType4 != "jpeg" && $fileType4 != "pdf" && $fileType4 != "doc")
		  ){ 
			echo '<script>alert("File Type must be jgp,png,jpeg,pdf or doc")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
			
		}
		if	( ($fileType2 != "jpg" && $fileType2 != "png" && $fileType2 != "jpeg") || ($fileType1 != "jpg" && $fileType1 != "png" && $fileType1 != "jpeg") ){
			echo '<script>alert("File Type must be jgp,png or jpeg")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
			
		}
		if ( (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir.$uid.'pic.'.$fileType1)) 
			&&
			(move_uploaded_file($_FILES["sign"]["tmp_name"], $target_dir.$uid.'sign.'.$fileType2))
			&&
			(move_uploaded_file($_FILES["hslcMark"]["tmp_name"], $target_dir.$uid.'hslcMark.'.$fileType3))
			&&
			(move_uploaded_file($_FILES["hsMark"]["tmp_name"], $target_dir.$uid.'hsMark.'.$fileType4))
			&&
			(move_uploaded_file($_FILES["gMark"]["tmp_name"], $target_dir.$uid.'gMark.'.$fileType))
		   ){
			$con=mysqli_connect('localhost','root','','oap');
			if(!$con){
				die("CONNECTION NOT FOUND".mysqli_error());
			}  
			$filePicD=$target_dir.$uid.'pic.'.$fileType1;
			$fileSignD=$target_dir.$uid.'sign.'.$fileType2;
			$fileHslcM=$target_dir.$uid.'hslcMark.'.$fileType3;
			$fileHsM=$target_dir.$uid.'hsMark.'.$fileType4;
			$fileGM=$target_dir.$uid.'gMark.'.$fileType;
			$q="insert into academic(stdID,hslcB,hslcI,hslcY,hslcP,fileHslcM,hsS,hsB,hsI,hsY,hsP,fileHsM,gD,gM,gU,gI,gY,gP,fileGM,filePic,fileSign) values('$uid','$hslcB','$hslcI','$hslcY','$hslcP','$fileHslcM','$hsS','$hsB','$hsI','$hsY','$hsP','$fileHsM','$gD','$gM','$gU','$gI','$gY','$gP','$fileGM','$filePicD','$fileSignD')";
			$q_run=mysqli_query($con,$q);
			$q1="insert into course(name,major,stdID) values('$course','$major','$uid')";
			$q1_run=mysqli_query($con,$q1);
			if($q_run && $q1_run){
				echo '<script>alert("Successfully Applied For Admission..")</script>';
				echo '<script>location.href="main.php"</script>';
			}	
			else{
				echo '<script>alert("Insertion error.. Try Again..")</script>';
				echo '<script>location.href="educationalDetails.php"</script>';
			}
		}else{
			echo '<script>alert("File upload error.. Try Again..")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
		}		
	}else{
		$target_dir = "uploads/";
		$target_file1 = $target_dir.$filePic;
		$target_file2 = $target_dir.$fileSign;
		$target_file3 = $target_dir.$fileHslc;
		$target_file4 = $target_dir.$fileHs;
		$fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
		$fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
		$fileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
		$fileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
		if ( ($_FILES["pic"]["size"] > 524288) || ($_FILES["sign"]["size"] > 524288) || ($_FILES["hslcMark"]["size"] > 524288) || ($_FILES["hsMark"]["size"] > 524288) ){
			echo '<script>alert("File size cannot exceed 500kb..")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
			
		}	
		if(	($fileType3 != "jpg" && $fileType3 != "png" && $fileType3 != "jpeg" && $fileType3 != "pdf" && $fileType3 != "doc")
			||
			($fileType4 != "jpg" && $fileType4 != "png" && $fileType4 != "jpeg" && $fileType4 != "pdf" && $fileType4 != "doc")
		  ){ 
			echo '<script>alert("File Type must be jgp,png,jpeg,pdf or doc")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
			
		}
		if	( ($fileType2 != "jpg" && $fileType2 != "png" && $fileType2 != "jpeg") || ($fileType1 != "jpg" && $fileType1 != "png" && $fileType1 != "jpeg") ){
			echo '<script>alert("File Type must be jgp,png or jpeg")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
			
		}
		if ( (move_uploaded_file($_FILES["sign"]["tmp_name"], $target_dir.$uid.'sign.'.$fileType2))
			&&
			(move_uploaded_file($_FILES["hslcMark"]["tmp_name"], $target_dir.$uid.'hslcMark.'.$fileType3))
			&&
			(move_uploaded_file($_FILES["hsMark"]["tmp_name"], $target_dir.$uid.'hsMark.'.$fileType4))
			&&
			(move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir.$uid.'pic.'.$fileType1))
		   ){
			$con=mysqli_connect('localhost','root','','oap');
			if(!$con){
				die("CONNECTION NOT FOUND".mysqli_error());
			}  
			$filePicD=$target_dir.$uid.'pic.'.$fileType1;
			$fileSignD=$target_dir.$uid.'sign.'.$fileType2;
			$fileHslcM=$target_dir.$uid.'hslcMark.'.$fileType3;
			$fileHsM=$target_dir.$uid.'hsMark.'.$fileType4;
			$q="insert into academic(stdID,hslcB,hslcI,hslcY,hslcP,fileHslcM,hsS,hsB,hsI,hsY,hsP,fileHsM,filePic,fileSign) values('$uid','$hslcB','$hslcI','$hslcY','$hslcP','$fileHslcM','$hsS','$hsB','$hsI','$hsY','$hsP','$fileHsM','$filePicD','$fileSignD')";
			$q_run=mysqli_query($con,$q);
			$q1="insert into course(name,major,stdID) values('$course','$major','$uid')";
			$q1_run=mysqli_query($con,$q1);
			if($q_run && $q1_run){
				echo '<script>alert("Successfully Applied For Admission..")</script>';
				echo '<script>location.href="main.php"</script>';
			}	
			else{
				echo '<script>alert("Insertion error.. Try Again..")</script>';
				echo '<script>location.href="educationalDetails.php"</script>';
			}
		}else{
			echo '<script>alert("File upload error.. Try Again..")</script>';
			echo '<script>location.href="uploadFiles.php"</script>';
		}
	}
	
	
	
	
	
	
	
	