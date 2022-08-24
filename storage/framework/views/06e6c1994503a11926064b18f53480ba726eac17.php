<div class="mobile-menu">
    <div class="mobile-menu-head ls_bg-dark">
        <a href="#" class="mobile-menu-close"></a>
        <a class="navbar-brand" href="/">
            <img src="<?php echo e($settings->logo); ?>" alt="Project name" class="" />
            <span><?php echo e(($settings->app_name)? $settings->app_name : config('app_name')); ?></span>
        </a>
        <div class="mobile-menu-btn-color">
            <img src="<?php echo e(asset('assets/frontend/images/icon_bulb_light.png')); ?>" alt="">
        </div>
    </div>
    <div class="mobile-menu-content">
        <div class="mobile-menu-user">
            <div class="mobile-menu-user-img">
                <?php if(auth()->guard()->guest()): ?>
                    <img src="<?php echo e(asset('assets/frontend/images/ava11.png')); ?>" alt="">
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <img src="<?php if(Auth::user()->profile && Auth::user()->profile->avatar_status == 1): ?> <?php echo e(Auth::user()->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get(Auth::user()->email)); ?> <?php endif; ?>"
                        alt="<?php echo e(Auth::user()->name); ?>" height="44px" width="100%" class="user-logo">
                <?php endif; ?>
            </div>
            <p>
                <?php if(auth()->guard()->check()): ?>
                    <?php echo e(Auth::user()->name); ?>

                <?php endif; ?>
            </p>
            <span class="caret"></span>
            <div class="selectuser pull-left">
                <div class="btn-group pull-right dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    </button>
                    <ul class="dropdown-menu">
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Sign In</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Sign up</a></li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('public.home')); ?>">Dashboard</a></li>
                        <?php endif; ?>
                            <?php $__currentLoopData = $contents->where('type', 3)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($content->link); ?>"><?php echo e($content->name); ?> </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <a href="<?php echo e(Route('public.upload')); ?>" class="btn ls_bg-primary mobile-menu-upload">
            <i class="cv cvicon-cv-upload-video"></i>
            <span>Upload Video</span>
        </a>
        <div class="mobile-menu-list">
            <ul>
                
                <li class="<?php echo e(Request::is('music') ? 'color-active': null); ?>">
                    <a href="<?php echo e(Route('music')); ?>">
                        <i class="cv cvicon-cv-play-circle ls_color-primary"></i>
                        <p>Music</p>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('comedy') ? 'color-active': null); ?>">
                    <a href="<?php echo e(Route('comedy')); ?>">
                        <i class="cv cvicon-cv-play-circle ls_color-primary"></i>
                        <p>Comedy</p>
                    </a>
                </li>
                <li class="<?php echo e(Request::is('talent') ? 'color-active': null); ?>">
                    <a href="<?php echo e(Route('talent')); ?>">
                        <i class="cv cvicon-cv-play-circle ls_color-primary"></i>
                        <p>Talent</p>
                    </a>
                </li>
                <?php $__currentLoopData = $contents->where('type', 1)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e($content->link); ?>">
                            <?php echo e($content->icon); ?> 
                            <p> <?php echo e($content->name); ?> </p>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
            </ul>
        </div>
        <?php if(auth()->guard()->guest()): ?>
        <a href="<?php echo e(route('login')); ?>" class="btn mobile-menu-logout">Sign In</a>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn mobile-menu-logout">Sign out</a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        <?php endif; ?>
        
    </div>
</div>
<?php /**PATH D:\laragon\www\2spiceart\resources\views/frontend/partials/mobile_menu.blade.php ENDPATH**/ ?>