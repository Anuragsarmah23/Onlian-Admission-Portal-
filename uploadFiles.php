<?php
	session_start();
	if(!isset($_SESSION["stdID"])){
		header("location:index.php");
	}
	$con=mysqli_connect('localhost','root','','oap');
	if(!$con)
 			die("CONNECTION NOT FOUND".mysqli_error());
	$id=$_SESSION["stdID"];
	$q="select * from student where id='$id'";
	$q_run=mysqli_query($con,$q);
	$row=mysqli_fetch_assoc($q_run);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>USER|OAP</title>

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
                <a href="main.php" class="simple-text">
                    ADMISSION FORM
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="main.php">
                        <i class="fa fa-edit"></i>
                        <p>EDIT PERSONAL</p>
                    </a>
                </li>
            
				<li class="active">
                    <a href="educationalDetails.php">
                        <i class="fa fa-file-text"></i>
                        <p>COMPLETE FORM FILLUP</p>
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
                   <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">EDUCATIONAL DETAILS</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="uploadParse.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>User ID (disabled)</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $row["id"]; ?>">
                                            </div>
                                        </div>
										<input type="hidden" name="uid" value="<?php echo  $row["id"]; ?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $row["name"]; ?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-md-6">
											<img id="blah" style="display:none;" height="100" width="150" alt="pic" />
										</div>
										<div class="col-md-6">
											<img id="blah2" style="display:none;" height="100" width="150" alt="sign" />
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Upload Your Picture(max 500kb)</label>
												<input type="file" class="form-control" name="pic" onchange="readURL(this);"  accept="image/gif, image/jpeg, image/png" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Upload Your Signature(max 500kb)</label>
												<input type="file" class="form-control" onchange="readURL2(this);" name="sign" accept="image/gif, image/jpeg, image/png" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Upload HSLC Marksheet(max 500kb)</label>
												<input type="file" class="form-control" name="hslcMark" accept="image/gif, image/jpeg, image/png, .doc, .pdf" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Upload HS Marksheet(max 500kb)</label>
												<input type="file" class="form-control" name="hsMark" accept="image/gif, image/jpeg, image/png, .doc, .pdf" required>
											</div>
										</div>
									</div>
									<?php
										if($_SESSION["gD"]!=""){
									?>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Upload Graduation Degree Marksheet(max 500kb)</label>
													<input type="file" class="form-control" name="gMark" accept="image/gif, image/jpeg, image/png, .doc, .pdf" required>
												</div>
											</div>
										</div>
										<?php } ?>
										<button type="submit" class="btn btn-info btn-fill pull-right">SUBMIT</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
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
	<script>
		function readURL(input) {
			$('#blah').css('display','block');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function readURL2(input) {
			$('#blah2').css('display','block');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>

</html>