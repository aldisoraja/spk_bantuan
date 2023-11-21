<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
        <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app" />
        <meta name="author" content="pixelstrap" />
        <link rel="icon" href="<?php echo base_url() ?>/assets/images/logo.png" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/images/logo.png" type="image/x-icon" />
        <title><?php echo $title ?></title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
		<!-- Font Awesome-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/fontawesome.css" />
		<!-- ico-font-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/icofont.css" />
		<!-- Themify icon-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/themify.css" />
		<!-- Flag icon-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/flag-icon.css" />
		<!-- Feather icon-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/feather-icon.css" />
		<!-- Plugins css start-->
		<!-- Plugins css Ends-->
		<!-- Bootstrap css-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/bootstrap.css" />
		<!-- App css-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/style.css" />
		<link id="color" rel="stylesheet" href="<?php echo base_url() ?>/assets/css/color-1.css" media="screen" />
		<!-- Responsive css-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/responsive.css" />
		 <!-- sweetalert2 -->
		 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/sweetalert2.css">
    </head>
    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
        <!-- error page start //-->
            <section>
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?php echo base_url() ?>/assets/images/login/2.jpg" alt="looginpage" /></div>
	            <div class="col-xl-5 p-0">
	                <div class="login-card">
	                    <form class="theme-form login-form" method="post" action="<?php echo base_url('login') ?>">
	                        <h4>Login</h4>
	                        <h6>Selamat datang kembali! Masuk ke akun Anda.</h6>
	                        <div class="form-group">
	                            <label>Username</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i data-feather="user"></i></span>
	                                <input class="form-control" type="text" name="username" required="username" placeholder="Masukkan Username..." />
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <div class="input-group">
	                                <span class="input-group-text"><i data-feather="lock"></i></span>
	                                <input class="form-control" type="password" name="password" required="password" placeholder="*********" />
	                            </div>
	                        </div>
							<br>
							<div class="form-group">
								<div class="row">
									<div class="col-7">
										<button class="btn btn-light" style="margin-right: -30px"><a href="<?php echo base_url('welcome') ?>"><i class="fa-solid fa-caret-left"></i> Kembali</a></button>
									</div>
									<div class="col-5">
										<button class="btn btn-primary" type="submit"><i class="fa-solid fa-right-to-bracket"></i> Masuk</button>
									</div>
								</div>
							</div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	
    
        <!-- error page end //-->
        <!-- latest jquery-->
        <script src="<?php echo base_url() ?>/assets/js/jquery-3.5.1.min.js"></script>
		<!-- feather icon js-->
		<script src="<?php echo base_url() ?>/assets/js/icons/feather-icon/feather.min.js"></script>
		<script src="<?php echo base_url() ?>/assets/js/icons/feather-icon/feather-icon.js"></script>
		<!-- Sidebar jquery-->
		<script src="<?php echo base_url() ?>/assets/js/config.js"></script>
		<!-- Bootstrap js-->
		<script src="<?php echo base_url() ?>/assets/js/bootstrap/popper.min.js"></script>
		<script src="<?php echo base_url() ?>/assets/js/bootstrap/bootstrap.min.js"></script>
		<!-- Plugins JS start-->
			<!-- Plugins JS Ends-->
		<!-- Theme js-->
		<script src="<?php echo base_url() ?>/assets/js/script.js"></script>
		<!-- Plugin used-->
		<!-- sweetalert2 -->
		<script src="<?php echo base_url() ?>/assets/js/sweet-alert/app.js"></script>
		<script src="<?php echo base_url() ?>/assets/js/sweet-alert/sweetalert.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!-- alert error -->
		<script>
			<?php if($this->session->flashdata('error')) { ?>
				var isi = <?php echo json_encode ($this->session->flashData('error')) ?>;
				Swal.fire({        
					icon: 'error',
					title: 'Oops...',
					text: isi,
				})
			<?php unset($_SESSION['error']); } ?>

			// Alert Belum Login
			<?php if($this->session->flashdata('gagal')) { ?>
				var isi = <?php echo json_encode ($this->session->flashData('gagal')) ?>;
				Swal.fire({        
					icon: 'error',
					title: 'Oops...',
					text: isi,
				})
			<?php unset($_SESSION['gagal']); } ?>

		</script>

    </body>
</html>