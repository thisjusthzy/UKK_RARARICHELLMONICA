<div class="col-md-6 col-12">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Vertical Form with Icons</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="<?= base_url('user/aksi_adduser') ?>" method="post">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Username</label>
                                    <div class="position-relative">
                                        <input type="text" required name="username" class="form-control"
                                            placeholder="Input with icon left" id="first-name-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" required name="password"
                                            placeholder="Password" id="password-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="email-id-icon">Email</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" required name="email"
                                            placeholder="Email" id="email-id-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-check'>
                                    <div class="checkbox mt-2">
                                        <input type="checkbox" id="remember-me-v" class='form-check-input' checked>
                                        <label for="remember-me-v">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>