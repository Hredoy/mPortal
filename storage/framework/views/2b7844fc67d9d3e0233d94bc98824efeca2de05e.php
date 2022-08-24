
<?php $__env->startSection('main_section'); ?>
    <div class="container-fluid bg-image">
        <div class="row">
            <div class="login-wraper">
                <div class="hidden-xs">
                    <img src="<?php echo e(asset('assets/frontend/images/login.jpg')); ?>" alt="">
                </div>
                <div class="banner-text hidden-xs">
                    <div class="line"></div>
                    <div class="b-text">
                        Watch <span class="color-active">millions<br> of</span> <span class="color-b1">v</span><span
                            class="color-b2">i</span><span class="color-b3">de</span><span class="color-active">os</span>
                        for free.
                    </div>
                    <div class="overtext">
                        Over 6000 videos uploaded Daily.
                    </div>
                </div>
                <div class="login-window">
                    <div class="l-head">
                        Log Into Your Account
                    </div>
                    <div class="l-form">
                        <form method="POST" action="<?php echo e(route('login')); ?>">
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
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"
                                    required placeholder="**********">

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <span class="arrow"></span>
                                    </label> <span>Remember me on this computer</span>
                                    <span class="text2">(not recomended on public or shared computers)</span>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-lg-7"><button type="submit" class="btn btn-cv1">Login</button></div>
                                <div class="hidden-xs">
                                    <div class="col-lg-1 ortext">or</div>
                                    <div class="col-lg-4 signuptext"><a href="<?php echo e(route('register')); ?>">Sign Up</a></div>
                                </div>
                            </div>
                            <div class="row hidden-xs">
                                <div class="col-lg-12 forgottext">
                                    <a href="<?php echo e(route('password.request')); ?>">Forgot Username or Password?</a>
                                </div>
                            </div>
                            <div class="row visible-xs">
                                <div class="col-xs-6">
                                    <div class="forgottext"><a href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="signuptext text-right"><a href="<?php echo e(route('register')); ?>">Sign Up</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/auth/login.blade.php ENDPATH**/ ?>