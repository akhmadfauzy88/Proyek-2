<?php $log = $this->session->flashdata('log_pesan'); ?>

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Contact-Assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Contact-Assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Contact-Assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Contact-Assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Contact-Assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assets/Contact-Assets/css/main.css">
<!--===============================================================================================-->

<div class="css-file">
  <?php
    if (isset($css)) {
      echo "<link rel='stylesheet' href='$css' crossorigin='anonymous' />";
    }
  ?>
</div>

<div class="container-fluid" style="margin-top: 15px;">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="Heading">
				CONTACT US
			</div>
			<div class="Con-body">
				<div class="contact1">
					<div class="container-contact1">
						<div class="contact1-pic js-tilt" data-tilt>
							<img src="<?php echo base_url(); ?>Assets/Contact-Assets/images/img-01.png" alt="IMG">
						</div>

						<form class="contact1-form validate-form" action="<?php echo base_url() ?>pesan" method="post" onsubmit="return validasi()">
							<span class="contact1-form-title">
								Get in touch
							</span>

							<?php if (isset($log)): ?>
								<div class="alert alert-success" role="alert">
									<center>
										Pesan terkirim.
									</center>
								</div>
							<?php endif; ?>

							<div class="alert alert-danger" role="alert" id="error_nama" style="display:none">
								<center>
									Nama tidak boleh mengandung angka dan karakter special.
								</center>
							</div>

							<div class="alert alert-danger" role="alert" id="error_email" style="display:none">
								<center>
									Harap isi email dengan benar.
								</center>
							</div>

							<div class="alert alert-danger" role="alert" id="error_pesan" style="display:none">
								<center>
									Pesan minimal 5 karakter dan maksimal 200 karakter.
								</center>
							</div>

							<div class="wrap-input1 validate-input" data-validate = "Name is required">
								<input class="input1" type="text" name="nama" placeholder="Name" id="nama" value="<?php echo $_SESSION['nama']; ?>">
								<span class="shadow-input1"></span>
							</div>

							<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input1" type="text" name="email" placeholder="Email" id="email" value="<?php echo $_SESSION['email']; ?>">
								<span class="shadow-input1"></span>
							</div>

							<div class="wrap-input1 validate-input" data-validate = "Subject is required">
								<select class="input1" name="subject">
									<?php foreach ($kelas as $val): ?>
										<?php if ($val->lab_name != "-"): ?>
				              <option value="<?php echo $val->lab_name; ?>"><?php echo $val->nama." - ".$val->lab_name; ?></option>
				            <?php endif; ?>
									<?php endforeach; ?>
								</select>
								<span class="shadow-input1"></span>
							</div>

							<div class="wrap-input1 validate-input" data-validate = "Message is required">
								<textarea class="input1" name="pesan" placeholder="Message" id="pesan" required></textarea>
								<span class="shadow-input1"></span>
							</div>

							<div class="container-contact1-form-btn">
								<input class="contact1-form-btn" type="submit" value="Send Email" name="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="jsc">
	<script type="text/javascript">
		function validasi(){

			var err_nama = document.getElementById('error_nama');
			var err_email = document.getElementById('error_email');
			var err_pesan = document.getElementById('error_pesan');

			var nama = document.getElementById('nama').value;
			var email = document.getElementById('email').value;
			var pesan = document.getElementById('pesan').value;

			var reg_nama = /^[a-zA-Z\s]+$/;
			var reg_email = /[a-zA-Z0-9\.\_]+\@+[a-zA-Z]+\.+[a-zA-Z]/;

			if(!(nama.match(reg_nama))){
				err_nama.style.display = "block";
				return false;
			}else {
				err_nama.style.display = "none";
			}

			if(!(reg_email.test(email))){
				err_email.style.display = "block";
				return false;
			}else {
				err_email.style.display = "none";
			}

			if (pesan.length<=5) {
				err_pesan.style.display = "block";
				return false;
			}else{
				err_pesan.style.display = "none";
			}

		}
	</script>
</div>
