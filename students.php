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
                <li class="active"> 
                    <a href="students.php">
                        <i class="pe-7s-user"></i>
                        <p>Students</p>
                    </a>
                </li>
				<li>
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
						<div class="card-header" style="font-size:16px;color:#a912df;"><b>STUDENT LIST</b></div><hr>
						<?php
							//Radhe
							$con=mysqli_connect("localhost","root","","oap");
							if(!$con)
								die("Error");
							$q="select * from student";
							$q_run=mysqli_query($con,$q);
							$rows=mysqli_num_rows($q_run);
							if($rows > 0){
						?>
						<table id="studentList" class="table table-striped table-bordered bg-white" style="width:100%">
						
							<thead>
								<tr>
									<th>ID</th>
									<th>NAME</th>
									<th>CONTACT</th>
									<th>ADDRESS</th>
									<th>DOB</th>
									<th>DETAILS PDF</th>
									<th>HSLC Marksheet</th>
									<th>HS Marksheet</th>
									<th>UG Marksheet</th>
									<th>EDIT</th>
									<th>DEL</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($row=mysqli_fetch_assoc($q_run)){
									$q1="select * from academic where stdID='$row[id]'";
									$q1_run=mysqli_query($con,$q1);
									$row1=mysqli_fetch_assoc($q1_run);
									
							?>
								<tr>
									<td><?php echo $row["id"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["contact"]; ?></td>
									<td><?php echo $row["address"]; ?></td>
									<td><?php echo $row["dob"]; ?></td>
									<?php if(mysqli_num_rows($q1_run) > 0){ ?>
									<td><a href="regPDF.php?id=<?php echo $row['id'];?>" style="color:#00ee12;"><i class="fa fa-hand-o-up" style="font-size:36px; color:#00ac12;"></i></a></td>
									<td><a href="<?php echo $row1['fileHslcM']; ?>"><i class="fa fa-hand-o-up" style="font-size:36px;color:#00ac12;"></i></a></td>
									<td><a href="<?php echo $row1['fileHsM']; ?>"><i class="fa fa-hand-o-up" style="font-size:36px; color:#00ac12;"></i></a></td>
									<?php if($row1['fileGM'] != ''){ ?>
									<td><a href="<?php echo $row1['fileGM']; ?>"><i class="fa fa-hand-o-up" style="font-size:36px; color:#00ac12;"></i></a></td>
										
									<?php	}else 
											echo'<td>FILE NOT FOUND</td>'; 
										}else{
											echo'<td>FILE NOT FOUND</td>';
											echo'<td>FILE NOT FOUND</td>';
											echo'<td>FILE NOT FOUND</td>';
											echo'<td>FILE NOT FOUND</td>';
										} ?>
									<td><a href="editStudent.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit editI"></i></a></td>
									<td><a href="delStudent.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash delI"></i></a></td>
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
			} );
		</script>


</html>
