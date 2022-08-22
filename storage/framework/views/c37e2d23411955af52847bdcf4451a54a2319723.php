
<?php $__env->startSection('second_navbar'); ?>
    <?php echo $__env->make('frontend.partials.second_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_section'); ?>
<div class="content-wrapper">

    <div class="ls_banner ls_d-flex ls_align-center" style="background-image: url(<?php echo e(asset('assets/frontend/images/banner.jpg')); ?>);">
        <div class="ls_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center ls_text-white">
                    <h2 class="ls_title-big">
                        Let the World Hear You <br>
                        Music, Comedy, Dance, All Forms of Arts and Talents
                    </h2>
                    <div class="clearfix ls_d-flex ls_justify-center ls_py-20">
                        <p class="col-lg-8 ls_fz-18">
                            Happiness is the center of all human endeavor. Good entertainment melts away stiffen sorrow to lift souls. This is why we are here. We want to stretch the limit. <br>
                            SpiceArt is a place for all latent musical talents, comedy, and other forms of arts and entertainment to be seen, enjoyed, and rewarded. <br>
                            We reward artistes (upcoming and established) with 2spice tokens just for uploading their work on our website for the listening/viewing pleasure of our beloved community people. Get paid per like on your post.
                        </p>
                    </div>
                    <div class="clearfix">
                        <a href="<?php echo e(route('register')); ?>" class="ls_btn ls_btn-big">SIGN UP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ls_banner-card">
        <div class="container ls_bg-dark ls_py-20">
            <div class="row ls_d-flex ls_align-center">
                <div class="col-xs-6">
                    <div class="ls_text-white ls_d-flex ls_align-center ls_d-block-mob">
                        <img src="<?php echo e(asset('assets/frontend/images/increasing.svg')); ?>" alt="" class="ls_avatar-icon">
                        <h5>Now Trending</h5>
                    </div>
                </div>
                <div class="col-xs-6 ls_d-flex ls_justify-end">
                    <div>
                        <form action="<?php echo e(route('getlocation')); ?>" method="get">
                            <div class="ls_d-flex ls_align-center">
                                <label for="forCountry" class="ls_text-white ls_m-0 ls_mr-10">Region</label>
                                <select class="form-control ls_btn-select " name="country" style="padding: 0;" id="forCountry"
                                    onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($val); ?>"
                                            <?php if(getLocation() && $val == getLocation()): ?> selected <?php endif; ?>><?php echo e($val); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Featured Videos -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-xs-12 ls_d-flex ls_align-center ls_justify-between">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="ls_color-primary">
                                            <span class="visible-xs">Featured</span>
                                            <span class="hidden-xs">Featured Videos</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="btn-group pull-right">
                                    <a href="javascript:void();" class="btn dropdown-toggle ls_color-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span>Sort By</span>
                                      <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                      <li><a href="<?php echo e(Route("home.latest")); ?>">Latest</a></li>
                                      <li><a href="<?php echo e(Route("home.view")); ?>">Mostly View</a></li>
                                      <li><a href="<?php echo e(Route("home.like")); ?>">Mostly Liked</a></li>
                                    </ul>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $uploads->where('featured', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-3 col-sm-6 videoitem mx-2">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="<?php echo e(route('singleVideo', $item->id)); ?>"><img src="<?php echo e(asset($item->thumbnail_image)); ?>" alt="" width="100%" height="215px" class="ls_obj-cover"></a>
                                        <div class="time"><?php echo e($item->upload_duration); ?></div>
                                    </div>
                                    <div class="ls_height-1 v-desc">
                                        <a href="<?php echo e(route('singleVideo', $item->id)); ?>">
                                            <?php echo e(substr($item->name,0, 50)."..."); ?>

                                        </a>
                                    </div>
                                    <div class="v-views ls_d-flex ls_align-center ls_justify-between">
                                        <?php echo e($item->view); ?> views.
                                        <div class="pull-right">
                                        <?php if($item->user_id == Auth::id()): ?>
                                            <a href="#" disabled class="btn "><i class="fa fa-thumbs-o-up" style="font-size: 1.2em"></i></a>
                                        <?php else: ?>
                                            <?php if(!$item->likes()->where('user_id', Auth::id())->first() ): ?>
                                                <a href="<?php echo e(Route('like', $item->id)); ?>" class="btn "><i class="fa fa-thumbs-o-up" style="font-size: 1.2em"></i></a>
                                            <?php endif; ?>
                                           
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-lg-3 col-sm-6 videoitem mx-2">
                                <div class="b-video">
                                    <p><strong>No Video Available for this Region</strong></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <?php if($others): ?>
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="visible-xs">Others</span>
                                            <span class="hidden-xs">Others Videos</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            <?php $__currentLoopData = $others->where('featured', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-sm-6 videoitem mx-2">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="<?php echo e(route('singleVideo', $item->id)); ?>"><img src="<?php echo e(asset($item->thumbnail_image)); ?>" alt="" width="100%" height="215px" class="ls_obj-cover"></a>
                                        <div class="time"><?php echo e($item->upload_duration); ?></div>
                                    </div>
                                    <div class="ls_height-1 v-desc">
                                        <a href="<?php echo e(route('singleVideo', $item->id)); ?>">
                                            <?php echo e(substr($item->name,0, 50)."..."); ?>

                                        </a>
                                    </div>
                                    <div class="v-views ls_d-flex ls_align-center ls_justify-between">
                                        <?php echo e($item->view); ?> views.
                                        
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <!-- /Featured Videos -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/frontend/homepage.blade.php ENDPATH**/ ?>