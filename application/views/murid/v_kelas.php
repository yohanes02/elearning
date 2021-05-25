<body class="sticky-footer" id="page-top" style="padding-top: 70px;">
	<?php $this->load->view('pengajar/v_nav') ?>

	<div class="container py-5" style="min-height: calc(100vh - 70px)">
		<ul class="nav nav-tabs justify-content-center" id="tab" role="tablist">
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
		<div class="tab-content pt-2" id="tab-content">
			<div class="tab-pane fade show active" id="forum" role="tabpanel" aria-labelledby="forum-tab">
				<div class="row">
					<div class="col-lg-8">
						<p>TEST</p>
					</div>
					<div class="col-lg-4">
						<p>TEST 2</p>
					</div>
				</div>
				<div class="data-materi">
					<p>Materi</p>
				</div>
				<div class="data-tugas">
					<p>Tugas</p>
				</div>
			</div>
			<div class="tab-pane fade" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">...</div>
			<div class="tab-pane fade" id="anggota" role="tabpanel" aria-labelledby="anggota-tab">...</div>
		</div>
	</div>

</body>
