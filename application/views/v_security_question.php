<body>
	<div style="background-color: #e4e5e6; height: 100vh">
		<div class="mb-4 py-5 rounder-4">
			<div class="container w-50 px-5 text-center">
				<div class="card">
					<div class="card-body">
						<h3 class="card-header"><b> Forgot Password </b></h3>
						<br>
						<h5>Security Question</h5>
						<p>Please answer this security question to continue reset your password</p>
						<form action="<?php echo base_url() ?>auth/new_pass" class="text-start" method="post">
							<div class="mb-3">
								<label for="s" class="form-label"><span>Question: </span>What ?</label>
								<input type="text" class="form-control" placeholder="Answer the question">
							</div>
							<div class="text-center">
								<button class="btn btn-success w-50">Check Answer</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
