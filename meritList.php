<?php
	session_start();
	if(!isset($_SESSION["adminID"])){
		header("location:index.php");
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ADMIN|OAP</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashAdmin.php" class="simple-text">
                    STUDENT LIST
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashAdmin.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li> 
                    <a href="students.php">
                        <i class="pe-7s-user"></i>
                        <p>Students</p>
                    </a>
                </li>
				<li class="active">
                    <a href="meritList.php">
                        <i class="fa fa-trophy"></i>
                        <p>Merit List</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">HOME</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">HOME</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card" style="min-height:82vh;padding:20px;">
						<div class="card-header" style="font-size:16px;color:#a912df;">
							<b>MERIT LIST</b>
							<?php 
								//Radhe
								$con=mysqli_connect("localhost","root","","oap");
								if(!$con)
									die("Error");
								$qML="select * from meritlist";
								$qML_run=mysqli_query($con,$qML);
								if(mysqli_num_rows($qML_run) > 0){
							?>
							<a href="meritListPDF.php" class="btn btn-primary" style="margin-left:75%;">View Merit List</a>
								<?php } ?>
						</div><hr>
						<u><h5>BSC(Total Seats 10)</h5></u>
						<?php
							
							$q="select * from course where name='bsc'";
							$q_run=mysqli_query($con,$q);
							$rows=mysqli_num_rows($q_run);
							if($rows > 0){
						?>
						<table id="studentList" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>
									<th>NAME</th>
									<th>Major Applied For</th>
									<th>HSLC Percentage</th>
									<th>HS Percentage</th>
									<th>HSLC marksheet</th>
									<th>HS marksheet</th>
									<th>Add/Remove To/From Merit List</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($row=mysqli_fetch_assoc($q_run)){
									$q2="select * from student where id='$row[stdID]'";
									$q2_run=mysqli_query($con,$q2);
									$row2=mysqli_fetch_assoc($q2_run);
									$q1="select * from academic where stdID='$row[stdID]'";
									$q1_run=mysqli_query($con,$q1);
									$row1=mysqli_fetch_assoc($q1_run);
									$q3="select * from meritlist where stdID='$row[stdID]'";
									$q3_run=mysqli_query($con,$q3);
							?>
								<tr>
									<td><?php echo $row2["name"]; ?></td>
									<td><?php echo $row["major"]; ?></td>
									<td><?php echo $row1["hslcP"]; ?></td>
									<td><?php echo $row1["hsP"]; ?></td>
									<td><a href="<?php echo $row1["fileHslcM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1["fileHsM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<?php if(mysqli_num_rows($q3_run) > 0){ ?>
									<td><a href="removeML.php?id=<?php echo $row2['id']; ?>"><i class="fa fa-trash delI"></i></a></td>
									<?php }else{?>
									<td><a href="addML.php?id=<?php echo $row2['id']; ?>"><i class="fa fa-plus editI"></i></a></td>
									<?php } ?>
								</tr>	
							<?php
								}
							?>	
							</tbody>
							
						</table>
								<?php
									}else{
										echo "<b>No records to display</b>";
									}
								?>	
						<u><h5>BCA(Total Seats 10)</h5></u>
						<?php
							$qBCA="select * from course where name='bca'";
							$qBCA_run=mysqli_query($con,$qBCA);
							$rowsBCA=mysqli_num_rows($qBCA_run);
							if($rowsBCA > 0){
						?>		
						<table id="studentList1" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>
									<th>NAME</th>
									<th>HSLC Percentage</th>
									<th>HS Percentage</th>
									<th>HSLC marksheet</th>
									<th>HS marksheet</th>
									<th>Add/Remove To/From Merit List</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($rowBCA=mysqli_fetch_assoc($qBCA_run)){
									$q2BCA="select * from student where id='$rowBCA[stdID]'";
									$q2BCA_run=mysqli_query($con,$q2BCA);
									$row2BCA=mysqli_fetch_assoc($q2BCA_run);
									$q1BCA="select * from academic where stdID='$rowBCA[stdID]'";
									$q1BCA_run=mysqli_query($con,$q1BCA);
									$row1BCA=mysqli_fetch_assoc($q1BCA_run);
									$q3BCA="select * from meritlist where stdID='$rowBCA[stdID]'";
									$q3BCA_run=mysqli_query($con,$q3BCA);
							?>
								<tr>
									<td><?php echo $row2BCA["name"]; ?></td>
									<td><?php echo $row1BCA["hslcP"]; ?></td>
									<td><?php echo $row1BCA["hsP"]; ?></td>
									<td><a href="<?php echo $row1BCA["fileHslcM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1BCA["fileHsM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<?php if(mysqli_num_rows($q3BCA_run) > 0){ ?>
									<td><a href="removeML.php?id=<?php echo $row2BCA['id']; ?>"><i class="fa fa-trash delI"></i></a></td>
									<?php }else{?>
									<td><a href="addML.php?id=<?php echo $row2BCA['id']; ?>"><i class="fa fa-plus editI"></i></a></td>
									<?php } ?>
								</tr>	
							<?php
								}
							?>	
							</tbody>
							
						</table>
								<?php
									}else{
										echo "<b>No records to display</b>";
									}
								?>	
						<u><h5>BA(Total Seats 10)</h5></u>
						<?php
							$qBA="select * from course where name='ba'";
							$qBA_run=mysqli_query($con,$qBA);
							$rowsBA=mysqli_num_rows($qBA_run);
							if($rowsBA > 0){
						?>		
						<table id="studentList2" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>
									<th>NAME</th>
									<th>Major Applied For</th>
									<th>HSLC Percentage</th>
									<th>HS Percentage</th>
									<th>HSLC marksheet</th>
									<th>HS marksheet</th>
									<th>Add/Remove To/From Merit List</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($rowBA=mysqli_fetch_assoc($qBA_run)){
									$q2BA="select * from student where id='$rowBA[stdID]'";
									$q2BA_run=mysqli_query($con,$q2BA);
									$row2BA=mysqli_fetch_assoc($q2BA_run);
									$q1BA="select * from academic where stdID='$rowBA[stdID]'";
									$q1BA_run=mysqli_query($con,$q1BA);
									$row1BA=mysqli_fetch_assoc($q1BA_run);
									$q3BA="select * from meritlist where stdID='$rowBA[stdID]'";
									$q3BA_run=mysqli_query($con,$q3BA);
								
							?>
								<tr>
									<td><?php echo $row2BA["name"]; ?></td>
									<td><?php echo $rowBA["major"]; ?></td>
									<td><?php echo $row1BA["hslcP"]; ?></td>
									<td><?php echo $row1BA["hsP"]; ?></td>
									<td><a href="<?php echo $row1BA["fileHslcM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1BA["fileHsM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<?php if(mysqli_num_rows($q3BA_run) > 0){ ?>
									<td><a href="removeML.php?id=<?php echo $row2BA['id']; ?>"><i class="fa fa-trash delI"></i></a></td>
									<?php }else{?>
									<td><a href="addML.php?id=<?php echo $row2BA['id']; ?>"><i class="fa fa-plus editI"></i></a></td>
									<?php } ?>
								</tr>	
							<?php
								}
							?>	
							</tbody>
							
						</table>
								<?php
									}else{
										echo "<b>No records to display</b>";
									}
								?>	
						<u><h5>MSC(Total Seats 10)</h5></u>
						<?php
							$qMSC="select * from course where name='msc'";
							$qMSC_run=mysqli_query($con,$qMSC);
							$rowsMSC=mysqli_num_rows($qMSC_run);
							if($rowsMSC > 0){
						?>		
						<table id="studentList3" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>
									<th>NAME</th>
									<th>Major Applied For</th>
									<th>HSLC Percentage</th>
									<th>HS Percentage</th>
									<th>UG Percentage</th>
									<th>HSLC marksheet</th>
									<th>HS marksheet</th>
									<th>UG marksheet</th>
									<th>Add/Remove To/From Merit List</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($rowMSC=mysqli_fetch_assoc($qMSC_run)){
									$q2MSC="select * from student where id='$rowMSC[stdID]'";
									$q2MSC_run=mysqli_query($con,$q2MSC);
									$row2MSC=mysqli_fetch_assoc($q2MSC_run);
									$q1MSC="select * from academic where stdID='$rowMSC[stdID]'";
									$q1MSC_run=mysqli_query($con,$q1MSC);
									$row1MSC=mysqli_fetch_assoc($q1MSC_run);
									$q3MSC="select * from meritlist where stdID='$rowMSC[stdID]'";
									$q3MSC_run=mysqli_query($con,$q3MSC);
									
							?>
								<tr>
									<td><?php echo $row2MSC["name"]; ?></td>
									<td><?php echo $rowMSC["major"]; ?></td>
									<td><?php echo $row1MSC["hslcP"]; ?></td>
									<td><?php echo $row1MSC["hsP"]; ?></td>
									<td><?php echo $row1MSC["gP"]; ?></td>
									<td><a href="<?php echo $row1MSC["fileHslcM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1MSC["fileHsM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1MSC["fileGM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<?php if(mysqli_num_rows($q3MSC_run) > 0){ ?>
									<td><a href="removeML.php?id=<?php echo $row2MSC['id']; ?>"><i class="fa fa-trash delI"></i></a></td>
									<?php }else{?>
									<td><a href="addML.php?id=<?php echo $row2MSC['id']; ?>"><i class="fa fa-plus editI"></i></a></td>
									<?php } ?>
								</tr>	
							<?php
								}
							?>	
							</tbody>
							
						</table>
								<?php
									}else{
										echo "<b>No records to display</b>";
									}
								?>	
						<u><h5>MCA(Total Seats 10)</h5></u>
						<?php
							$qMCA="select * from course where name='mca'";
							$qMCA_run=mysqli_query($con,$qMCA);
							$rowsMCA=mysqli_num_rows($qMCA_run);
							if($rowsMCA > 0){
						?>		
						<table id="studentList4" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>
									<th>NAME</th>
									<th>HSLC Percentage</th>
									<th>HS Percentage</th>
									<th>UG Percentage</th>
									<th>HSLC marksheet</th>
									<th>HS marksheet</th>
									<th>UG marksheet</th>
									<th>Add/Remove To/From Merit List</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($rowMCA=mysqli_fetch_assoc($qMCA_run)){
									$q2MCA="select * from student where id='$rowMCA[stdID]'";
									$q2MCA_run=mysqli_query($con,$q2MCA);
									$row2MCA=mysqli_fetch_assoc($q2MCA_run);
									$q1MCA="select * from academic where stdID='$rowMCA[stdID]'";
									$q1MCA_run=mysqli_query($con,$q1MCA);
									$row1MCA=mysqli_fetch_assoc($q1MCA_run);
									$q3MCA="select * from meritlist where stdID='$rowMCA[stdID]'";
									$q3MCA_run=mysqli_query($con,$q3MCA);
									
							?>
								<tr>
									<td><?php echo $row2MCA["name"]; ?></td>
									<td><?php echo $row1MCA["hslcP"]; ?></td>
									<td><?php echo $row1MCA["hsP"]; ?></td>
									<td><?php echo $row1MCA["gP"]; ?></td>
									<td><a href="<?php echo $row1MCA["fileHslcM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1MCA["fileHsM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1MCA["fileGM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<?php if(mysqli_num_rows($q3MCA_run) > 0){ ?>
									<td><a href="removeML.php?id=<?php echo $row2MCA['id']; ?>"><i class="fa fa-trash delI"></i></a></td>
									<?php }else{?>
									<td><a href="addML.php?id=<?php echo $row2MCA['id']; ?>"><i class="fa fa-plus editI"></i></a></td>
									<?php } ?>
								</tr>	
							<?php
								}
							?>	
							</tbody>
							
						</table>
								<?php
									}else{
										echo "<b>No records to display</b>";
									}
								?>	
						<u><h5>MA(Total Seats 10)</h5></u>
						<?php
							$qMA="select * from course where name='ma'";
							$qMA_run=mysqli_query($con,$qMA);
							$rowsMA=mysqli_num_rows($qMA_run);
							if($rowsMA > 0){
						?>		
						<table id="studentList5" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>
									<th>NAME</th>
									<th>Major Applied For</th>
									<th>HSLC Percentage</th>
									<th>HS Percentage</th>
									<th>UG Percentage</th>
									<th>HSLC marksheet</th>
									<th>HS marksheet</th>
									<th>UG marksheet</th>
									<th>Add/Remove To/From Merit List</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($rowMA=mysqli_fetch_assoc($qMA_run)){
									$q2MA="select * from student where id='$rowMA[stdID]'";
									$q2MA_run=mysqli_query($con,$q2MA);
									$row2MA=mysqli_fetch_assoc($q2MA_run);
									$q1MA="select * from academic where stdID='$rowMA[stdID]'";
									$q1MA_run=mysqli_query($con,$q1MA);
									$row1MA=mysqli_fetch_assoc($q1MA_run);
									$q3MA="select * from meritlist where stdID='$rowMA[stdID]'";
									$q3MA_run=mysqli_query($con,$q3MA);
							?>
								<tr>
									<td><?php echo $row2MA["name"]; ?></td>
									<td><?php echo $rowMA["major"]; ?></td>
									<td><?php echo $row1MA["hslcP"]; ?></td>
									<td><?php echo $row1MA["hsP"]; ?></td>
									<td><?php echo $row1MA["gP"]; ?></td>
									<td><a href="<?php echo $row1MA["fileHslcM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1MA["fileHsM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<td><a href="<?php echo $row1MA["fileGM"]; ?>"><i class="fa fa-hand-o-up editI"></i></a></td>
									<?php if(mysqli_num_rows($q3MA_run) > 0){ ?>
									<td><a href="removeML.php?id=<?php echo $row2MA['id']; ?>"><i class="fa fa-trash delI"></i></a></td>
									<?php }else{?>
									<td><a href="addML.php?id=<?php echo $row2MA['id']; ?>"><i class="fa fa-plus editI"></i></a></td>
									<?php } ?>
								</tr>	
							<?php
								}
							?>	
							</tbody>
							
						</table>
								<?php
									}else{
										echo "<b>No records to display</b>";
									}
								?>									
					</div>
                </div>
            </div>
        </div>


        <footer class="footer">
            
                <p class="copyright pull-right">
                    &copy; <a href="index.php">OAP</a> Online Admission Portal
                </p>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
	<script>
			$(document).ready(function() {
				$('#studentList').DataTable({
					scrollX:true,
					fixedColumns:   false,
				});
				$('#studentList1').DataTable({
					scrollX:true,
					fixedColumns:   false,
				});$('#studentList2').DataTable({
					scrollX:true,
					fixedColumns:   false,
				});
				$('#studentList3').DataTable({
					scrollX:true,
					fixedColumns:   false,
				});
				$('#studentList4').DataTable({
					scrollX:true,
					fixedColumns:   false,
				});
				$('#studentList5').DataTable({
					scrollX:true,
					fixedColumns:   false,
				});
			} );
		</script>


</html>
