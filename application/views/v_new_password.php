<body>
	<div style="background-color: #e4e5e6; height: 100vh">
		<div class="mb-4 py-5 rounder-4">
			<div class="container w-50 px-5 text-center">
				<div class="card">
					<div class="card-body">
						<h3 class="card-header"><b> New Password </b></h3>
						<br>
						<!-- <h5>Security Question</h5> -->
						<p>Create new password for your account</p>
						<form action="<?php echo base_url() ?>auth" class="text-start" method="post">
							<div class="mb-3">
								<label for="s" class="form-label">New Password</label>
								<div class="input-group">
									<input id="new_pass" type="password" class="form-control" placeholder="Password">
									<span class="input-group-text border-start-0" id="basic-addon1" onclick="seePassword()"><i class="fa fa-eye"></i></span>
								</div>
							</div>
							<div class="mb-3">
								<label for="s" class="form-label">Retype New Password</label>
								<div class="input-group">
									<input id="retype_pass" type="password" class="form-control" placeholder="Password">
									<span class="input-group-text border-start-0" id="basic-addon1" onclick="seePassword2()"><i class="fa fa-eye"></i></span>
								</div>
							</div>
							<div class="text-center">
								<button class="btn btn-success w-50">Change Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	function seePassword() {
		var inputPass = document.getElementById("new_pass");
		if (inputPass.type === "password") {
			inputPass.type = "text";
		} else {
			inputPass.type = "password";
		}
	}

	function seePassword2() {
		var inputPass = document.getElementById("retype_pass");
		if (inputPass.type === "password") {
			inputPass.type = "text";
		} else {
			inputPass.type = "password";
		}
	}
</script>
