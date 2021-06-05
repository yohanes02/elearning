<div class="container py-5" style="min-height: calc(100vh - 70px);">
  <h3>Change Profile</h3>
  <br>
  <form action="<?= site_url('pengajar/submitChangeProfile') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <h6><b>Personal Information</b></h6>
      <div class="row mb-3">
        <div class="col">
          <div class="form-floating">
            <input value="<?= $profile['fullname'] ?>" name="fullname" type="text" class="form-control" placeholder="Nama">
            <label for="" class="form-label">Nama</label>
          </div>
        </div>
        <div class="col">
          <div class="form-floating">
            <select name="gender" id="gender" class="form-select" value="<?= $profile['gender'] ?>">
              <option disabled>Pilih Jenis Kelamin</option>
              <option value="m">Laki-laki</option>
              <option value="f">Perempuan</option>
            </select>
            <label for="" class="form-label">Jenis Kelamin</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <div class="form-floating">
            <input value="<?= $profile['phone'] ?>" name="phone" type="text" class="form-control" placeholder="Nomor Handphone">
            <label for="" class="form-label">No. Handphone</label>
          </div>
        </div>
        <div class="col">
          <div class="form-floating">
            <input id="tgl_lahir" value="<?= $profile['birthdate'] ?>" name="birthdate" type="text" class="form-control" placeholder="Tanggal Lahir">
            <label for="" class="form-label">Tanggal Lahir</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-floating">
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" style="height: 150px;"><?= $profile['address'] ?></textarea>
            <label for="" class="form-label">Alamat</label>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <h6><b>Account</b></h6>
      <div class="row mb-3">
        <div class="col-lg-6">
          <div class="form-floating">
            <input value="<?= $profile['email'] ?>" name="email" type="email" class="form-control" placeholder="Email">
            <label for="" class="form-label">Email</label>
          </div>
        </div>
        <div class="col-lg-6">
          <!-- <div class="form-floating"> -->
          <div class="btn btn-primary h-100" style="padding: .85rem" data-bs-toggle="modal" data-bs-target="#change_password" style="box-shadow: none;">Change Password</div>
          <!-- </div> -->
          <!-- <div class="form-floating input-group">
						<input value="ISIII" type="password" class="form-control border-end-0" placeholder="Password">
						<label for="" class="form-label">Password</label>
						<span class="input-group-text px-3 border-start-0 bg-transparent">
							<i class="fas fa-eye"></i>
						</span>
					</div> -->
        </div>
        <!-- <div class="col">
					<div class="form-floating input-group">
						<input value="ISIII" type="password" class="form-control border-end-0" placeholder="Retype Password">
						<label for="" class="form-label">Retype Password</label>
						<span class="input-group-text px-3 border-start-0 bg-transparent">
							<i class="fas fa-eye"></i>
						</span>
					</div>
				</div> -->
      </div>
    </div>
    <div class="mb-3">
      <h6><b>Profile Picture</b></h6>
      <?php if($profile['picture'] != null) { ?>
      <img src="<?= site_url('uploads/'.$this->session->userdata('user_id').'/profile/'.$profile['picture']) ?>" alt="profile_picture" class="img-fluid border border-2 p-2 mb-2" style="height: 200px; width: 200px;">
      <?php } else { ?>
        <p>No Image</p>
      <?php } ?>
      <input type="file" class="form-control" name="profile_pict" id="profile_pict">
    </div>
    <div class="mb-3">
      <div class="row text-center">
        <div class="offset-lg-3 col-lg-6">
          <div class="row">
            <div class="col-lg-6">
              <button id="to_login" type="reset" class="btn btn-light border border-dark w-100">Cancel</button>
            </div>
            <div class="col-lg-6">
              <button id="create_account" type="submit" class="btn btn-primary w-100">Save profile</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<div id="change_password" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="change_password" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="pengajar/changePassword" method="post">
          <div class="modal-header">
            <div class="modal-title h5"><b>Change Password</b></div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="old_pass_div">
              <label for="" class="form-label">Password Lama</label>
              <input id="old_pass" name="old_pass" type="password" class="form-control" placeholder="Name" onkeyup="checkIfPassSame()">
            </div>
            <div id="new_pass_div">
              <label for="" class="form-label">Password Baru</label>
              <input id="new_pass" name="new_pass" type="password" class="form-control" placeholder="Name" onkeyup="checkIfPassSame()">
            </div>
            <div id="re_new_pass_div">
              <label for="" class="form-label">Retype Password Baru</label>
              <input id="retype_new_pass" name="retype_new_pass" type="password" class="form-control" placeholder="Name" onkeyup="checkIfPassSame()">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button disabled id="submit_change_password" type="submit" class="btn btn-primary">Change Password</button>
          </div>
        </form>
      </div>
	</div>
</div>

<script>
  $("#tgl_lahir").datepicker({
    dateFormat: 'dd MM yy'
  });

  function checkIfPassSame() {
    // console.log('test');
    if($('#alert_pass')) {
      $('#alert_pass').remove();
    }
    if($("#new_pass").val() != "" && $("#retype_new_pass").val() != "" && $("#old_pass").val() != "") {
      if($("#new_pass").val() == $("#retype_new_pass").val()) {
        console.log("same");
        $("#submit_change_password").attr("disabled", false);
      } else {
        console.log("not same");
        var span = document.createElement('span');
        span.id = 'alert_pass';
        span.textContent = "Password is not same";
        span.className = 'text-danger';
        var div = document.getElementById('re_new_pass_div');
        div.append(span);
        $("#submit_change_password").attr("disabled", true);
      }
    } else {
      $("#submit_change_password").attr("disabled", true);
    }
  }
</script>
