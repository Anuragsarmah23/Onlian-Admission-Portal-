<?php
	session_start();
	$id=$_GET['id'];
	$con=mysqli_connect("localhost","root","","oap");
	if(!$con)
		die("Error");
	$q="select * from student where id='$id'";
	$q_run=mysqli_query($con,$q);
	$q1="select * from academic where stdID='$id'";
	$q1_run=mysqli_query($con,$q1);
	$q2="select * from course where stdID='$id'";
	$q2_run=mysqli_query($con,$q2);
	$row=mysqli_fetch_assoc($q_run);
	$row1=mysqli_fetch_assoc($q1_run);
	$row2=mysqli_fetch_assoc($q2_run);
?>
<html>
<body>
        <table style="font-size:14px; width:100%">
        <tr>
            <td>
                <table style="width:100%; border-collapse:collapse;">
                    <tr>
                        <td style="width:150px;"><img src="img/1234.jpg" height="75" width="150"></td>
                        <td style="width:250px;font-size:24px;"><b>ADMISSION FORM</b></td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td>        
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name</th>
                        <td colspan="3" style="padding:8px;"><?php echo $row["name"]; ?></td>
                        <td rowspan="3" style="width:12%;padding:none;"><img src="<?php echo $row1["filePic"]; ?>" height="150" width="125"></td>
                        
                    </tr>
                    <tr>
                        <th style="padding:8px;">Date of Birth</th>
                        <td  colspan="3" style="padding:8px;"><?php echo $row["dob"]; ?></td>
                    </tr>
                    <tr>
                        <th style="padding:8px;">Address</th>
                        <td colspan="3" style="padding:8px;"><?php echo $row["address"]; ?></td>
                        
                    </tr>
                    
                    <tr>
                        <th style="padding:8px;">Contact Number</th>
                        <td colspan="3" style="padding:8px;"><?php echo $row["contact"]; ?></td>  
						<td><img src="<?php echo $row1["fileSign"]; ?>" height="50" width="125"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="background:rgb(10,200,170);">
                <th style="padding:8px;">Educational Details</th>
        </tr>
        <tr>
            <td>
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name of the Exam</th>
                        <th style="padding:8px;">Board/University</th>
                        <th style="padding:8px;">Institute</th>
                        <th style="padding:8px;">Year of Passing</th>
                        <th style="padding:8px;">Percentage</th>
                    </tr>
                    <tr>
                        <td style="padding:8px;">HSLC</td>
                        <td style="padding:8px;"><?php echo  $row1["hslcB"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["hslcI"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["hslcY"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["hslcP"]; ?></td>
                    </tr>
                    <tr>
                        <td style="padding:8px;">HSSLC(<?php echo $row1["hsS"]; ?>)</td>
                        <td style="padding:8px;"><?php echo  $row1["hsB"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["hsI"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["hsY"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["hsP"]; ?></td>
                    </tr>
					<?php if($row1["gD"] != ''){ ?> 
                    <tr>
                        <td style="padding:8px;">Graduation(<?php echo $row1["gD"].'-'.$row1["gM"]; ?>)</td>
                        <td style="padding:8px;"><?php echo  $row1["gU"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["gI"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["gY"]; ?></td>
                        <td style="padding:8px;"><?php echo  $row1["gP"]; ?></td>
                    </tr>
					<?php } ?>
                </table>
            </td>
        </tr>
		<tr style="background:rgb(10,200,170);">
                <th style="padding:8px;">Course Applied For</th>
        </tr>
        <tr>
            <td>
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Course Name</th>
                        <th style="padding:8px;">Major</th>
                    </tr>
                    <tr>
                        <td style="padding:8px;"><?php echo  strtoupper($row2["name"]); ?></td>
                        <td style="padding:8px;"><?php echo  strtoupper($row2["major"]); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>