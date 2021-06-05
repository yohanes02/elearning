<form action="<?= site_url('pengajar/submitRate') ?>" method="POST">
  <div class="container py-5" style="min-height: calc(100vh - 70px)">
    <a onclick="window.history.back()" class="btn"><i class="fas fa-arrow-left"></i> Kembali </a>
    <div class="row">

      <div class="col-lg-8 p-3">
        <div class="card">

          <div class="card-body">

            <div class="row col-lg-12 p-2">
              <p class="h5"><?= $detail['title'] ?></p>
            </div>

            <div class="row col-lg-12 p-2">
              <p><?= $detail['desc'] ?></p>
              <figcaption class="blockquote-footer">
                <?= !empty($detail['due_date']) ? $detail['due_date'] :  $detail['created_date'] ?>
              </figcaption>
            </div>

            <div class="row col-lg-11 p-2">
              <span>
                <p>
                  <i class="fa fa-tags">&nbsp;&nbsp;</i>
                  <b class="text-primary"><?= strtoupper($detail['type']) ?></b>
                </p>
              </span>
            </div>

            <div class="col-lg-12 p-2">
              <div class="card">
                <div class="card-body p-2">
                  <span>
                    <i class="fa fa-paperclip">&nbsp;</i>
                    <a href="<?= site_url('pengajar/dop/' . $cls_id . '/' . $pth . '/' . $detail['attachment']) ?>" target="_blank">
                      <?= $detail['attachment'] ?>
                    </a>
                  </span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-lg-4 p-3">
        <div id="tugas" class="mb-5">
          <span>
            <b>Komentar&nbsp;</b>
            <i class="fas fa-comment-alt"></i>
          </span>
          <hr class="mt-0 pt-0">
          <div class="mb-2 d-grid">

            <div id="list_komentar">
              <?php foreach ((array)$com as $k => $v) { ?>
                <div class="border-start border-4 ps-1 mb-1 ">
                  <p class="mb-0" style="font-size: 13px; font-weight: bold;"><?= $v['usr_name'] ?></p>
                  <p class="mb-0"><?= $v['komentar'] ?></p>
                </div>
                <p>
                <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>

</script>