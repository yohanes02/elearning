<div class="container py-5" style="min-height: calc(100vh - 70px)">
	<a onclick="window.history.back()" class="btn"><i class="fas fa-arrow-left"></i> Kembali </a>
	<div class="row">
		<div class="col-lg-9 p-3">
			<div class="card p-3">
				<!-- <p class="card-title h3"></p> -->
				<div class="card-body">
					<p class="h3"><b><?= $tugas['title'] ?></b></p>
					<br>
					<div class="row">
						<div class="col-lg-2">
							<p class="h6">Uploaded Date</p>
						</div>
						<div class="col-lg-10">
							<p class="h6">: <?= $tugas['created_date'] ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<p class="h6">Due Date</p>
						</div>
						<div class="col-lg-10">
							<p class="h6">: <?= $tugas['due_date'] ?></p>
						</div>
					</div>
					<div class="mt-5">
						<p><?= $tugas['desc'] ?></p>
					</div>
					<!-- <p class="h6">Uploaded Date : 15 Juni 2021 13:07</p>
						<p class="h6">Due Date: 20 Juni 2021 19:25</p> -->
				</div>
				<div class="card-footer bg-transparent">
					<!-- <div class="row"> -->
					<div id="lampiran_1" class="mt-3 row">
						<div class="col-lg-1">
							<img class="img-thumbnail" src="https://mpng.subpng.com/20180421/fze/kisspng-pdf-computer-icons-adobe-acrobat-encapsulated-post-pdf-5adb3ce756e566.3416932315243174153559.jpg" alt="" style="width: 60px;">
						</div>
						<div class="col-lg-11 align-self-center">
							<a href="<?= site_url('uploads/' . $cls_id . '/assignment/' . $tugas['attachment']) ?>">
								<span><?= $tugas['attachment'] ?></span>
							</a>
						</div>
					</div>
					<!-- </div> -->
				</div>
			</div>
		</div>
		<div class="col-lg-3 p-3">
			<div id="tugas" class="mb-5">
				<span>
					<b>Tugas</b>
					<i class="fas fa-clipboard"></i>
				</span>
				<hr class="mt-0 pt-0">
				<div class="mb-2 d-grid">
<?php if(empty($answer) == false) { ?>
          <input type="hidden" name="answer_in_db" id="answer_in_db" value="<?= $answer['attachment'] ?>">
          <div id="file_selected" class="mb-2 row">
            <div class="col-lg-3">
              <img class="img-thumbnail" src="https://mpng.subpng.com/20180421/fze/kisspng-pdf-computer-icons-adobe-acrobat-encapsulated-post-pdf-5adb3ce756e566.3416932315243174153559.jpg" alt="" style="width: 60px;">
            </div>
            <div class="col-lg-9 align-self-center">
              <a href="<?= site_url('uploads/' . $cls_id . '/answer/' . $answer['attachment']) ?>">
                <span id="file_text" style="word-break: break-word;"><?= $answer['attachment'] ?></span>
              </a>
            </div>
          </div>
<?php } else { ?>
          <div id="file_selected" class="mb-2 row" style="display: none;">
            <div class="col-lg-3">
              <img class="img-thumbnail" src="https://mpng.subpng.com/20180421/fze/kisspng-pdf-computer-icons-adobe-acrobat-encapsulated-post-pdf-5adb3ce756e566.3416932315243174153559.jpg" alt="" style="width: 60px;">
            </div>
            <div class="col-lg-9 align-self-center">
              <!-- <a href="<?= site_url('uploads/' . $cls_id . '/assignment/' . $tugas['attachment']) ?>"> -->
                <span id="file_text" style="word-break: break-word;"></span>
              <!-- </a> -->
            </div>
          </div>
<?php } ?>

<button id="diff_file" hidden  data-bs-toggle="modal" data-bs-target="#diff_answer"></button>
<button id="submit_last" hidden  data-bs-toggle="modal" data-bs-target="#submit_done"></button>

<?php if(empty($answer) || $answer['status_answer'] == 1) { ?>
          <div class="row m-0">
  					<button id="choose_file" class="btn btn-success border border-dark col me-2">Choose File</button>
            <button id="send_file" class="btn btn-primary border border-dark col">Kirim</button>
          </div>
          <form action="<?php if(empty($answer)) { ?> murid/submitJawaban <?php } else { ?> murid/updateJawaban <?php } ?>" method="post" enctype="multipart/form-data">
            <input id="file_jawaban" type="file" name="file_jawaban" style="display: none;">
            <input type="hidden" name="tugas_id" value="<?= $tgs_id ?>">
            <input type="hidden" name="class_id" value="<?= $cls_id ?>">
            <input type="hidden" name="answer_id" value="<?= $answer['id'] ?>">
            <input id="status_answer" type="hidden" name="status_answer" value="1">
            
            <button id="submit_answer" type="submit" hidden></button>
          </form>
				</div>
				<div class="mb-2 d-grid">
        <?php if(!empty($answer)) { ?>
					<button id="kirim_jawaban_akhir" class="btn btn-light border border-dark">Tandai Selesai</button>
          <form action="murid/submitFinal" method="post">
            <input type="hidden" name="tugas_id" value="<?= $tgs_id ?>">
            <input type="hidden" name="class_id" value="<?= $cls_id ?>">
            <input type="hidden" name="answer_id" value="<?= $answer['id'] ?>">
            <input id="status_answer_finish" type="hidden" name="status_answer_finish" value="2">
            <button id="submit_final" type="submit" hidden></button>
          </form>
        <?php } ?>
				</div>
<?php } ?>
			</div>

			<div id="komentar">
				<span>
					<b>Komentar</b>
					<i class="fas fa-comment-alt"></i>
				</span>
				<hr class="mt-0 pt-0">
				<div class="input-group">
					<input type="text" class="form-control border-end-0" placeholder="Tulis Komentar...">
					<span class="input-group-text px-3 border-start-0 bg-transparent">
						<i class="fas fa-paper-plane"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="diff_answer" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="diff_answer" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title h5"><b>Perubahan File</b></div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Anda melakukan perubahan pada file yang akan disubmit. Klik dahulu button kirim untuk menyimpan perubahan</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
			</div>
		</div>
	</div>
</div>

<div id="submit_done" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="submit_done" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title h5"><b>Submit Jawaban</b></div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Apakah anda yakin untuk mensubmit tugas ? (Jawaban tugas yang sudah disubmit tidak akan bisa lagi untuk diubah)</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				<button id="create_class" type="button" class="btn btn-primary" onclick="submitTugas()">Submit</button>
			</div>
		</div>
	</div>
</div>
<script>
  $("#choose_file").on('click', function() {
    $("#file_jawaban").click();
  });

  $("#send_file").on('click', function() {
    // $("#status_answer").val("1");
    $("#submit_answer").click();
  });

  $("#kirim_jawaban_akhir").on('click', function() {
    console.log($("#answer_in_db").val(), $("#file_text").text());
    if ($("#answer_in_db").val() != $("#file_text").text()) {
      $("#diff_file").click();
    } else {
      // $("#submit_answer").click();
      $("#submit_last").click();
    }
  });

  

  $('input:file').change(
    function(e){
      
      $("#file_selected").show();
      // var div = document.getElementById('file_selected');
      // var ul = document.createElement('ul');
      for (let i = 0; i < e.currentTarget.files.length; i++) {
      //   var li = document.createElement('li');
      //   li.textContent = e.currentTarget.files[i].name;
      //   // p.textContent = e.currentTarget.files[i].name;
      //   div.append(li);
        var span = document.getElementById('file_text');
        span.textContent = e.currentTarget.files[i].name;
      }

      // p.textContent = 
      //   console.log(e.currentTarget.files);
    });

    function submitTugas() {
      $("#submit_final").click();
    }
</script>
