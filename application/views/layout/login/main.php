<?php if (url(1) == 'login') : ?>
    <div class="row flex-grow">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
                <div class="brand-logo">
                    <img src="<?= base_url('assets/public/') ?>images/logo.png" alt="logo">
                </div>
                <h4>Welcome back, workers or freelancer!</h4>
                <h6 class="font-weight-light">Happy to see you again!</h6>
                <!-- <h4>Register Account!</h4> -->
                <!-- <h6 class="font-weight-light">You not have account, register now and you can login!</h6> -->
                <?php $this->load->view('login/' . url(1) . '/index') ?>
            </div>
        </div>
        <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright © 2018 All rights reserved.</p>
        </div>
    </div>
<?php else : ?>
    <?php $this->load->view('login/' . url(1) . '/index') ?>
<?php endif; ?>