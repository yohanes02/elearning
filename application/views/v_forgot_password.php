<body>
  <div style="background-color: #e4e5e6; height: 100vh">
    <div class="mb-4 py-5 rounder-4">
      <div class="container w-50 px-5 text-center">
        <div class="card">
          <div class="card-body">
            <h3 class="card-header"><b> Forgot Password </b></h3>
            <br>
            <h5>Verify Your Email</h5>
            <p>Please insert your email that's been registered to this website</p>
            <form action="<?= site_url('auth/checkAccount/1') ?>" class="text-start" method="POST">
              <div class="mb-3">
                <label for="s" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Insert Email">
              </div>
              <div class="text-center">
                <button class="btn btn-primary w-50">Check Email</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
