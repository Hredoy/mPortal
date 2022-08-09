<div class="container-fluid">
   <div class="row">
       <div class="btn-color-toggle">
           <img src="<?php echo e(asset('assets/frontend/images/icon_bulb_light.png')); ?>" alt="">
       </div>
       <div class="navbar-container">
           <div class="container">
               <div class="row">
                   <div class="col-xs-3 visible-xs">
                       <a href="<?php echo e(route('home')); ?>" class="btn-menu-toggle"><i class="cv cvicon-cv-menu"></i></a>
                   </div>
                   <div class="col-lg-1 col-sm-2 col-xs-6">
                       <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                           <img src="<?php echo e(asset('assets/frontend/images/logo.svg')); ?>" alt="Project name" class="logo" />
                           <span><?php echo e(config('app.name')); ?></span>
                       </a>
                   </div>
                   <div class="col-lg-3 col-sm-10 hidden-xs">
                       <ul class="list-inline menu">
                           <li class="<?php echo e(Request::is('music') ? 'color-active': null); ?>"><a href="<?php echo e(route('music')); ?>">Music</a></li>
                           <li class="<?php echo e(Request::is('comedy') ? 'color-active': null); ?>"><a href="<?php echo e(route('comedy')); ?>">Comedy</a></li>
                           <li class="<?php echo e(Request::is('talent') ? 'color-active': null); ?>"><a href="<?php echo e(route('talent')); ?>">Talents</a></li>
                           <li>
                            <a href="#">More</a>
                            <ul>
                                <?php $__currentLoopData = $contents->where('type', 1)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($content->link); ?>"><?php echo e($content->name); ?> </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                       </ul>
                   </div>
                   <div class="col-lg-6 col-sm-8 col-xs-3">
                       <form action="search.html" method="post">
                           <div class="topsearch">
                               <i class="cv cvicon-cv-cancel topsearch-close"></i>
                               <div class="input-group">
                                   <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
                                   <input type="text" class="form-control" placeholder="Search" aria-describedby="sizing-addon2">
                                   <div class="input-group-btn">
                                       <div type="text" class="btn btn-default"><i class="cv cvicon-cv-video-file"></i>&nbsp;&nbsp;&nbsp;</div>
                                       
                                   </div><!-- /btn-group -->
                               </div>
                           </div>
                       </form>
                   </div>
                   <div class="col-lg-2 col-sm-4 hidden-xs">
                       <div class="avatar pull-left">
                        <?php if(auth()->guard()->guest()): ?>
                            <img src="<?php echo e(asset('assets/frontend/images/avatar.png')); ?>" alt="avatar" />
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                           <img src="<?php if(Auth::user()->profile && Auth::user()->profile->avatar_status == 1): ?> <?php echo e(Auth::user()->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get(Auth::user()->email)); ?> <?php endif; ?>" alt="<?php echo e(Auth::user()->name); ?>" height="44px" width="100%" class="user-logo"/>
                        <?php endif; ?>
                           <span class="status"></span>
                       </div>
                       <div class="selectuser pull-left">
                           <div class="btn-group pull-right dropdown">
                               <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php if(auth()->guard()->check()): ?>
                                    <?php echo e(Auth::user()->name); ?>

                                <?php endif; ?>

                                   <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu">
                                <?php if(auth()->guard()->guest()): ?>
                                   <li><a href="<?php echo e(route('login')); ?>">Sign In</a></li>
                                   <li><a href="<?php echo e(route('register')); ?>">Sign up</a></li>
                                <?php endif; ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <li><a href="<?php echo e(route('public.home')); ?>">Dashboard</a></li>
                                    <li><a href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                <?php endif; ?>
                                <?php $__currentLoopData = $contents->where('type', 3)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e($content->link); ?>"><?php echo e($content->name); ?> </a>
                                        </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </ul>
                           </div>
                       </div>
                       <div class="clearfix"></div>
                   </div>
               </div>
               <div class="hidden-xs">
                   <a href="<?php echo e(Route('public.upload')); ?>">
                       <div class="upload-button">
                           <i class="cv cvicon-cv-upload-video"></i>
                       </div>
                   </a>
               </div>
           </div>
       </div>
   </div>
</div>
<?php /**PATH D:\laragon\www\2spiceart\resources\views/frontend/partials/navbar.blade.php ENDPATH**/ ?>