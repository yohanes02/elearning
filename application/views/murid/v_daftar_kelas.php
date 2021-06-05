<div class="container py-5" style="min-height: calc(100vh - 70px)">
	<div class="row align-content-center">
		<?php foreach ((array)$class_list as $key => $value) { ?>
			<div class="col-lg-3 my-3" onclick="classDetail('<?= $this->aes->redmoon($value['id']) ?>')">
				<div class="card border border-primary text-center">
					<div class="card-body">
						<h5 class="card-title"><?= $value['name'] ?></h5>
						<p class="card-text"><?= $value['desc'] ?></p>
					</div>
					<div class="card-footer"><?= $value['owner_name'] ?></div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<script>
  function classDetail(i) {
    location.href = "murid/kelas/" + i;
  }

  function joinClass(code) {
    // var modal = new bootstrap.Modal(document.getElementById("join_class"));
    // modal.hide();
    $.ajax({
      type: "ajax",
      url: "murid/joinClass/" + code,
      dataType: "JSON",
      success: function(data) {
        if(data == "Not Found" || data == "Failed") {
          // $("#alert_fail").text = "Kode kelas tidak ditemukan";
          // $("#fail").addClass('show');
          // var modal1 = new bootstrap.Modal(document.getElementById("fail"));
          // modal1.show();
          alert("Kode kelas tidak ditemukan");
        }
        
        if(data == "Success") {
          alert("Berhasil menambahkan kelas");
          location.reload();
        }
      }
    });
  }
</script>
