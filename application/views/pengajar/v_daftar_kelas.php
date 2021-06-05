<div class="container py-5" style="min-height: calc(100vh - 70px)">
	<div class="row align-content-center list_class">
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
		<?php }	?>
	</div>
</div>

<script>
	function classDetail(i) {
		location.href = "pengajar/kelas/" + i;
	}
</script>