<form method="POST" action="<?= site_url('pengajar/submitCreateMateri') ?>" enctype="multipart/form-data">
	<div class="container-fluid" style="min-height: calc(100vh - 70px)">
		<div id="nav_materi">
			<div class="row border-bottom border-5">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-1 py-3 align-self-center text-center">
							<a onclick="window.history.back()" class="btn">
								<span class="fas fa-times"></span>
							</a>
						</div>
						<div class="col-lg-11 py-3 align-self-center">
							<span><b>Create Materi</b></span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div id="new" class="row">
						<div class="col-lg-12 py-3">
							<button type="submit" class="btn btn-primary col-lg-6 float-end" id="btn_create">Create</button>
							<input type="hidden" name="class_id" value="<?= $class_id ?>">
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
							<input id="title_materi" name="title_materi" type="text" class="form-control" value="" maxlength="255" placeholder="test" required>
							<label for="title_materi">Judul</label>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<i class="fas fa-align-justify fa-2x col-lg-1 align-self-center text-center"></i>
					<div class="col-lg-11">
						<div class="form-floating">
							<textarea id="description_materi" name="description_materi" class="form-control" placeholder="test" style="height: 200px;" required></textarea>
							<label for="description_materi">Deskripsi</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 p-3">
				<div class="row mt-2">
					<div class="col-lg-12 container">
						<!-- <div class="row align-items-center mx-0">
							<div class="col-lg-3 p-2">
								<div class="card">
									<div class="card-body px-4">
										<img class="img-fluid" src="https://mpng.subpng.com/20180421/fze/kisspng-pdf-computer-icons-adobe-acrobat-encapsulated-post-pdf-5adb3ce756e566.3416932315243174153559.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-lg-9 p-0">
								<div class="card">
									<div class="card-body px-4">
										<p class="card-text mb-1">File.pdf</p>
										<span class="card-text"><b>Document</b></span>
									</div>
								</div>
							</div>
						</div> -->
						<label for="">Pilih file untuk materi</label>
						<input type="file" name="file_materi" class="form-control mt-2" id="file_upload" multiple onchange="showFileSelected()">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
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