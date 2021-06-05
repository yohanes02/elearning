<div class="container py-5" style="min-height: calc(100vh - 70px)">
  <a onclick="window.history.back()" class="btn"><i class="fas fa-arrow-left"></i> Kembali </a>
  <div class="row">
    <div class="col-lg-9 p-3">
      <div class="card p-3">
        <!-- <p class="card-title h3"></p> -->
        <div class="card-body">
          <p class="h3"><b><?= $materi['title'] ?></b></p>
          <br>
          <div class="row">
            <div class="col-lg-2">
              <p class="h6">Uploaded Date</p>
            </div>
            <div class="col-lg-10">
              <p class="h6">: <?= $materi['created_date'] ?></p>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-lg-2">
              <p class="h6">Due Date</p>
            </div>
            <div class="col-lg-10">
              <p class="h6">: 20 Juni 2021 19:25</p>
            </div>
          </div> -->
          <div class="mt-5">
            <p><?= $materi['desc'] ?></p>
          </div>
          <!-- <p class="h6">Uploaded Date : 15 Juni 2021 13:07</p>
						<p class="h6">Due Date: 20 Juni 2021 19:25</p> -->
        </div>
        <div class="card-footer bg-transparent">
          <!-- <div class="row"> -->
          <div id="lampiran" class="mt-3 row">
            <div class="col-lg-1">
              <img class="img-thumbnail" src="https://mpng.subpng.com/20180421/fze/kisspng-pdf-computer-icons-adobe-acrobat-encapsulated-post-pdf-5adb3ce756e566.3416932315243174153559.jpg" alt="" style="width: 60px;">
            </div>
            <div class="col-lg-11 align-self-center">
              <a href="<?= site_url('uploads/' . $cls_id . '/subject/' . $materi['attachment']) ?>">
                <span><?= $materi['attachment'] ?></span>
              </a>
            </div>
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>
    <div class="col-lg-3 p-3">
      <div id="komentar">
        <span>
          <b>Komentar</b>
          <i class="fas fa-comment-alt"></i>
        </span>
        <hr class="mt-0 pt-0">
        <form id="form_komentar" method="post">     
          <div class="input-group">
            <input type="hidden" name="materi_id" value="<?= $materi['id'] ?>">
            <input type="text" id="komentar" class="form-control border-end-0" name="komentar" placeholder="Tulis Komentar...">
            <span id="kirim_komentar" class="input-group-text px-3 border-start-0 bg-transparent">
              <i class="fas fa-paper-plane"></i>
            </span>
            <!-- <button id="kirim_komentar" hidden></button> -->
          </div>
        </form>
        <br>
        <div id="list_komentar">
<?php if(!empty($komentar)) { ?>
  <?php foreach ($komentar as $key => $value) { ?>
            <div class="border-start border-4 ps-1 mb-1 <?php if($value['usr_id'] == $this->session->userdata('user_id')) { echo 'border-success';} ?>">
              <p class="mb-0" style="font-size: 12px; font-weight: bold;"><?=$value['usr_name']?></p>
              <p class="mb-0"><?=$value['komentar']?></p>
            </div>
  <?php } ?>
<?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$("#kirim_komentar").click(function() {
  $.ajax({
    type: "POST",
    url: "murid/kirimKomentarMateri",
    dataType: "JSON",
    data: $('#form_komentar').serialize(),
    success: function(data) {
    }
  })
  location.reload();
});
</script>
