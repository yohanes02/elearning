<nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<!-- <a href="" class="nav-link">
			<i class="fa fa-fw fa-bars text-white"></i>
		</a> -->
		<div class="navbar-brand">
			<a class="text-white" href="#" style="text-decoration: none;"><b>Online Learning</b></a>
			<h6><?php echo $this->session->userdata('name'); ?></h6>
		</div>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<!-- <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Dropdown
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li> -->
			</ul>
			<div class="d-flex">
				<div class="nav-link align-self-center">
					<button class="btn text-primary" data-bs-toggle="modal" data-bs-target="#create_class" style="box-shadow: none;">
						<i class="fa fa-plus-circle fa-2x"></i>
					</button>
				</div>
				<a href="<?php echo base_url() ?>pengajar/change_profile" class="nav-link align-self-center border-start border-4" style="text-decoration: none;">
					<div class="text-white">
						<i class="fas fa-user-edit text-white align-self-center me-2"></i>
						<span class="align-self-center">
							Change Profile
						</span>
					</div>
				</a>
				<a href="" class="nav-link align-self-center border-start border-4" style="text-decoration: none;">
					<div class="text-white">
						<i class="fas fa-sign-out-alt text-white align-self-center me-2"></i>
						<span class="align-self-center">Logout</span>
					</div>
				</a>
			</div>
		</div>
	</div>
</nav>
<div id="create_class" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="create_class" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title h5"><b>Create New Class</b></div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="class_name" class="mb-3">
					<label for="" class="form-label">Class Name</label>
					<input type="text" class="form-control" placeholder="Name">
				</div>
				<div id="class_desc" class="mb-3">
					<label for="" class="form-label">Class Description</label>
					<textarea class="form-control"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">Create</button>
			</div>
		</div>
	</div>
</div>

<div id="join_class" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="join_class" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title h5"><b>Join Class</b></div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="class_name">
					<label for="" class="form-label">Class Code</label>
					<input type="text" class="form-control" placeholder="Name">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">Join</button>
			</div>
		</div>
	</div>
</div>
<!-- <div id="create_class" class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div> -->
