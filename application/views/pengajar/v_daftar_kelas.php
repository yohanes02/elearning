<body class="sticky-footer" id="page-top" style="padding-top: 70px;">
	<?php $this->load->view('pengajar/v_nav') ?>

	<div class="container py-5" style="min-height: calc(100vh - 70px)">
		<div class="row align-content-center">
			<div class="col-lg-3 my-3" onclick="classDetail('1')">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">E-Learning</h5>
						<p class="card-text">Deskripsi Kelas</p>
					</div>
					<div class="card-footer">Lucy Kanti Rahayu</div>
				</div>
			</div>
			<div class="col-lg-3 my-3">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">RKSI</h5>
						<p class="card-text"></p>
					</div>
					<div class="card-footer">Eka Yuni Astuti</div>
				</div>
			</div>
			<div class="col-lg-3 my-3">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">Nama Kelas</h5>
						<p class="card-text">Deskripsi Kelas</p>
					</div>
					<div class="card-footer">Nama Pengajar</div>
				</div>
			</div>
			<div class="col-lg-3 my-3">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">Nama Kelas</h5>
						<p class="card-text">Deskripsi Kelas</p>
					</div>
					<div class="card-footer">Nama Pengajar</div>
				</div>
			</div>
			<div class="col-lg-3 my-3">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">Nama Kelas</h5>
						<p class="card-text">Deskripsi Kelas</p>
					</div>
					<div class="card-footer">Nama Pengajar</div>
				</div>
			</div>
			<div class="col-lg-3 my-3">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">Nama Kelas</h5>
						<p class="card-text">Deskripsi Kelas</p>
					</div>
					<div class="card-footer">Nama Pengajar</div>
				</div>
			</div>
			<div class="col-lg-3 my-3">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">Nama Kelas</h5>
						<p class="card-text">Deskripsi Kelas</p>
					</div>
					<div class="card-footer">Nama Pengajar</div>
				</div>
			</div>
			<div class="col-lg-3 my-3">
				<div class="card border border-dark text-center">
					<div class="card-body">
						<h5 class="card-title">Nama Kelas</h5>
						<p class="card-text">Deskripsi Kelas</p>
					</div>
					<div class="card-footer">Nama Pengajar</div>
				</div>
			</div>
		</div>
	</div>

</body>
<script>
	function classDetail(i) {
		location.href = "pengajar/kelas/" + i;
	}
</script>
