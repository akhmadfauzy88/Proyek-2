<?php
  $login = $this->session->userdata('logged_in');
  $nama = $this->session->userdata('nama');
  $nim = $this->session->userdata('nim');

	$log = $this->session->flashdata('log_');
	$error = $this->session->flashdata('error');
  $error_page = $this->session->flashdata('error_page');

  if($login && $_SESSION['nama'] != "lak"){
		redirect(base_url("Dashboard"));
  }elseif ($login && $_SESSION['nama'] == "lak") {
    redirect(base_url("Admin/Dashboard"));
  }else{

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page | Kelas 4.0</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Login-Page-Assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Login-Page-Assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Login-Page-Assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url(); ?>Assets/Login-Page-Assets/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php echo base_url(); ?>login-process" method="post">
					<span class="login100-form-title">
						Login Form
					</span>

					<?php if($error): ?>
						<div class="alert alert-danger" role="alert">
							<center>
								Login gagal <br> Username / Password salah
							</center>
						</div>
					<?php elseif($log): ?>
						<div class="alert alert-success" role="alert">
							<center>
								Logout sukses
							</center>
						</div>
          <?php elseif($error_page): ?>
            <div class="alert alert-danger" role="alert">
							<center>
								Login untuk mengakses page!
							</center>
						</div>
					<?php endif; ?>

					<div class="wrap-input100 validate-input" data-validate = "Email tidak boleh kosong">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password tidak boleh kosong">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Please Login with your Student / Teacher ID <br>
							<hr>
							Pengajuan penanggung jawab laboratorium dapat dilakukan <a href="<?php echo base_url(); ?>ProcessController/pembimbing">disini</a>
						</span>
					</div>

				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>Assets/Login-Page-Assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>Assets/Login-Page-Assets/js/main.js"></script>

</body>
</html>
