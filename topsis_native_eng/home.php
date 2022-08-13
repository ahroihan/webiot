<?php
include "connect.php";
if (isset($_POST['charVal'])) {
	$queryJ = mysqli_query($connection, "SELECT amount_weight FROM topsis_eng_criteria WHERE id='".$_POST['charVal']."'");
	$jaX = mysqli_fetch_assoc($queryJ);
	$queryJax = mysqli_query($connection, "SELECT seq FROM seq_1_to_".$jaX['amount_weight']." WHERE seq NOT IN (SELECT value_criteria FROM `topsis_eng_weight` WHERE id_criteria = '".$_POST['charVal']."')");
	if (mysqli_num_rows($queryJax) > 0) {
		$dataJax = array();
		while ($rowJax = mysqli_fetch_assoc($queryJax)) {
			$dataJax[] = $rowJax;
		}
		echo json_encode($dataJax);
	}
	exit(0);
}
if (empty($_SESSION['username'])){
	echo '<script>window.location.href = "./";</script>';
}

if (!empty($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username=="" OR $password==""){  
		echo '<script>alert("Username and Password are empty");window.location.href = "./index.php";</script>';
		exit(0);
	}else{
		$qusername = mysqli_query($connection, "SELECT username, password FROM topsis_eng_user WHERE username = '".$username."'");
		$rowusername = mysqli_fetch_array($qusername);

		if ($rowusername){
			$a = $rowusername['password'];
			$b = md5($password);
			if ($a == $b){
				session_start();
				$_SESSION['username'] = $username;
			}else{
				echo '<script>alert("Username atau Password are wrong");window.location.href = "./index.php";</script>';
			}
		}else{
			echo '<script>alert("Username is not register");window.location.href = "./index.php";</script>';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="id-ID">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<title><?php echo $title;?></title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="./assets/img/logo.jpg">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="./assets/plugins/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="./assets/plugins/font-awesome/css/font-awesome.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="./assets/plugins/datatables/dataTables.bootstrap.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="./assets/plugins/select2/select2.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="./assets/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="./assets/css/skins/_all-skins.css">
	<style type="text/css">
		.pagesX{
			transition: all .1s ease-out;
			opacity: 0;
			height: 0;
			overflow-y: hidden;
		}

		.pagesX.show{
			opacity: 1;
			height: auto;
		}
	</style>
	<script type="text/javascript" src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>
<body class="hold-transition skin-custom sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="./" class="logo" style="position: fixed;">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><img src="./assets/img/logo.jpg" width="30px"/></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg" style="font-size: 16px;">
					<b><?php echo $title;?></b>
				</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<?php
						$dashboard = $data = $criteria = $weight = $process = $analyze = $result = "";
					    $first_uri = $_GET['one'];
						if (($first_uri == "user")) {
					        $activeU = "active";
					    }
						?>
						<li class="<?php echo $activeU;?> dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="./assets/img/profile1.png" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="./assets/img/profile1.png" class="img-circle" alt="User Image">
									<p>
										<?php echo $_SESSION['username'];?>
									</p>
									<span style="color: white;"><i class="fa fa-circle text-success"></i> Online</span>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="./home.php?one=user" class="btn btn-default btn-flat">User</a>
									</div>
									<div class="pull-right">
										<a href="./home.php?one=logout" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar" style="position: fixed;">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<?php
				    if ($first_uri == $project) {
				    	$data = "active";
				    } elseif ($first_uri == "criteria") {
				        $criteria = "active";
				    } elseif ($first_uri == "weight") {
				        $weight = "active";
				    } elseif (($first_uri == "analyze")) {
				        $analyze = "active";
				    } elseif (($first_uri == "result")) {
				        $result = "active";
				    } elseif (($first_uri == "user")) {
				        $dashboard = "";
				    } else {
				        $dashboard = "active";
				    }

				?>
				<ul class="sidebar-menu" style="text-transform: capitalize;">
				    <li class="header">MAIN NAVIGATION</li>
				    <li class="<?php echo $dashboard;?>"><a href="./home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				    <li class="<?php echo $data;?>"><a href="./home.php?one=<?=$project?>"><i class="fa fa-database"></i> <span>Data <?=$project?></span></a></li>
				    <li class="<?php echo $criteria;?>"><a href="./home.php?one=criteria"> <i class="fa fa-table"></i> <span>Criteria</span></a></li>
				    <li class="<?php echo $weight;?>"><a href="./home.php?one=weight"> <i class="fa fa-table"></i> <span>Weight of Criteria</span></a></li>
				    <li class="<?php echo $analyze;?>"><a href="./home.php?one=analyze"><i class="fa fa-bar-chart"></i> <span>Analyze of TOPSIS</span></a></li>
				    <li class="<?php echo $result;?>"><a href="./home.php?one=result"><i class="fa fa-table"></i> <span>Result / Sort of Preference</span></a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<?php 
		if ($_GET['one']) {
			require "content.php";
		} else {
			echo '
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						Dashboard
					</h1>
					<ol class="breadcrumb">
						<li class="active"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					</ol>
				</section>
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="box">
								<div class="box-body">
									<div style="height: 350px;text-align: center;">
										<h1>TOPSIS</h1>         
										<h1>(Technique For Others Reference by Similarity to Ideal Solution)</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			';
		}
		?>

		<footer class="main-footer">
			<strong>Copyright &copy; <?php echo date('Y');?> - <a href="https://webiot.id">WEBIOTID</a> -</strong> All rights reserved.
		</footer>
	</div><!-- ./wrapper -->

	<!-- Bootstrap 3.3.5 -->
	<script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="./assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="./assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

	<!-- Select -->
	<script src="./assets/plugins/select2/select2.min.js"></script>
	<!-- AdminLTE App -->
	<script src="./assets/js/app.js"></script>
	<script type="text/javascript">
		$('#tableA').DataTable({
			"order": [],
			"columnDefs": [{
				"targets": [0,-1],
				"orderable": false,
				"defaultContent": "",/* "width": "70px",*/
			}]
		});
	</script>
</body>    
</html>