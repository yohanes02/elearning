<style>
	#pengumuman.form-control:focus {
		border-color: #ced4da;
		box-shadow: none;
	}
</style>

<div class="container py-5" style="min-height: calc(100vh - 70px)">
	<ul class="nav nav-tabs nav-pills nav-fill justify-content-center" id="tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="classwork-tab" data-bs-toggle="tab" data-bs-target="#classwork" type="button" role="tab" aria-controls="classwork" aria-selected="true">Classwork</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="student-tab" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="false">Student Worksheet</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="grade-tab" data-bs-toggle="tab" data-bs-target="#grade" type="button" role="tab" aria-controls="grade" aria-selected="false">Grades</button>
		</li>
	</ul>
	<div class="tab-content pt-4" id="tab-content">
		<div class="tab-pane fade show active" id="classwork" role="tabpanel" aria-labelledby="classwork-tab">
			<div class="card py-4 px-4 mb-4" style="height: 15rem; border-radius: 30px;">
				<h1><b>KELAS 1</b></h1>
				<p><b>Kode Kelas</b> qeq1ka</p>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div id="create">
							<div class="border rounded">
								<label class="pt-2 px-2" for="" style="font-weight: bold;">Create New</label>
								<div class="row px-4 py-2" s>
									<!-- <button class="btn btn-primary my-1" type="button">
											Create Materi
											<span><i class="fas fa-plus"></i></span>
										</button> -->
									<a href="<?php echo base_url(); ?>pengajar/createmateri" class="btn btn-primary my-1">
										Create Materi
										<span><i class="fas fa-plus"></i></span>
									</a>
									<br>
									<a href="<?php echo base_url(); ?>pengajar/createtugas" class="btn btn-primary my-1" type="button">
										Create Tugas
										<span><i class="fas fa-plus"></i></span>
									</a>
								</div>
							</div>
						</div>
						<div id="filter" class="mt-4">
							<div class="border rounded">
								<label class="pt-2 px-2" for="" style="font-weight: bold;">Filter</label>
								<div class="row px-4 py-2" s>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="" id="semua_cb">
										<label for="semua_cb" class="form-check-label">Semua</label>
									</div>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="" id="tugas_cb">
										<label for="tugas_cb" class="form-check-label">Tugas</label>
									</div>
									<div class="form-check">
										<input type="checkbox" class="form-check-input" value="" id="materi_cb">
										<label for="materi_cb" class="form-check-label">Materi</label>
									</div>
									<button class="btn btn-primary">Filter</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div id="pengumuman" class="input-group shadow-sm">
							<span class="input-group-text px-4 py-3 border-end-0" id="basic-addon2" style="background-color: transparent;"><img src="http://localhost/remedial-online/assets/teacher.png" alt="" width="40"></span>
							<input type="text" class="form-control border-start-0 border-end-0" placeholder="Umumkan sesuatu ke kelas" onclick="useCKEditor()">
							<span class="input-group-text px-4 border-start-0" id="basic-addon2" style="background-color: transparent;"><i class="fas fa-paper-plane"></i></span>
						</div>
						<div id="content_not_ck" class="border" style="display: none;">
							<div class="container p-2">
								<div class="row align-items-center mx-0 py-2">
									<div class="col-1 p-0">
										<div class="card">
											<div class="card-body px-4">
												<img class="img-fluid" src="https://mpng.subpng.com/20180421/fze/kisspng-pdf-computer-icons-adobe-acrobat-encapsulated-post-pdf-5adb3ce756e566.3416932315243174153559.jpg" alt="">
											</div>
										</div>
									</div>
									<div class="col-11 p-0">
										<div class="card">
											<div class="card-body px-4 py-1">
												<p class="card-text mb-1">File.pdf</p>
												<span class="card-text"><b>Document</b></span>
											</div>
										</div>
									</div>
								</div>
								<input type="file" class="form-control m-0" id="file_upload" multiple onchange="showFileSelected()">
							</div>
							<div class="container m-0 p-0">
								<div class="row m-0">
									<div id="buttonCK" class="bg-light p-2">
										<button id=" submit_announce" class="btn bg-success text-white float-end">Kirim</button>
										<button id="cancel_announce" class="btn border-0 float-end" onclick="hideContent()">Cancel</button>
									</div>
								</div>
							</div>
						</div>
						<div id="classwork_item_1" class="mt-2 classwork_item">
							<div class="card">
								<div class="row g-0">
									<div class="col-lg-2 align-self-center">
										<!-- <img class="img-fluid" src="" alt=""> -->
										<div class="text-center">
											<span><i class="fas fa-clipboard-list fa-3x"></i></span>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="my-1">
											<span><b>Tugas: Tugas 1</b></span>
											<p><small>Lucy Kanti</small></p>
											<span class="card-text"><small>08 Mei 2021 Pukul 08:10:25</small></span>
										</div>
									</div>
									<div class="col-lg-1 text-center align-self-center">
										<div class="dropdown">
											<a class="btn" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</a>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a class="dropdown-item" href="<?php echo base_url() ?>pengajar/edittugas/1">Edit</a></li>
												<li><a class="dropdown-item" href="#">Delete</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="classwork_item_2" class="mt-2 classwork_item">
							<div class="card">
								<div class="row g-0">
									<div class="col-lg-2 align-self-center">
										<!-- <img class="img-fluid" src="" alt=""> -->
										<div class="text-center">
											<span><i class="fas fa-book fa-3x"></i></span>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="my-1">
											<span><b>Materi: Materi 1</b></span>
											<p><small>Lucy Kanti</small></p>
											<span class="card-text"><small>08 Mei 2021 Pukul 08:10:25</small></span>
										</div>
									</div>
									<div class="col-lg-1 text-center align-self-center">
										<i class="fas fa-ellipsis-v"></i>
									</div>
								</div>
							</div>
						</div>
						<div id="classwork_item_2" class="mt-2 classwork_item">
							<div class="card">
								<div class="row g-0">
									<div class="col-lg-2 align-self-center">
										<!-- <img class="img-fluid" src="" alt=""> -->
										<div class="text-center">
											<span><i class="fas fa-book fa-3x"></i></span>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="my-1">
											<span><b>Materi: Materi 1</b></span>
											<p><small>Lucy Kanti</small></p>
											<span class="card-text"><small>08 Mei 2021 Pukul 08:10:25</small></span>
										</div>
									</div>
									<div class="col-lg-1 text-center align-self-center">
										<i class="fas fa-ellipsis-v"></i>
									</div>
								</div>
							</div>
						</div>
						<div id="classwork_item_2" class="mt-2 classwork_item">
							<div class="card">
								<div class="row g-0">
									<div class="col-lg-2 align-self-center">
										<!-- <img class="img-fluid" src="" alt=""> -->
										<div class="text-center">
											<span><i class="fas fa-book fa-3x"></i></span>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="my-1">
											<span><b>Materi: Materi 1</b></span>
											<p><small>Lucy Kanti</small></p>
											<span class="card-text"><small>08 Mei 2021 Pukul 08:10:25</small></span>
										</div>
									</div>
									<div class="col-lg-1 text-center align-self-center">
										<i class="fas fa-ellipsis-v"></i>
									</div>
								</div>
							</div>
						</div>
						<div id="classwork_item_2" class="mt-2 classwork_item">
							<div class="card">
								<div class="row g-0">
									<div class="col-lg-2 align-self-center">
										<!-- <img class="img-fluid" src="" alt=""> -->
										<div class="text-center">
											<span><i class="fas fa-book fa-3x"></i></span>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="my-1">
											<span><b>Materi: Materi 1</b></span>
											<p><small>Lucy Kanti</small></p>
											<span class="card-text"><small>08 Mei 2021 Pukul 08:10:25</small></span>
										</div>
									</div>
									<div class="col-lg-1 text-center align-self-center">
										<i class="fas fa-ellipsis-v"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">
			<div class="container">
				<div class="row mt-4">
					<div class="col-lg-3">
						<div id="filter_worksheet">
							<div class="border rounded">
								<label class="pt-2 px-2" for="" style="font-weight: bold;">Filter Worksheet</label>
								<div class="row px-4 py-2" s>
									<div class="mb-3">
										<label for="tugas_list" class="form-label">Tugas</label>
										<select name="tugas_list" id="tugas_list" class="form-select">
											<option selected disabled>Pilih Tugas</option>
											<option value="tugas_1">Tugas 1</option>
											<option value="tugas_2">Tugas 2</option>
											<option value="tugas_3">Tugas 3</option>
										</select>
									</div>
									<!-- <br> -->
									<div class="mb-3">
										<label for="sort_status" class="form-label">Sort</label>
										<select name="sort_status" id="sort_status" class="form-select">
											<option selected disabled>Sort by status</option>
											<option value="">Turned In</option>
											<option value="">Turned In Late</option>
											<option value="">Not Turned In</option>
											<option value="">Graded</option>
										</select>
									</div>
									<div class="mb-3 btn-group">
										<button class="btn btn-success">Run Filter</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-4 mb-3">
								<div class="card">
									<div class="card-body">
										<span>Tugas 1</span>
										<hr class="my-2">
										<span>Yohanes</span>
										<br>
										<b><span>Turned in Late</span></b>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mb-3">
								<div class="card">
									<div class="card-body">
										<span>Tugas 1</span>
										<hr class="my-2">
										<span>Yunus Sugito</span>
										<br>
										<b><span>Graded</span></b>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mb-3">
								<div class="card">
									<div class="card-body">
										<span>Tugas 1</span>
										<hr class="my-2">
										<span>Riski Hariyasa</span>
										<br>
										<b><span>Turned In</span></b>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mb-3">
								<div class="card">
									<div class="card-body">
										<span>Tugas 1</span>
										<hr class="my-2">
										<span>Vina Yanuar</span>
										<br>
										<b><span>Not Turned In</span></b>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mb-3">
								<div class="card">
									<div class="card-body">
										<span>Tugas 1</span>
										<hr class="my-2">
										<span>Fitri Amalia</span>
										<br>
										<b><span>Turned In</span></b>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="grade" role="tabpanel" aria-labelledby="grade-tab">
			<div class="container-fluid">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td></td>
							<td class="text-center">
								<span>Tugas 1</span>
								<br>
								<span>28 Mei</span>
							</td>
							<td class="text-center">
								<span>Tugas 2</span>
								<br>
								<span>28 Mei</span>
							</td>
							<td class="text-center">
								<span>Tugas 3</span>
								<br>
								<span>28 Mei</span>
							</td>
							<td class="text-center">
								<span>Tugas 4</span>
								<br>
								<span>28 Mei</span>
							</td>
							<td class="text-center">
								<span>Tugas 5</span>
								<br>
								<span>28 Mei</span>
							</td>
							<td class="text-center">
								<span>Tugas 6</span>
								<br>
								<span>28 Mei</span>
							</td>
							<td class="text-center">
								<span>Tugas 7</span>
								<br>
								<span>28 Mei</span>
							</td>
							<td class="text-center">
								<span>Tugas 8</span>
								<br>
								<span>28 Mei</span>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width="250px">Yohanes</td>
							<td class="text-center">100</td>
							<td class="text-center">100</td>
							<td class="text-center">100</td>
							<td class="text-center">100</td>
							<td class="text-center">100</td>
							<td class="text-center">100</td>
							<td class="text-center">100</td>
							<td class="text-center">100</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?php echo base_url('assets/lib/jquery-3.6.0.min.js'); ?>" charset="utf-8"></script>
<script>
	$("#submit_announce").click(function() {
		console.log($("#file_upload"));
	});

	function useCKEditor() {
		// $("#pengumuman").ckeditor();
		CKEDITOR.replace("pengumuman");
		// var buttonBottom = CKEDITOR.dom.element.createFromHtml("<p>TEST</p>");
		// console.log(CKEDITOR.instances.pengumuman);
		// console.log(CKEDITOR.instances.pengumuman.name);
		// console.log(CKEDITOR.instances.pengumuman.document.$);
		// CKEDITOR.instances.pengumuman.insertHtml('<p>TEST</p>');
		// $("#cke_pengumuman").append("<p>TEST</p>");
		$("#content_not_ck").show();
	}

	function showFileSelected() {
		$("#file_selected").empty();
		// if (document.getElementById("file_upload").files.length != 0) {
		// 	for (let i = 0; i < document.getElementById("file_upload").files.length; i++) {
		// 		var p = document.createElement('p');
		// 		p.textContent = document.getElementById("file_upload").files[i].name;
		// 		var div = document.getElementById("file_selected");
		// 		div.append(p);
		// 	}
		// }
	}

	function hideContent() {
		$("#content_not_ck").hide();
		// CKEDITOR.instances.pengumuman.reset();
		// CKEDITOR.instances.pengumuman.setData("");
		CKEDITOR.instances.pengumuman.destroy(true);
		// $("#cke_pengumuman").remove();
		$("#pengumuman").show();
		$("#pengumuman").attr("style", "");
	}
</script>