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
				<h1><b><?= $cls['name'] ?></b></h1>
				<p><b>Kode Kelas</b> <?= $cls['code'] ?></p>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div id="create">
							<div class="border rounded">
								<label class="pt-2 px-2" for="" style="font-weight: bold;">Create New</label>
								<div class="row px-4 py-2" s>
									<form action="<?= site_url('pengajar/createMateri') ?>" method="POST">
										<input type="hidden" name="class_id" value="<?= $cls_id ?>">
										<button type="submit" value="subject" class="btn btn-primary my-1 w-100">
											Create Materi <span><i class="fas fa-plus"></i></span>&nbsp;
										</button>
										<br>
									</form>
									<form action="<?= site_url('pengajar/createTugas') ?>" method="POST">
										<input type="hidden" name="class_id" value="<?= $cls_id ?>">
										<button type="submit" value="assignment" class="btn btn-primary my-1 w-100" type="button">
											Create Tugas <span><i class="fas fa-plus"></i></span> &nbsp;
										</button>
									</form>
								</div>
							</div>
						</div>
						<div id="filter" class="mt-4">
							<div class="border rounded">
								<label class="pt-2 px-2" for="" style="font-weight: bold;">Filter</label>
								<div class="row px-4 py-2">
									<div class="form-check">
										<input type="checkbox" checked class="form-check-input post_cb" value="Tugas" name="post_cb" id="tugas_cb">
										<label for="tugas_cb" class="form-check-label">Tugas</label>
									</div>
									<div class="form-check">
										<input type="checkbox" checked class="form-check-input post_cb" value="Materi" name="post_cb" id="materi_cb">
										<label for="materi_cb" class="form-check-label">Materi</label>
									</div>
									<div class="form-check">
										<input type="checkbox" checked class="form-check-input post_cb" value="Info" name="post_cb" id="info_cb">
										<label for="info_cb" class="form-check-label">Info</label>
									</div>
									<button class="btn btn-primary" id="post_filter">Filter</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<form name="form_announce" id="form_announce" action="">
							<input type="hidden" name="class_id" value="<?= $cls_id ?>">
							<div id="pengumuman" class="input-group shadow-sm">
								<span class="input-group-text px-4 py-3 border-end-0" id="basic-addon2" style="background-color: transparent;"><img src="<?= site_url('uploads/'.$cls['owner_id'].'/profile/'.$cls['picture']) ?>" alt="" width="40"></span>
								<input type="text" id="xoo" class="form-control border-start-0 border-end-0" placeholder="Umumkan sesuatu ke kelas" onclick="useCKEditor()">
								<span class="input-group-text px-4 border-start-0" id="basic-addon2" style="background-color: transparent;"><i class="fas fa-paper-plane"></i></span>
							</div>
							<div id="content_not_ck" class="border" style="display: none;">
								<div class="container p-2">
									<input type="file" name="file_announce" class="form-control m-0" id="file_upload" multiple onchange="showFileSelected()">
								</div>
								<div class="container m-0 p-0">
									<div class="row m-0">
										<div id="buttonCK" class="bg-light p-2">
											<button id="submit_announce" class="btn bg-primary text-white float-end">Kirim</button>
											<button id="cancel_announce" class="btn border-0 float-end" onclick="hideContent()">Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<p>
							<?php if (!empty($this->session->userdata('result'))) {
								$res = $this->session->userdata('result');
								$this->session->unset_userdata("result");
								$type = (strpos($res, 'Sukses') !== false) ? "primary" : "danger";
								$msg = '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
												' . $res . '
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											';
								echo $msg;
							}	?>
						<div id="list_post">
							<?php foreach ((array)$list as $key => $value) { ?>

								<div id="classwork_item_1" class="mt-2 classwork_item all_post post_<?= $value['type'] ?>">
									<div class="card">
										<div class="row g-0">
											<div class="col-lg-2 align-self-center">
												<div class="text-center">
													<span><i class="fas <?= $value['icon'] ?> fa-3x"></i></span>
												</div>
											</div>
											<div class="col-lg-9">
												<div class="my-1">
													<a href="<?= site_url('pengajar/detailPost/' . $value['type'] . '/' . $cls_id . '.' . $this->aes->redmoon($value['id'])) ?>" style="text-decoration: none; color: black;">
														<?php if ($value['type'] == 'Info') { ?>
															<span><b><?= $value['type'] ?></b></span><br>
															<?= $value['desc']  ?>
														<?php } else { ?>
															<span><b><?= $value['type'] . " : " . $value['title'] ?></b></span>
														<?php } ?>
													</a>
													<p><small><?= $value['creator_name'] ?></small></p>
													<span class="card-text text-primary"><small><?= $value['created_date'] ?></small></span>
												</div>
											</div>
											<div class="col-lg-1 text-center align-self-center">
												<div class="dropdown">
													<a class="btn" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
														<?php if ($value['type'] != 'Info') { ?>
															<li><a class="dropdown-item" href="<?= site_url('pengajar/edit' . $value['type'] . '/' . $cls_id . '.' .  $this->aes->redmoon($value['id'])) ?>">Edit</a></li>
														<?php } ?>
														<li><a class="dropdown-item" href="<?= site_url('pengajar/delete' . $value['type'] . '/' . $cls_id . '.' .  $this->aes->redmoon($value['id'])) ?>" onclick="return confirm('Apakah anda yakin akan menghapus?')">Delete</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
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
											<?php foreach ((array) $asg as $k => $v) { ?>
												<option value="<?= $v['id'] ?>"><?= $v['title'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label for="sort_status" class="form-label">Status</label>
										<div class="form-check">
											<input type="checkbox" checked class="form-check-input asw_status" value="turned_in" name="asw_status" id="t_cb">
											<label for="t_cb" class="form-check-label">Turned In</label>
										</div>
										<!-- <div class="form-check">
											<input type="checkbox" class="form-check-input asw_status" value="turned_in_late" name="asw_status" id="l_cb">
											<label for="l_cb" class="form-check-label">Turned In Late</label>
										</div>
										<div class="form-check">
											<input type="checkbox" class="form-check-input asw_status" value="n" name="asw_status" id="n_b">
											<label for="n_cb" class="form-check-label">Not Turned In</label>
										</div> -->
										<div class="form-check">
											<input type="checkbox" checked class="form-check-input asw_status" value="graded" name="asw_status" id="s_b">
											<label for="s_b" class="form-check-label">Graded</label>
										</div>
									</div>
									<div class="mb-3 btn-group">
										<button class="btn btn-primary" id="filter_tugas">Run Filter</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="row">
							<?php foreach ((array)$awr as $key => $value) { ?>
								<div class="col-lg-4 mb-3 assignment_<?= $value['assignment_id'] ?> all_answer status_<?= str_replace(" ", "_", $value['status']) ?>">
									<div class="card">
										<div class="card-body">
											<h6><span><?= $value['title'] ?></span></h6>
											<hr class="my-2">
											<span><?= $value['student_name'] ?></span>
											<br>
											<b>
												<span class="text-<?= $value['status'] == "graded" ? 'primary' : 'success' ?>">
													<?= ucfirst($value['status'] == "graded" ? $value['status'] . " (" . $value['grade'] . ")" : $value['status']) ?>
												</span>
											</b>
											<a href="<?= site_url("pengajar/rate/" . $this->aes->redmoon($value['awr_id'])) ?>" class="btn btn-primary btn-sm" style="position:absolute; right: 1em;" id="filter_tugas">Nilai</a>
										</div>
									</div>
								</div>
							<?php } ?>
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
							<?php foreach ((array) $asg as $k => $v) { ?>
								<td width="<?php echo 100 / (count($asg) + 1) ?>%" class="text-center" style="vertical-align: middle;">
									<span>
										<h6><?= $v['title'] ?></h6>
									</span>
								</td>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($std as $key => $value) { ?>
							<tr>
								<td class="text-center" style="vertical-align: middle;"><?= $value['fullname'] ?></td>
								<?php foreach ($asg as $ky => $val) {
									if (isset($val['awr'])) {
										foreach ($val['awr'] as $k => $v) {
								?>
											<td class="text-center">
												<?= $value['student_id'] == $v['student_id'] ? $v['grade'] : "" ?>
											</td>
								<?php }
									}
								} ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?php echo base_url('assets/lib/jquery-3.6.0.min.js'); ?>" charset="utf-8"></script>
<script>
	$(document).ready(function() {

		let fa = '<?= $fa ?>'

		// if (fa != 'x') {
		// 	$("select#tugas_list").val(fa).trigger('change');
		// 	$('.all_answer').hide();
		// 	$('.assignment_' + fa).show();
		// }

		$("#filter_tugas").click(function() {
			asg = $('#tugas_list').val();
			$('.all_answer').hide();

			$('input[name="asw_status"]:checked').each(function() {
				$('.assignment_' + asg + '.status_' + this.value).show();
			});
		})


		$("#post_filter").click(function() {
			$('.all_post').hide();
			$('input[name="post_cb"]:checked').each(function() {
				$('.post_' + this.value).show();
			});
		});


		$('#form_announce').submit(function(e) {
			e.preventDefault();
			// refreshPost(1);
			var m_data = new FormData();
			m_data.append('file_attach', $('input[name=file_announce]')[0].files[0]);
			m_data.append('content', CKEDITOR.instances.pengumuman.getData());
			m_data.append('class_id', '<?= $cls_id ?>');

			$.ajax({
				url: '<?= site_url("pengajar/submitInfo") ?>',
				data: m_data,
				processData: false,
				contentType: false,
				type: 'POST',
				dataType: 'json',
				success: function(ret) {
					if (ret.respon == "ok") {
						refreshPost('<?= $cls_id ?>');
						CKEDITOR.instances.pengumuman.setData('')
						$('input[name=file_announce]').val('')
					} else {
						alert("gagal")
					}
				}
			});
		});


	});
	// $("#submit_announce").click(function() {
	// 	console.log($("#file_upload"));
	// });

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


	// $('#submit_btn').click(function() {
	// 	var formData = new FormData($('#contactform'));
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: '/contact.php',
	// 		// dataType: "json",
	// 		data: formData,
	// 		processData: false,
	// 		contentType: false,
	// 		success: function(data) {

	// 			console.log(data.type);
	// 			console.log(data.msg);

	// 			var nClass = data.type;
	// 			var nTxt = data.msg;

	// 			$("#notice").attr('class', 'alert alert-' + nClass).text(nTxt).remove('hidden');
	// 			//reset fields if success
	// 			if (nClass != 'danger') {
	// 				$('#contactform input').val('');
	// 				$('#contactform textarea').val('');
	// 			}

	// 		}
	// 	});
	// 	return false;
	// });


	function refreshPost(cls) {
		$.get("<?= site_url('pengajar/getPost') ?>" + '/' + cls, function(data) {
			datapost = JSON.parse(data)
			allpost = '<div class="alert alert-primary alert-dismissible fade show" role="alert">\
										Sukses membuat info\
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
									</div>';

			$('#list_post').html('')

			$.each(datapost, function(i, x) {
				allpost += '<div id="classwork_item_1" class="mt-2 classwork_item all_post post_' + x.type + '">\
											<div class="card">\
												<div class="row g-0">\
													<div class="col-lg-2 align-self-center">\
														<div class="text-center">\
															<span><i class="fas ' + x.icon + ' fa-3x"></i></span>\
														</div>\
													</div>\
													<div class="col-lg-9">\
														<div class="my-1">\
															<a href="' + x.link_detail + '" style="text-decoration: none; color: black;">\
																<span><b>' + x.title + '</b></span><br>\
																' + x.spinf + '\
																<p><small>' + x.creator_name + '</small></p>\
																<span class="card-text text-primary"><small>' + x.created_date + '</small></span>\
															</a>\
														</div>\
													</div>\
													<div class="col-lg-1 text-center align-self-center">\
														<div class="dropdown">\
															<a class="btn" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">\
																<i class="fas fa-ellipsis-v"></i>\
															</a>\
															<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">\
																' + x.link_edit + '\
																' + x.link_delete + '\
															</ul>\
														</div>\
													</div>\
												</div>\
											</div>\
										</div>'

			});
			$('#list_post').html(allpost)

		})

	}
</script>
