<form class="pt-3">
    <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group">
            <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                    <i class="mdi mdi-account-outline text-primary"></i>
                </span>
            </div>
            <input type="text" class="form-control form-control-lg border-left-0" id="username" placeholder="Username">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <div class="input-group">
            <div class="input-group-prepend bg-transparent">
                <span class="input-group-text bg-transparent border-right-0">
                    <i class="mdi mdi-lock-outline text-primary"></i>
                </span>
            </div>
            <input type="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password">
            <div class="input-group-prepend">
                <a id="seePassword" style="cursor: pointer;" class="btn btn-success text-white border-left-0 p-3"><i class="mdi mdi-eye-off" id="iconicPassword"></i></a>
            </div>
        </div>
    </div>
    <div class="row mx-1" id="alert">
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check form-check-success">
            <label class="form-check-label text-muted">
                <input type="checkbox" class="form-check-input" id="tutorial">
                Keep me signed in
                <i class="input-helper"></i></label>
        </div>
        <a href="#" class="auth-link text-black">Forgot password?</a>
    </div>
    <div class="my-3">
        <a class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" id="login">LOGIN</a>
    </div>
    <!-- <div class="mb-2 d-flex">
        <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
            <i class="mdi mdi-facebook mr-2"></i>Facebook
        </button>
        <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
            <i class="mdi mdi-google mr-2"></i>Google
        </button>
    </div> -->
    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="<?= base_url('register') ?>" class="text-success">Create</a>
    </div>
</form>