<?= $this->extend('pages/auth/templates/index'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?= lang('Auth.resetYourPassword') ?></h1>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <p><?= lang('Auth.enterCodeEmailPassword') ?></p>

                                <form class="user" action="<?= route_to('reset-password') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <!-- konfirmasi token -->
                                    <div class="form-group">
                                        <input type="text" name="token" class="form-control form-control-user <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.token') ?>
                                        </div>
                                    </div>
                                    <!-- input email -->
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                    <!-- input password baru -->
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Password Baru">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>
                                    <!-- input ulang password baru -->
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="Ulangi Password">
                                        <div class="invalid-feedback">
                                            <?= session('errors.pass_confirm') ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <?= lang('Auth.resetPassword') ?>
                                    </button>
                                </form>

                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>