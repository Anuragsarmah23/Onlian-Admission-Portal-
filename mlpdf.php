<?php
	$con=mysqli_connect("localhost","root","","oap");
	if(!$con)
		die("Error");
	$q="select * from meritlist where course='bsc'";
	$q_run=mysqli_query($con,$q);
	$qBCA="select * from meritlist where course='bca'";
	$qBCA_run=mysqli_query($con,$qBCA);
	$qBA="select * from meritlist where course='ba'";
	$qBA_run=mysqli_query($con,$qBA);
	$qMSC="select * from meritlist where course='msc'";
	$qMSC_run=mysqli_query($con,$qMSC);
	$qMCA="select * from meritlist where course='mca'";
	$qMCA_run=mysqli_query($con,$qMCA);
	$qMA="select * from meritlist where course='ma'";
	$qMA_run=mysqli_query($con,$qMA);
?>
<html>
<body>
        <table style="font-size:14px; width:100%">
        <tr>
            <td>
                <table style="width:100%; border-collapse:collapse;">
                    <tr>
                        <td style="width:150px;"><img src="img/1234.jpg" height="75" width="150"></td>
                        <td style="width:250px;font-size:24px;"><b>MERIT LIST</b></td>
                    </tr>
                </table>
            </td>
        </tr>
         <tr style="background:rgb(10,200,170);">
            <th style="padding:8px;">BSC</th>
        </tr>
        <tr>
            <td>        
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name</th>
						<th style="padding:8px;">Major</th>  
                    </tr>
					<?php while($row=mysqli_fetch_assoc($q_run)){ 
							$q1="select * from student where id='$row[stdID]'";
							$q1_run=mysqli_query($con,$q1);
							$row1=mysqli_fetch_assoc($q1_run);
					?>
						
                    <tr>
                        <td style="padding:8px;"><?php echo $row1["name"]; ?></td>
                        <td style="padding:8px;"><?php echo $row["major"]; ?></td>
                    </tr>
					<?php } ?>
                </table>
            </td>
        </tr>
		<tr style="background:rgb(10,200,170);">
            <th style="padding:8px;">BCA</th>
        </tr>
        <tr>
            <td>        
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name</th>
                    </tr>
					<?php while($rowBCA=mysqli_fetch_assoc($qBCA_run)){ 
							$q1BCA="select * from student where id='$rowBCA[stdID]'";
							$q1BCA_run=mysqli_query($con,$q1BCA);
							$row1BCA=mysqli_fetch_assoc($q1BCA_run);
					?>
                    <tr>
                        <td style="padding:8px;"><?php echo $row1BCA["name"]; ?></td>
                    </tr>
					<?php } ?>
                </table>
            </td>
        </tr>
		<tr style="background:rgb(10,200,170);">
            <th style="padding:8px;">BA</th>
        </tr>
        <tr>
            <td>        
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name</th>
						<th style="padding:8px;">Major</th>  
                    </tr>
					<?php while($rowBA=mysqli_fetch_assoc($qBA_run)){ 
							$q1BA="select * from student where id='$rowBA[stdID]'";
							$q1BA_run=mysqli_query($con,$q1BA);
							$row1BA=mysqli_fetch_assoc($q1BA_run);
					?>
                    <tr>
                        <td style="padding:8px;"><?php echo $row1BA["name"]; ?></td>
                        <td style="padding:8px;"><?php echo $rowBA["major"]; ?></td>
                    </tr>
					<?php } ?>
                </table>
            </td>
        </tr>
		<tr style="background:rgb(10,200,170);">
            <th style="padding:8px;">MSC</th>
        </tr>
        <tr>
            <td>        
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name</th>
						<th style="padding:8px;">Major</th>  
                    </tr>
					<?php while($rowMSC=mysqli_fetch_assoc($qMSC_run)){ 
							$q1MSC="select * from student where id='$rowMSC[stdID]'";
							$q1MSC_run=mysqli_query($con,$q1MSC);
							$row1MSC=mysqli_fetch_assoc($q1MSC_run);
					?>
                    <tr>
                        <td style="padding:8px;"><?php echo $row1MSC["name"]; ?></td>
                        <td style="padding:8px;"><?php echo $rowMSC["major"]; ?></td>
                    </tr>
					<?php } ?>
                </table>
            </td>
        </tr>
		<tr style="background:rgb(10,200,170);">
            <th style="padding:8px;">MCA</th>
        </tr>
        <tr>
            <td>        
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name</th>
                    </tr>
					<?php while($rowMCA=mysqli_fetch_assoc($qMCA_run)){ 
							$q1MCA="select * from student where id='$rowMCA[stdID]'";
							$q1MCA_run=mysqli_query($con,$q1MCA);
							$row1MCA=mysqli_fetch_assoc($q1MCA_run);
					?>
                    <tr>
                        <td style="padding:8px;"><?php echo $row1MCA["name"]; ?></td>
                    </tr>
					<?php } ?>
                </table>
            </td>
        </tr>
		<tr style="background:rgb(10,200,170);">
            <th style="padding:8px;">MA</th>
        </tr>
        <tr>
            <td>        
                <table border="1" style="width:100%; border-collapse:collapse;">
                    <tr>
                        <th style="padding:8px;">Name</th>
						<th style="padding:8px;">Major</th>  
                    </tr>
					<?php while($rowMA=mysqli_fetch_assoc($qMA_run)){ 
							$q1MA="select * from student where id='$rowMA[stdID]'";
							$q1MA_run=mysqli_query($con,$q1MA);
							$row1MA=mysqli_fetch_assoc($q1MA_run);
					?>
                    <tr>
                        <td style="padding:8px;"><?php echo $row1MA["name"]; ?></td>
                        <td style="padding:8px;"><?php echo $rowMA["major"]; ?></td>
                    </tr>
					<?php } ?>
                </table>
            </td>
        </tr>
      
    </table>
</body>
</html>