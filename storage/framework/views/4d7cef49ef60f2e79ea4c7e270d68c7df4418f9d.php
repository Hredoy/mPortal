<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
       <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="iq-menu-bt d-flex align-items-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
             </div>
             <div class="iq-navbar-logo d-flex justify-content-between">
                <a href="<?php echo e(route('home')); ?>" class="header-logo">
                   <img src="<?php echo e($settings->logo); ?>" class="img-fluid rounded-normal" alt="">
                   <div class="logo-title">
                      <span class="text-primary text-uppercase"><?php echo e(($settings->app_name)? $settings->app_name : config('app.name')); ?></span>
                   </div>
                </a>
             </div>
          </div>
          <div class="iq-search-bar ml-auto">
             
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
             <i class="ri-menu-3-line"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ml-auto navbar-list">
                <!-- search -->
                
                <!--  Notifications -->
                
                <!--  Messages -->
                
                <?php if(auth()->guard()->check()): ?>
                    
                <?php endif; ?>
                <li class="line-height pt-3">
                   <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                      <img src="<?php if(Auth::user()->profile && Auth::user()->profile->avatar_status == 1): ?> <?php echo e(Auth::user()->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get(Auth::user()->email)); ?> <?php endif; ?>" alt="<?php echo e(Auth::user()->name); ?>"" class="img-fluid rounded-circle mr-3">
                   </a>
                   <div class="iq-sub-dropdown iq-user-dropdown">
                      <div class="iq-card shadow-none m-0">
                         <div class="iq-card-body p-0 ">
                            <div class="bg-primary p-3">
                               <h5 class="mb-0 text-white line-height">Hello <?php echo e(Auth::user()->name); ?></h5>
                               <span class="text-white font-size-12">Available</span>
                            </div>
                            <a href="<?php echo e(url('/profile/' . Auth::user()->name)); ?>" class="iq-sub-card iq-bg-primary-hover">
                               <div class="media align-items-center">
                                  <div class="rounded iq-card-icon iq-bg-primary">
                                     <i class="ri-file-user-line"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">My Profile</h6>
                                     <p class="mb-0 font-size-12">View personal profile details.</p>
                                  </div>
                               </div>
                            </a>
                            <a href="<?php echo e(url('/profile/' . Auth::user()->name) . '/edit'); ?>" class="iq-sub-card iq-bg-primary-hover">
                               <div class="media align-items-center">
                                  <div class="rounded iq-card-icon iq-bg-primary">
                                     <i class="ri-profile-line"></i>
                                  </div>
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0 ">Edit Profile</h6>
                                     <p class="mb-0 font-size-12">Modify your personal details.</p>
                                  </div>
                               </div>
                            </a>
                            <div class="d-inline-block w-100 text-center p-3">
                               <a class="bg-primary iq-sign-btn" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                               <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                            </div>
                         </div>
                      </div>
                   </div>
                </li>
             </ul>
          </div>
       </nav>
    </div>
 </div><?php /**PATH D:\laragon\www\2spiceart\resources\views/backend/partials/navbar.blade.php ENDPATH**/ ?>