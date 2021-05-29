<div class="container py-5" style="min-height: calc(100vh - 70px);">
  <h3>Change Profile</h3>
  <br>
  <form action="" method="post">
    <div class="mb-3">
      <h6><b>Personal Information</b></h6>
      <div class="row mb-3">
        <div class="col">
          <div class="form-floating">
            <input value="ISIII" type="text" class="form-control" placeholder="Nama">
            <label for="" class="form-label">Nama</label>
          </div>
        </div>
        <div class="col">
          <div class="form-floating">
            <input value="ISIII" type="email" class="form-control" placeholder="Email">
            <label for="" class="form-label">Email</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <div class="form-floating">
            <input value="ISIII" type="text" class="form-control" placeholder="Nomor Handphone">
            <label for="" class="form-label">No. Handphone</label>
          </div>
        </div>
        <div class="col">
          <div class="form-floating">
            <input id="tgl_lahir" value="ISIII" type="text" class="form-control" placeholder="Tanggal Lahir">
            <label for="" class="form-label">Tanggal Lahir</label>
          </div>
        </div>
        <div class="col">
          <div class="form-floating">
            <select name="jekel" id="jekel" class="form-select">
              <option disabled>Pilih Jenis Kelamin</option>
              <option selected value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
            <label for="" class="form-label">Jenis Kelamin</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-floating">
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat">Penggilingan, Jakarta Timur, DKI Jakarta, Indonesia</textarea>
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
            <input value="ISIII" type="text" class="form-control" placeholder="Username">
            <label for="" class="form-label">Username</label>
          </div>
        </div>
        <div class="col-lg-6">
          <button class="btn btn-primary h-100">Change Password</button>
        </div>
        <!-- <div class="col">
					<div class="form-floating input-group">
						<input value="ISIII" type="password" class="form-control border-end-0" placeholder="Password">
						<label for="" class="form-label">Password</label>
						<span class="input-group-text px-3 border-start-0 bg-transparent">
							<i class="fas fa-eye"></i>
						</span>
					</div>
				</div>
				<div class="col">
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
      <img src="https://i.imgur.com/uNGdWHi.png" alt="profile_picture" class="img-fluid border border-2 p-2 mb-2" style="width: 200px;">
      <input value="ISIII" type="file" class="form-control" name="profile_pict" id="profile_pict">
    </div>
    <div class="mb-3">
      <div class="row text-center">
        <div class="offset-lg-3 col-lg-6">
          <div class="row">
            <div class="col-lg-6">
              <button id="to_login" class="btn btn-light border border-dark w-100">Cancel</button>
            </div>
            <div class="col-lg-6">
              <button id="create_account" class="btn btn-success w-100">Save profile</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
  $("#tgl_lahir").datepicker({
    dateFormat: 'dd MM yy'
  });
</script>
