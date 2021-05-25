<body>
	<div class="container-fluid" style="background-color: #e4e5e6;">
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
		<div class="mb-4 py-5 bg-light rounded-3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 col-lg-6 p-5">
						<div class="text-center">
							<img src="https://i.imgur.com/uNGdWHi.png" class="img-fluid">
						</div>
					</div>
					<div class="col-sm-12 col-lg-6 p-5">
					<div id="div-login">
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
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
$("#login").click()

function seePassword() {
	var inputPass = document.getElementById("password");
	if(inputPass.type === "password") {
		inputPass.type = "text";
	} else {
		inputPass.type = "password";
	}
}
</script>
