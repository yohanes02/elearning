<form action="<?= site_url('pengajar/submitRate') ?>" method="POST">
  <div class="container py-5" style="min-height: calc(100vh - 70px)">
    <a onclick="window.history.back()" class="btn"><i class="fas fa-arrow-left"></i> Kembali </a>
    <div class="row">

      <div class="col-lg-9 p-3">
        <input type="hidden" value="<?= $awr_id ?>" name="awr_id">
        <input type="hidden" value="<?= $cls_id ?>" name="cls_id">
        <div class="card">
          <div class="card-header" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <b>Tugas</b>
            <i class="fa fa-chevron-down" aria-hidden="true" style="position: absolute; right:1em;"></i>
          </div>
          <div class="card-body">
            <div class="collapse" id="collapseExample">

              <div class="row col-lg-12 p-2">
                <p class="h5"><?= $det['title'] ?></p>
              </div>

              <div class="row col-lg-12 p-2">
                <p><?= $det['desc'] ?></p>
                <figcaption class="blockquote-footer">
                  <?= $det['due_date'] ?>
                </figcaption>
              </div>

              <div class="row col-lg-11 p-2">
                <span>
                  <p>
                    <i class="fa fa-tags">&nbsp;&nbsp;</i>
                    <b class="text-primary"><?= strtoupper($det['type']) ?></b>
                  </p>
                </span>
              </div>

              <div class="col-lg-12 p-2">
                <div class="card">
                  <div class="card-body p-2">
                    <span>
                      <i class="fa fa-paperclip">&nbsp;</i>
                      <a href="<?= site_url('pengajar/dop/' . $cls_id . '/assignment/' . $det['asg_file']) ?>" target="_blank">
                        <?= $det['asg_file'] ?>
                      </a>
                    </span>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <br>

        <div class="card">
          <div class="card-header">
            <b>Penyerahan Tugas</b>
          </div>

          <div class="card-body">

            <div class="row col-lg-12 p-2">
              <p class="h5">
                <?= $det['student_name'] ?>
              </p>
            </div>

            <div class="row col-lg-12 p-2">
              <p>
                <span>
                  <i class="fa  fa-calendar-check">&nbsp;</i>
                  <?= $det['uploaded_date'] ?>
                </span>
              </p>
            </div>

            <div class="col-lg-12 p-2">
              <div class="card">
                <div class="card-body p-2">
                  <span>
                    <i class="fa fa-paperclip">&nbsp;</i>
                    <a href="<?= site_url('pengajar/dop/' . $cls_id . '/answer/' . $det['awr_file']) ?>" target="_blank">
                      <?= $det['awr_file'] ?>
                    </a>
                  </span>
                </div>
              </div>
            </div>

            <div class="row col-lg-12 p-2">
              <?php foreach ((array)$com as $k => $v) { ?>
                <figcaption class="blockquote-footer">
                  "<?= $v['komentar'] ?>"
                </figcaption>
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
      <div class="col-lg-3 p-3">
        <div id="tugas" class="mb-5">
          <span>
            <b>Penilaian &nbsp;</b>
            <i class="fas fa-clipboard"></i>
          </span>
          <hr class="mt-0 pt-0">
          <div class="mb-2 d-grid">

            <div class="input-group">
              <input name="nilai" type="number" min="0" max="100" maxlength="3" class="form-control" id="exampleFormControlInput1" placeholder="Nilai">
            </div>

            <br>
          </div>
          <div class="mb-2 d-grid">
            <button type="submit" class="btn btn-primary ">Simpan</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</form>

<script>

</script>