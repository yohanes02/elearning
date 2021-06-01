<div class="container py-5" style="min-height: calc(100vh - 70px)">
	<ul class="nav nav-tabs nav-fill nav-pills justify-content-center" id="tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="forum-tab" data-bs-toggle="tab" data-bs-target="#forum" type="button" role="tab" aria-controls="forum" aria-selected="true">Forum</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="tugas-tab" data-bs-toggle="tab" data-bs-target="#tugas" type="button" role="tab" aria-controls="tugas" aria-selected="false">Tugas</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="anggota-tab" data-bs-toggle="tab" data-bs-target="#anggota" type="button" role="tab" aria-controls="anggota" aria-selected="false">Anggota</button>
		</li>
	</ul>
	<div class="tab-content pt-4" id="tab-content">
		<div class="tab-pane fade show active" id="forum" role="tabpanel" aria-labelledby="forum-tab">
			<div class="row">
				<div class="col-lg-8">
					<div class="row h-100">
						<div class="col-md-3">
							<div class="card-counter primary row h-100">
								<div class="col-4 px-0 align-self-center">
									<i class="fas fa-book"></i>
								</div>
								<div class="col-8 px-0 my-0 align-self-center d-grid text-end">
									<span class="float-end h5 my-0"><b>8</b></span>
									<span class="float-end">Materi</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-counter danger row h-100">
								<div class="col-4 px-0 align-self-center">
									<i class="fas fa-clipboard-list"></i>
								</div>
								<div class="col-8 px-0 my-0 align-self-center d-grid text-end">
									<span class="float-end h5 my-0"><b>12</b></span>
									<span class="float-end">Tugas</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-counter success row h-100">
								<div class="col-4 px-0 align-self-center">
									<i class="fas fa-clipboard-check"></i>
								</div>
								<div class="col-8 px-0 my-0 align-self-center d-grid text-end">
									<span class="float-end h5 my-0"><b>80%</b></span>
									<span class="float-end">Tugas Selesai</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card-counter info row h-100">
								<div class="col-4 px-0 align-self-center">
									<i class="fas fa-award"></i>
								</div>
								<div class="col-8 px-0 my-0 align-self-center d-grid text-end">
									<span class="float-end h5 my-0"><b>87</b></span>
									<span class="float-end">Nilai Rata-rata</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header text-center h5">Dosen</div>
						<div class="card-body row">
							<div class="col-lg-3 text-center">
								<img src="http://localhost/remedial-online/assets/teacher.png" alt="" class="rounded-circle" width="50">
							</div>
							<div class="col-lg-9 align-self-center">
								<span class="h5">Lucy Kanti Rahayu</span>
								<br>
								<span>E-Learning</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="data pt-4">
				<?php foreach ((array)$list as $key => $value) { ?>
					<div id="classwork_item_1" class="mt-2 classwork_item" onclick="toDetailTugas(1)">
						<div class="card">
							<div class="row g-0">
								<div class="col-lg-2 align-self-center">
									<div class="text-center">
										<span><i class="fas <?= $value['icon'] ?> fa-3x"></i></span>
									</div>
								</div>
								<div class="col-lg-9">
									<div class="my-1">
										<span><b><?= $value['title'] ?></b></span>
										<p><small><?= $value['creator_name'] ?></small></p>
										<span class="card-text"><small><?= $value['created_date'] ?></small></span>
									</div>
								</div>
								<!-- <div class="col-lg-1 text-center align-self-center">
									<div class="dropdown">
										<a class="btn" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</a>
										<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<li><a class="dropdown-item" href="<?php echo base_url() ?>pengajar/edittugas/1">Edit</a></li>
											<li><a class="dropdown-item" href="#">Delete</a></li>
										</ul>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">...</div>
		<div class="tab-pane fade" id="anggota" role="tabpanel" aria-labelledby="anggota-tab">
			<div class="container">
				<div class="row my-3">
					<div class="col-lg-12">
						<span class="h3">Dosen</span>
						<hr class="mt-0">
						<div class="row">
							<div class="col-lg-1 text-center">
								<img src="http://localhost/remedial-online/assets/teacher.png" alt="" style="width: 50px;">
							</div>
							<div class="col-lg-11 align-self-center" style="font-size: 18px;">
								<span>Lucy Kanti Rahayu</span>
							</div>
						</div>
					</div>
					<!-- <div class="col-lg-1"></div>
						<div class="col-lg-12"></div> -->
				</div>
				<div class="row my-3">
					<div class="col-lg-12">
						<span class="h3">Siswa</span>
						<hr class="mt-0">
						<div class="row">
							<div class="col-lg-1 text-center">
								<img src="http://localhost/remedial-online/assets/teacher.png" alt="" style="width: 50px;">
							</div>
							<div class="col-lg-11 align-self-center" style="font-size: 18px;">
								<span>Yohanes</span>
							</div>
						</div>
					</div>
					<!-- <div class="col-lg-12 row">
							<div class="col-lg-1">
								<img src="" alt="">
							</div>
							<div class="col-lg-12">
								<p>Yohanes</p>
							</div>
						</div> -->
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.card-counter {
		box-shadow: 2px 2px 10px #DADADA;
		margin: 0 2.5px 0 0;
		padding: 20px 10px;
		background-color: #fff;
		height: 100px;
		border-radius: 5px;
		transition: .3s linear all;
	}

	.card-counter:hover {
		box-shadow: 4px 4px 20px #DADADA;
		transition: .3s linear all;
	}

	.card-counter.primary {
		background-color: #007bff;
		color: #FFF;
	}

	.card-counter.danger {
		background-color: #ef5350;
		color: #FFF;
	}

	.card-counter.success {
		background-color: #66bb6a;
		color: #FFF;
	}

	.card-counter.info {
		background-color: #26c6da;
		color: #FFF;
	}

	.card-counter i {
		font-size: 4em;
		opacity: 0.2;
	}

	.card-counter .count-numbers {
		position: absolute;
		right: 35px;
		top: 20px;
		font-size: 32px;
		display: block;
	}

	.card-counter .count-name {
		position: absolute;
		right: 35px;
		top: 65px;
		font-style: italic;
		text-transform: capitalize;
		opacity: 0.5;
		display: block;
		font-size: 18px;
	}
</style>
<script>
	function toDetailTugas(idTugas) {
		location.href = "../../murid/tugasdetail/" + idTugas;
	}

	function toDetailMateri(idMateri) {
		location.href = "../../murid/materidetail/" + idMateri;
	}
</script>