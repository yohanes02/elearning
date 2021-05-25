<body class="sticky-footer" id="page-top" style="padding-top: 70px;">
	<?php $this->load->view('pengajar/v_nav') ?>
	<div class="container-fluid" style="min-height: calc(100vh - 70px)">
		<div id="nav_materi">
			<div class="row border-bottom border-5">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-1 py-3 align-self-center text-center">
							<a href="<?php echo base_url() ?>pengajar/kelas/1" class="btn">
								<span class="fas fa-times"></span>
							</a>
						</div>
						<div class="col-lg-11 py-3 align-self-center">
							<span><b>Edit Tugas</b></span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div id="edit" class="row">
						<div class="col-lg-6 py-3">
							<a href="" class="col-lg-12 btn btn-warning float-end">Cancel</a>
						</div>
						<div class="col-lg-6 py-3">
							<a href="" class="col-lg-12 btn btn-success float-end">Save</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 p-3 border-end border-5">
				<div class="row">
					<i class="fas fa-file-alt fa-2x col-lg-1 align-self-center text-center"></i>
					<div class="col-lg-11">
						<div class="form-floating">
							<input id="title_materi" type="text" class="form-control" value="Tugas 1" placeholder="test">
							<label for="title_materi">Judul</label>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<i class="fas fa-align-justify fa-2x col-lg-1 align-self-center text-center"></i>
					<div class="col-lg-11">
						<div class="form-floating">
							<!-- <input id="description_materi" type="text" class="form-control" placeholder="test"> -->
							<textarea id="description_materi" class="form-control" placeholder="test" style="height: 200px;">Tugas 1 Deskripsi</textarea>
							<label for="description_materi">Deskripsi</label>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="offset-lg-1 col-lg-11 container">
						<div class="row align-items-center mx-0" style="display: none;">
							<div class="col-lg-1 p-0">
								<div class="card">
									<div class="card-body px-4">
										<img class="img-fluid" src="https://mpng.subpng.com/20180421/fze/kisspng-pdf-computer-icons-adobe-acrobat-encapsulated-post-pdf-5adb3ce756e566.3416932315243174153559.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-lg-11 p-0">
								<div class="card">
									<div class="card-body px-4 py-1">
										<p class="card-text mb-1">File.pdf</p>
										<span class="card-text"><b>Document</b></span>
									</div>
								</div>
							</div>
						</div>
						<label for="">Pilih file untuk tugas (Optional)</label>
						<input type="file" class="form-control mt-2" id="file_upload" multiple onchange="showFileSelected()">
					</div>
				</div>
			</div>
			<div class="col-lg-4 p-3">
				<div class="row mb-5">
					<div class="col-lg-12">
						<label class="form-label">Tipe Tugas</label>
						<select name="tipe_tugas" id="tipe_tugas" class="form-select">
							<option disabled>Pilih Tipe Tugas</option>
							<option selected value="tugas">Tugas</option>
							<option value="quiz">Quiz</option>
							<option value="uts">UTS</option>
							<option value="uas">UAS</option>
						</select>
					</div>
				</div>
				<div class="row">
					<label class="form-label">Tenggat Pengumpulan</label>
					<div class="col-lg-8">
						<div class="form-floating">
							<input id="due_date" type="text" class="form-control" value="10 Mei 2021" placeholder="10 Mei 2021">
							<label for="due_date">Tanggal</label>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-floating">
							<input id="due_time" type="text" class="form-control" value="12:00" placeholder="00:00">
							<label for="due_time">Waktu</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$("#due_date").datepicker({
		dateFormat: 'dd MM yy'
	});
	$("#due_time").timepicker({
		timeFormat: 'HH:mm:ss',
		minTime: '00:15:00', // 11:45:00 AM,
		maxHour: 23,
		maxMinutes: 45,
		// startTime: new Date(0, 0, 0, 15, 0, 0), // 3:00:00 PM - noon
		interval: 15
	});
</script>
