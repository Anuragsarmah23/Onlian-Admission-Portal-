<?php
	session_start();
	if(!isset($_SESSION['adminID'])){
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
                    DASHBOARD
                </a>
            </div>

            <ul class="nav">
                <li class="active">
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
			<?php
				$con=mysqli_connect("localhost","root","","oap");
				if(!$con)
					die("error");
				$q="select * from student";
				$q_run=mysqli_query($con,$q);
				$rows=mysqli_num_rows($q_run);
				$q1="select * from course";
				$q1_run=mysqli_query($con,$q1);
				$rows1=mysqli_num_rows($q1_run);
			?>
				<div class="row">
					<div class="col-md-4">
						<div class="card" style="background:#428bca;padding:20px;height:100px;">
							<i style="font-size:48px;color:#fff;float:left;" class="fa fa-users"></i><span style="float:right;font-size:24px;color:#fff;"> TOTAL STUDENTS<br><center><?php echo $rows; ?></center></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card" style="background:#d9534f;padding:20px;height:100px;">
							<i style="font-size:48px;color:#fff;float:left;" class="fa fa-edit"></i><span style="float:right;font-size:20px;color:#fff;">TOTAL COURSES<br><center>6</center></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card" style="background:#5cb85c;padding:20px;height:100px;">
							<i style="font-size:48px;color:#fff;float:left;" class="fa fa-newspaper-o"></i><span style="float:right;font-size:20px;color:#fff;"> STUDENTS APPLIED<br><center><?php echo $rows1; ?></center></span>
						</div>
					</div>
				</div>
                <div class="row">
                        <div class="card">
							<div class="header">
                                <h4 class="title">Statistics</h4>
                                <p class="category">TOTAL</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Current stats
                                    </div>
                                </div>
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script>
		$(document).ready(function(){   
			var users='<?php echo  $rows; ?>';
			var courses='<?php echo  $rows1; ?>';
		var dataSales = {
          labels: ['OAP','STUDENTS','COURSES','STUDENTS APPLIED','OAP'],
          series: [
             [0,users,6,courses,0],
          ]
        };
        
        var optionsSales = {
          lineSmooth: false,
          low: 0,
          high: 8,
          showArea: true,
          height: "245px",
          axisX: {
            showGrid: false,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 3
          }),
          showLine: false,
          showPoint: false,
        };
        
        var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];
    
        Chartist.Line('#chartPreferences', dataSales, optionsSales, responsiveSales);			
		});	
	</script>

</html>
