
<?php $__env->startPush('custom_css'); ?>
    <style>
        .login-wraper .login-window {
            top: 25%;
            left: 30%;
            margin-top: 0px;
        }

        @media  screen and (max-width:767px) {
            .login-wraper .login-window {
                left: 0%;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_section'); ?>
    <div class="login-wraper text-center">
        <div class="hidden-xs">
            <img src="<?php echo e(asset('assets/frontend/images/login.jpg')); ?>" alt="">
        </div>
        <div class="login-window">
            <div class="l-head">
                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="l-form">
                <form method="POST" action="<?php echo e(route('password.email')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email"
                            class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                            value="<?php echo e(old('email')); ?>" required autofocus placeholder="sample@gmail.com">

                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Send Reset Link</button></div>
                        <div class="hidden-xs">
                            <div class="col-lg-1 ortext">or</div>
                            <div class="col-lg-4 signuptext"><a href="<?php echo e(route('login')); ?>">Sign In</a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>