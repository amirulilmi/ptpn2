<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN SIPUDES</title>

	<!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/core.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/components.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/colors.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js'); ?>"></script>
  <!-- /core JS files -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js'); ?>"></script>

  <style>
	@media only screen and (max-width: 660px) {
  .tess {
   display:none;
  }
}
  </style>

</head>

<body>

	<!-- Main navbar -->
	<!-- <div class="navbar navbar-inverse">
		<h3><marquee><strong>Selamat Datang Di SIPUDES(Sistem Informasi Pusat Data Desa) Desa <?php echo getnamains('desa'); ?> Kecamatan <?php echo getnamains('kecamatan'); ?> Kabupaten <?php echo getnamains('kabupaten'); ?></strong></marquee></h3>
	</div> -->
	<!-- /main navbar -->

	<div style="position:absolute;width:100%;height:100%;box-sizing:border-box;">
		<h1 style="position:absolute;z-index:20;margin-left:60px;margin-top:25px;color:white;font-family:poppins">BENGKEL PUSAT PTPN II </h1>
		<img width="100%" height="100%" style="position:absolute;padding:10px 10px 10px 10px" src="<?php echo base_url('assets/images/login/rectangle.png'); ?>">
		<div class="tess" style="margin-left:40px;margin-top:70px;position:absolute;width:60%">
			<img width="100%" height="400px" style="" src="<?php echo base_url('assets/images/login/maps.png'); ?>">
		</div>
	</div>
	
	<div style="position:absolute;bottom:0px">
		<img style="" height="170px" width="360px" src="<?php echo base_url('assets/images/login/man.png'); ?>">
	</div>

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="<?php echo site_url('Login/signin'); ?>" method="post">
						<div class="panel panel-body login-form " style="margin-right:50px;border-radius:20px;">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">LOGIN PTPN II</h5>
							</div>
							<?php 
							$data=$this->session->flashdata('sukses');
							if($data!=""){ ?>
							<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
							<?php } ?>
							<?php 
							$data2=$this->session->flashdata('error');
							if($data2!=""){ ?>
							<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
							<?php } ?>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>
						</div>
					</form>
					<div class="footer text-muted">
						<!-- &copy; 2016. <a href="http://www.muhajirulfaqih.blogspot.com" target="blank">Ahmad Muhajirul Faqih</a> -->
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
