

<!-- header area  -->
<header class="ls_bg-dark ls_header">
    <div class="container-fluid">
        <div class="row ls_d-flex ls_align-center">
            <!-- left area  -->
            <div class="col-xs-5 ls_d-flex ls_align-center">
                <div class="ls_logo">
                    <!-- logo -->
                    <a class="" href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e($settings->logo); ?>" alt="<?php echo e($settings->app_name); ?>" class="img-responsive" />
                        <span><?php echo e($settings->app_name ? $settings->app_name : config('app_name')); ?></span>
                    </a>
                </div>

                <!-- menu  -->
                <div class="ls_w-100 ls_d-flex ls_justify-center">
                    <ul class="list-inline menu ls_m-0 ls_menu ls_d-md-none">
                        <li class="<?php echo e(Request::is('music') ? 'color-active' : null); ?>">
                            <a href="<?php echo e(route('music')); ?>">Music</a>
                        </li>
                        <li class="<?php echo e(Request::is('comedy') ? 'color-active' : null); ?>">
                            <a href="<?php echo e(route('comedy')); ?>">Comedy</a>
                        </li>
                        <li class="<?php echo e(Request::is('talent') ? 'color-active' : null); ?>">
                            <a href="<?php echo e(route('talent')); ?>">Talents</a>
                        </li>
                        <li class="<?php echo e(Request::is('contact') ? 'color-active' : null); ?>">
                            <a href="<?php echo e(route('contactPage')); ?>">Contact</a>
                        </li>
                        <?php if(count($contents->where('type', 1)->where('status', 1)) > 0): ?>
                        <li>
                            <a href="#">More</a>
                            <ul class="ls_dynamic-menu">
                                <?php $__currentLoopData = $contents->where('type', 1)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($content->link); ?>"><?php echo e($content->name); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- middle area  -->
            <div class="col-xs-4">
                <form action="<?php echo e(route('search')); ?>" method="get" class="ls_d-md-none">
                    <div class="topsearch ls_m-0">
                        <i class="cv cvicon-cv-cancel topsearch-close"></i>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search ls_color-primary"></i></span>
                            <input type="text" name="keyword"
                                <?php if(isset($_GET['keyword'])): ?> value="<?php echo e($_GET['keyword']); ?>" <?php endif; ?>
                                class="form-control" placeholder="Search for artists, song, albums!" aria-describedby="sizing-addon2">
                            <div class="input-group-btn">
                                <div type="text" class="btn btn-default"></div>
                            </div><!-- /btn-group -->
                        </div>
                    </div>
                </form>
                <div id="searchResultDiv" class="ls_d-md-none" style="position: absolute;z-index:1; width:95%">

                </div>
            </div>

            <!-- right area  -->
            <div class="col-xs-3 ls_d-flex ls_justify-end">
                <div class="ls_d-flex ls_align-center ls_d-md-none">
                    <ul class="list-inline menu ls_m-0 ls_menu ls_text-white">
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="ls_px-0"><a href="<?php echo e(route('login')); ?>" class="ls_px-0 ls_fw-600">Sign In</a>
                            </li>
                            <li class="ls_px-0">
                                <span>/</span>
                            </li>
                            <li class="ls_px-0"><a href="<?php echo e(route('register')); ?>" class="ls_px-0 ls_fw-600">Sign
                                    up</a></li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('public.home')); ?>" class="ls_px-0  ls_fw-600">Dashboard</a>
                            </li>
                            <li class="ls_px-0">
                                <span>/</span>
                            </li>
                            <li><a href="<?php echo e(route('logout')); ?>" class="ls_px-0  ls_fw-600"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                    out</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        <?php endif; ?>
                        <?php $__currentLoopData = $contents->where('type', 3)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($content->link); ?>"><?php echo e($content->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(Route('public.upload')); ?>" class="ls_btn ls_btn-upload">
                            <img src="<?php echo e(asset('assets/frontend/images/upload.svg')); ?>" alt="upload">
                        </a>
                        <?php endif; ?>
                    </ul>

                    <div class="avatar ls_p-0">
                        <?php if(auth()->guard()->guest()): ?>
                            <img src="<?php echo e(asset('assets/frontend/images/user.svg')); ?>" alt="avatar" class="ls_avatar-icon" />
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <img src="<?php if(Auth::user()->profile && Auth::user()->profile->avatar_status == 1): ?> <?php echo e(Auth::user()->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get(Auth::user()->email)); ?> <?php endif; ?>"
                                alt="<?php echo e(Auth::user()->name); ?>" height="44px" width="100%" class="user-logo" />
                            <span class="status"></span>
                        <?php endif; ?>
                    </div>

                    <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(Route('public.upload')); ?>" class="ls_btn">
                        <img src="<?php echo e(asset('assets/frontend/images/upload.svg')); ?>" alt="upload">
                        Upload
                    </a>
                    <?php endif; ?>
                </div>

                <a href="javascript:void(0)" id="ls_search-btn" class="ls_d-none ls_d-md-block ls_text-white ls_mr-10"><i class="fa fa-search ls_color-primary"></i></a>
                <a href="<?php echo e(route('home')); ?>" class="btn-menu-toggle ls_m-0 ls_d-none ls_d-md-block ls_text-white"><i class="cv cvicon-cv-menu"></i></a>
            </div>

        </div>
    </div>
</header>

<div class="container-fluid ls_mob-search ls_visible-hidden-mob" id="ls_form-expand">
    <form action="<?php echo e(route('search')); ?>" method="get">
        <div class="topsearch ls_m-0">
            <i class="cv cvicon-cv-cancel topsearch-close"></i>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search ls_color-primary"></i></span>
                <input type="text" name="keyword"
                    <?php if(isset($_GET['keyword'])): ?> value="<?php echo e($_GET['keyword']); ?>" <?php endif; ?>
                    class="form-control" placeholder="Search for artists, song, albums!" aria-describedby="sizing-addon2">
                <div class="input-group-btn">
                    <div type="text" class="btn btn-default"></div>
                </div><!-- /btn-group -->
            </div>
        </div>
    </form>
    <div id="searchResultDiv2"></div>
</div>
<?php /**PATH D:\laragon\www\2spiceart\resources\views/frontend/partials/navbar.blade.php ENDPATH**/ ?>