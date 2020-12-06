<div class="row w-100 mx-1 my-3">
    <div class="col-lg-8 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
                <img src="<?= base_url('assets/public/') ?>/images/logo.png" alt="logo" style="width: 200px;">
            </div>
            <h4>New here?</h4>
            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-account-outline text-primary"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control form-control-lg border-left-0" id="username" placeholder="Username">
                        <div class="input-group-prepend">
                            <a id="generateName" style="cursor: pointer;" class="btn btn-primary">Generate</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-lock-outline text-primary"></i>
                            </span>
                        </div>
                        <input type="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Username">
                        <div class="input-group-prepend">
                            <a id="generatePassword" style="cursor: pointer;" class="btn btn-primary"><i class="mdi mdi-account-key"></i></a>
                            <a id="seePassword" style="cursor: pointer;" class="btn btn-success text-white"><i class="mdi mdi-eye-off" id="iconicPassword"></i></a>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <span class="input-group-text bg-transparent border-right-0">
                                    <i class="mdi mdi-email-outline text-primary"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control form-control-lg border-left-0" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group col-md-5 ml-3">
                        <label for="membership">Membership</label>
                        <div class="input-group">
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input membership" id="membership1" value="" checked="">
                                        Participant
                                        <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input membership" id="membership2" value="option2">
                                        User
                                        <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-check  form-check-success">
                        <label class="form-check-label text-muted">
                            <input type="checkbox" class="form-check-inpu t">
                            I agree to all Terms &amp; Conditions
                            <i class="input-helper"></i></label>
                    </div>
                </div>
                <div class="mt-3">
                    <a class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN UP</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="<?= base_url('login') ?>" class="text-success">Login</a>
                </div>
            </form>
        </div>
    </div>