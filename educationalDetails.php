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
                                <form method="post" action="educationalParse.php">
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
									<h5>SELECT COURSE TO APPLY</h5>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>COURSE</label>
                                                <select name="courseAd" id="courseAd" class="form-control" required>
													<option value="">Select Desired Course</option>
													<option value="ba">BA</option>
													<option value="bca">BCA</option>
													<option value="bsc">BSC</option>
													<option value="ma">MA</option>
													<option value="mca">MCA</option>
													<option value="msc">MSC</option>
												</select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label id="majorL">MAJOR</label>
                                                <select name="major" id="major" class="form-control">
													<option value="">Select Major</option>
												</select>
											</div>
                                        </div>
                                    </div>
									<h5>HSLC DETAILS</h5>
                                    <div class="row">
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>BOARD</label>
                                                <input type="text" class="form-control" placeholder="HSLC BOARD" name="hslcB" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>INSTITUTE</label>
                                                <input type="text" class="form-control" placeholder="INSTITUTE NAME" name="hslcI"  required>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>YEAR OF PASSING</label>
                                                <input type="number" class="form-control" placeholder="YEAR OF PASSING" name="hslcY" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>PERCENTAGE</label>
                                                <input type="number" min="1" max="100" step=".01" class="form-control" placeholder="PERCENTAGE" name="hslcP"  required>
                                            </div>
                                        </div>
                                    </div>
									<h5>HS DETAILS</h5>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>STREAM</label>
												<select name="hsS" class="form-control" required>
													<option value="">Select Your Stream</option>
													<option value="science">Science</option>
													<option value="commerce">Commerce</option>
													<option value="arts">Arts</option>
												</select>
											</div>
										</div>
									</div>
									
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>BOARD</label>
                                                <input type="text" class="form-control" placeholder="HS BOARD" name="hsB" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>INSTITUTE</label>
                                                <input type="text" class="form-control" placeholder="INSTITUTE NAME" name="hsI" required>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>YEAR OF PASSING</label>
                                                <input type="number" class="form-control" placeholder="YEAR OF PASSING" name="hsY" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>PERCENTAGE</label>
                                                <input type="number" min="1" max="100" step=".01" class="form-control" placeholder="PERCENTAGE" name="hsP" required>
                                            </div>
                                        </div>
                                        
                                    </div>
									<h5 id="gH">GRADUATION DETAILS</h5>
									<div class="row" id="gDiv1">
										<div class="col-md-6">
											<div class="form-group">
												<label>COURSE</label>
												<select name="gD" id="gD" class="form-control">
													<option value="">Select Your Course</option>
													<option value="ba">BA</option>
													<option value="bca">BCA</option>
													<option value="bsc">BSC</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label id="gML">MAJOR</label>
												<select name="gM" id="gM" class="form-control">
													<option value="">Select Your MAJOR</option>
												</select>
											</div>
										</div>
									</div>
									 <div class="row" id="gDiv2">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>UNIVERSITY</label>
                                                <input type="text" id="gU" class="form-control" placeholder="UNIVERSITY NAME" name="gU">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>INSTITUTE</label>
                                                <input type="text" id="gI" class="form-control" placeholder="INSTITUTE NAME" name="gI">
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                <label>YEAR OF PASSING</label>
                                                <input type="number" id="gY" class="form-control" placeholder="YEAR OF PASSING" name="gY">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>PERCENTAGE</label>
                                                <input type="number" min="1" max="100" step=".01" id="gP" class="form-control" placeholder="PERCENTAGE" name="gP">
                                            </div>
                                        </div>
                                        
                                    </div>
										<button type="submit" class="btn btn-info btn-fill pull-right">SAVE & NEXT</button>
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
		$(window).on("load",function(){
			$('#gH').css('display','none');
			$('#gDiv1').css('display','none');
			$('#gDiv2').css('display','none');
			$('#gD').attr('required',false);
			$('#gU').attr('required',false);
			$('#gI').attr('required',false);
			$('#gY').attr('required',false);
			$('#gP').attr('required',false);
		});
		$('#courseAd').on('change',function(){
			if( ($(this).val()=='ba') || ($(this).val()=='ma') ){
				$('#major').css('display','block');
				$('#majorL').css('display','block');
				$('#major').attr('required',true);
				$('#major').empty();
				$('#major').append('<option value="">Select Major</option>');
				$('#major').append('<option value="arabic">ARABIC</option>');
				$('#major').append('<option value="assamese">ASSAMESE</option>');
				$('#major').append('<option value="bengali">BENGALI</option>');
				$('#major').append('<option value="bodo">BODO</option>');
				$('#major').append('<option value="economics">ECONOMICS</option>');
				$('#major').append('<option value="education">EDUCATION</option>');
				$('#major').append('<option value="english">ENGLISH</option>');
				$('#major').append('<option value="geography">GEOGRAPHY</option>');
				$('#major').append('<option value="hindi">HINDI</option>');
				$('#major').append('<option value="history">HISTORY</option>');
				$('#major').append('<option value="persian">PERSIAN</option>');
				$('#major').append('<option value="philosophy">PHILOSOPHY</option>');
				$('#major').append('<option value="political science">POLITICAL SCIENCE</option>');
				$('#major').append('<option value="sanskrit">SANSKRIT</option>');
			}else if( ($(this).val()=='bsc') || ($(this).val()=='msc') ){
				$('#major').css('display','block');
				$('#majorL').css('display','block');
				$('#major').attr('required',true);
				$('#major').empty();
				$('#major').append('<option value="">Select Major</option>');
				$('#major').append('<option value="anthropology">ANTHROPOLOGY</option>');	
				$('#major').append('<option value="botany">BOTANY</option>');
				$('#major').append('<option value="chemistry">CHEMISTRY</option>');
				$('#major').append('<option value="csit">COMPUTER SCIENCE AND IT</option>');
				$('#major').append('<option value="economics">ECONOMICS</option>');
				$('#major').append('<option value="geography">GEOGRAPHY</option>');
				$('#major').append('<option value="geology">GEOLOGY</option>');
				$('#major').append('<option value="mathematics">MATHEMATICS</option>');
				$('#major').append('<option value="physics">PHYSICS</option>');
				$('#major').append('<option value="statistics">STATISTICS</option>');
				$('#major').append('<option value="zoology">ZOOLOGY</option>');
			}else{
				$('#major').css('display','none');
				$('#majorL').css('display','none');
				$('#major').attr('required',false);
			}
			if( ($(this).val()=='ma') || ($(this).val()=='mca') || ($(this).val()=='msc') ){
				$('#gH').css('display','block');
				$('#gDiv1').css('display','block');
				$('#gDiv2').css('display','block');
				$('#gD').attr('required',true);
				$('#gU').attr('required',true);
				$('#gI').attr('required',true);
				$('#gY').attr('required',true);
				$('#gP').attr('required',true);
			}else{
				$('#gH').css('display','none');
				$('#gDiv1').css('display','none');
				$('#gDiv2').css('display','none');
				$('#gD').attr('required',false);
				$('#gU').attr('required',false);
				$('#gI').attr('required',false);
				$('#gY').attr('required',false);
				$('#gP').attr('required',false);
			}
		});
		$('#gD').on('change',function(){
			if($(this).val()=='ba'){
				$('#gM').css('display','block');
				$('#gML').css('display','block');
				$('#gM').attr('required',true);
				$('#gM').empty();
				$('#gM').append('<option value="">Select Major</option>');
				$('#gM').append('<option value="arabic">ARABIC</option>');
				$('#gM').append('<option value="assamese">ASSAMESE</option>');
				$('#gM').append('<option value="bengali">BENGALI</option>');
				$('#gM').append('<option value="bodo">BODO</option>');
				$('#gM').append('<option value="economics">ECONOMICS</option>');
				$('#gM').append('<option value="education">EDUCATION</option>');
				$('#gM').append('<option value="english">ENGLISH</option>');
				$('#gM').append('<option value="geography">GEOGRAPHY</option>');
				$('#gM').append('<option value="hindi">HINDI</option>');
				$('#gM').append('<option value="history">HISTORY</option>');
				$('#gM').append('<option value="persian">PERSIAN</option>');
				$('#gM').append('<option value="philosophy">PHILOSOPHY</option>');
				$('#gM').append('<option value="political science">POLITICAL SCIENCE</option>');
				$('#gM').append('<option value="sanskrit">SANSKRIT</option>');
			}else if($(this).val()=='bsc'){
				$('#gM').css('display','block');
				$('#gML').css('display','block');
				$('#gM').attr('required',true);
				$('#gM').empty();
				$('#gM').append('<option value="">Select Major</option>');
				$('#gM').append('<option value="anthropology">ANTHROPOLOGY</option>');	
				$('#gM').append('<option value="botany">BOTANY</option>');
				$('#gM').append('<option value="chemistry">CHEMISTRY</option>');
				$('#gM').append('<option value="csit">COMPUTER SCIENCE AND IT</option>');
				$('#gM').append('<option value="economics">ECONOMICS</option>');
				$('#gM').append('<option value="geography">GEOGRAPHY</option>');
				$('#gM').append('<option value="geology">GEOLOGY</option>');
				$('#gM').append('<option value="mathematics">MATHEMATICS</option>');
				$('#gM').append('<option value="physics">PHYSICS</option>');
				$('#gM').append('<option value="statistics">STATISTICS</option>');
				$('#gM').append('<option value="zoology">ZOOLOGY</option>');
			}else{
				$('#gM').css('display','none');
				$('#gML').css('display','none');
				$('#gM').attr('required',false);
			}
		});
	</script>

</html>