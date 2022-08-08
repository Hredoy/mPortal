
<?php $__env->startPush('custom_css'); ?>
	<style>
		.login-wraper .login-window{
			top: 25%;
			left: 30%;
			margin-top: 0px;
		}
		@media  screen and (max-width:767px){
			.login-wraper .login-window{
			left: 5%;
		}
		}
	</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_section'); ?>
	<div class="row">
        <div class="login-wraper text-center">
            <div class="hidden-xs">
                <img src="<?php echo e(asset('assets/frontend/images/login.jpg')); ?>" alt="">
            </div>
            <div class="login-window">
                <div class="l-head">
                    Activate Your Account
                </div>
                <div class="l-form">
					<p><?php echo e(trans('auth.regThanks')); ?></p>
						<p><?php echo e(trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] )); ?></p>
						<p><?php echo e(trans('auth.clickInEmail')); ?></p>
						<p><a href='/activation' class="btn btn-cv1"><?php echo e(trans('auth.clickHereResend')); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/auth/activation.blade.php ENDPATH**/ ?>