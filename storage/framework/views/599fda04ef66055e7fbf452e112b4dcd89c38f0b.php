<?php $__env->startPush('custom_css'); ?>
	<style>
		.login-wraper .login-window{
			top: 15%;
			left: 30%;
			margin-top: 0px;
		}
		@media  screen and (max-width:767px){
			.login-wraper .login-window{
			left: 0%;
		}
		}
	</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_section'); ?>
<div class="container-fluid bg-image">
    <div class="row">
        <div class="login-wraper">
            <div class="hidden-xs">
                <img src="<?php echo e(asset('assets/frontend/images/login.jpg')); ?>" alt="">
            </div>
            <div class="login-window">
                <div class="l-head">
                    Reset Your Password
                </div>
                <div class="l-form">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('password.request')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="sample@gmail.com">
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="**********">

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control<?php echo e($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" name="password_confirmation" required placeholder="**********">

                            <?php if($errors->has('password_confirmation')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Reset Password</button></div>
                            <div class="hidden-xs">
                                <div class="col-lg-1 ortext">or</div>
                                <div class="col-lg-4 signuptext"><a href="<?php echo e(route('login')); ?>">Sign In</a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>