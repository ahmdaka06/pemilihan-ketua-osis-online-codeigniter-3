<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">
	<!-- Skin Blue -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/skin-blue.min.css">
	<!-- Data Tables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap.min.css">
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- REQUIRED JS SCRIPTS -->
	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/js/app.min.js"></script>
	<!-- Data Tables -->
	<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<!-- Main Header -->
	<header class="main-header">

		<!-- Logo -->
		<a href="" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>A</b>LT</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Admin</b>LTE</span>
		</a>

		<!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<!-- User Account Menu -->
					<li class="dropdown user user-menu">
						<!-- Menu Toggle Button -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<!-- The user image in the navbar-->
							<img src="<?= base_url() ?>assets/img/avatar.jpg" class="user-image" alt="User Image">
							<!-- hidden-xs hides the username on small devices so only the image appears. -->
							<span class="hidden-xs"><?= $admin->nama; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- The user image in the menu -->
							<li class="user-header">
								<img src="<?= base_url() ?>assets/img/avatar.jpg" class="img-circle" alt="User Image">
								<p>
									<?= $admin->nama; ?>
									<small><i class="fa fa-circle text-success"></i> Online</small>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="#" data-toggle="control-sidebar" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="<?= base_url('admin/logout') ?>" class="btn btn-default btn-flat">Logout</a>
								</div>
							</li>
						</ul>
					</li>
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">

		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">

			<!-- Sidebar user panel (optional) -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?= base_url() ?>assets/img/avatar.jpg" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>
						<?= $admin->nama; ?>
					</p>
					<!-- Status -->
					<a><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<ul class="sidebar-menu">
				<li class="header">MENU</li>
				<!-- Optionally, you can add icons to the links -->
				<li id="dashboard">
					<a href="<?= base_url() ?>admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
				</li>
				<li id="calon">
					<a href="<?= base_url() ?>calon"><i class="fa fa-users"></i> <span>Calon</span></a>
				</li>
        		<li class="treeview">
        		  <a href="#">
        		    <i class="fa fa-table"></i>
        		    <span>Data Pemilih</span>
        		    <span class="pull-right-container">
        		      <i class="fa fa-angle-left pull-right"></i>
        		    </span>
        		  </a>
        		  <ul class="treeview-menu">
        		    <li><a href="<?= base_url() ?>data_siswa"><i class="fa fa-circle-o"></i> Siswa</a></li>
        		    <li><a href="<?= base_url() ?>data_guru"><i class="fa fa-circle-o"></i> Guru</a></li>
        		  </ul>
        		</li>
			</ul>
			<!-- /.sidebar-menu -->
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">