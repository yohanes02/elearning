<body>
	<div style="background-color: #e4e5e6; height: 100vh">
		<!-- <div class="card border border-dark" style="height: 80vh; margin: 10vh;">
			<div class="row h-100">
				<div class="col-md col-sm-12 align-self-center">
					<div class="text-center">
						<img src="https://i.imgur.com/uNGdWHi.png" class="img-fluid">
					</div>
				</div>

				<div class="col-md col-sm-12 align-self-center border-start">
					<div id="div-login" class="px-5 py-5">
						<h2>Login</h2>
						<p>Sign in to your account</p>
						<form role="form" action="<?php echo base_url(); ?>auth/cekUser" method="POST">
							<label for="basic-url" class="form-label">Akun</label>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle"></i></span>
								<input type="text" class="form-control" id="username" placeholder="Akun pengguna">
							</div>

							<label for="basic-url" class="form-label">Kata Sandi</label>
							<div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control border-end-0" id="password" placeholder="Masukkan kata sandi">
								<span class="input-group-text border-start-0" id="basic-addon1" onclick="seePassword()"><i class="fa fa-eye"></i></span>
							</div>
							<small>
								<a href="">Forgot Password ?</a>
							</small>
							<div class="row">
								<div class="d-grid gap-2 col-3">
									<button class="btn btn-primary" name="login" id="login">Login</button>
								</div>
							</div>
						</form>
					</div>
					<div class="mx-5 mt-4">
						<p><b>Don't have an account? <a href="auth/register">Register</a></b></p>
					</div>
				</div>
			</div>
		</div> -->
		<div class="mb-4 py-5 rounded-3 h-100">
			<div class="container-fluid h-100 px-5">
				<div class="row h-100 bg-light rounded">
					<!-- <div class="col-12 text-center align-self-center">
						<span class="h3">Online Learning</span>
					</div> -->
					<div class="col-sm-12 col-lg-6 px-5 align-self-center">
						<div class="text-center">
							<img src="https://i.imgur.com/uNGdWHi.png" class="img-fluid">
						</div>
					</div>
					<div class="col-sm-12 col-lg-6 px-5 align-self-center">
						<div id="div_login">
							<h2>Login</h2>
							<p>Sign in to your account</p>
							<form role="form" action="<?php echo base_url(); ?>auth/cekUser" method="POST">
								<label for="basic-url" class="form-label">Akun</label>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle"></i></span>
									<input type="text" class="form-control" id="username" placeholder="Akun pengguna">
								</div>

								<label for="basic-url" class="form-label">Kata Sandi</label>
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
									<input type="password" class="form-control border-end-0" id="password" placeholder="Masukkan kata sandi">
									<span class="input-group-text border-start-0" id="basic-addon1" onclick="seePassword()"><i class="fa fa-eye"></i></span>
								</div>
								<small>
									<a href="<?php echo base_url() ?>auth/forgot_pass">Forgot Password ?</a>
								</small>
								<div class="row">
									<div class="d-grid gap-2 col-3">
										<button class="btn btn-primary" name="login" id="login">Login</button>
									</div>
								</div>
								<!-- <br> -->
							</form>
							<span> Don't have an account ? </span><button id="register" class="btn btn-link">Register here</button>
						</div>
						<div id="div_register" style="display: none;">
							<h2>Register</h2>
							<p>Create new account</p>
							<form action="" method="post">
								<div class="mb-3">
									<h6><b>Personal Information</b></h6>
									<div class="row mb-3">
										<div class="col">
											<div class="form-floating">
												<input type="text" class="form-control" placeholder="Nama">
												<label for="" class="form-label">Nama</label>
											</div>
										</div>
										<div class="col">
											<div class="form-floating">
												<input type="email" class="form-control" placeholder="Email">
												<label for="" class="form-label">Email</label>
											</div>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col">
											<div class="form-floating">
												<input type="text" class="form-control" placeholder="Nomor Handphone">
												<label for="" class="form-label">No. Handphone</label>
											</div>
										</div>
										<div class="col">
											<div class="form-floating">
												<input type="text" class="form-control" placeholder="Tanggal Lahir">
												<label for="" class="form-label">Tanggal Lahir</label>
											</div>
										</div>
										<div class="col">
											<div class="form-floating">
												<select name="jekel" id="jekel" class="form-select">
													<option selected disabled>Pilih Jenis Kelamin</option>
													<option value="L">Laki-laki</option>
													<option value="P">Perempuan</option>
												</select>
												<label for="" class="form-label">Jenis Kelamin</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="form-floating">
												<textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
												<label for="" class="form-label">Alamat</label>
											</div>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<h6><b>Account</b></h6>
									<div class="row mb-3">
										<div class="col">
											<div class="form-floating">
												<input type="text" class="form-control" placeholder="Username">
												<label for="" class="form-label">Username</label>
											</div>
										</div>
										<div class="col">
											<div class="form-floating">
												<input type="password" class="form-control" placeholder="Password">
												<label for="" class="form-label">Password</label>
											</div>
										</div>
										<div class="col">
											<div class="form-floating">
												<input type="password" class="form-control" placeholder="Retype Password">
												<label for="" class="form-label">Retype Password</label>
											</div>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<h6><b>Profile Picture</b></h6>
									<input type="file" class="form-control" name="profile_pict" id="profile_pict">
								</div>
								<div class="mb-3">
									<div class="row text-center">
										<div class="col">
											<button id="to_login" class="btn btn-light border border-dark w-100">Back to Login</button>
										</div>
										<div class="col">
											<button id="create_account" class="btn btn-success w-100">Create account</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	// $("#login").click()

	$("#register").click(function() {
		$("#div_login").hide();
		$("#div_register").show();
	});

	$("#to_login").click(function() {
		$("#div_login").show();
		$("#div_register").hide();
	});

	$("#create_account").click(function() {
		$("#div_login").show();
		$("#div_register").hide();
	});

	function seePassword() {
		var inputPass = document.getElementById("password");
		if (inputPass.type === "password") {
			inputPass.type = "text";
		} else {
			inputPass.type = "password";
		}
	}
</script>
