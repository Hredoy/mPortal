<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="<?php echo e(route('home')); ?>" class="header-logo">
            <img src="<?php echo e($settings->logo); ?>" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-primary text-uppercase"><?php echo e(($settings->app_name)? $settings->app_name : config('app_name')); ?></span>
            </div>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                <li class="<?php echo e(Request::is('admin/home')? 'active' : null); ?>"><a href="<?php echo e(route('public.home')); ?>" class="iq-waves-effect"><i
                            class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
                </li>
                <li class="<?php echo e((Request::is('roles') || Request::is('permissions') || Request::is('users*'))? 'active active-menu' : null); ?>">
                    <a href="#pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="<?php echo e((Request::is('roles') || Request::is('permissions') || Request::is('users*'))? 'true' : 'false'); ?>"><i
                            class="las la-file-alt iq-arrow-left"></i><span>Authentication</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="pages" class="iq-submenu collapse <?php echo e((Request::is('roles') || Request::is('permissions') || Request::is('users*'))? 'show' : null); ?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php echo e((Request::is('roles') || Request::is('permissions')) ? 'active' : null); ?>"><a href="<?php echo e(route('laravelroles::roles.index')); ?>"><i class="las la-user"></i>Role Management</a></li>
                        <li class="<?php echo e(Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null); ?>"><a href="<?php echo e(url('/users')); ?>"><i class="las la-users"></i>Users Management</a></li>
                        <li class="<?php echo e(Request::is('users/create') ? 'active' : null); ?>"><a href="<?php echo e(url('/users/create')); ?>"><i class="las la-plus"></i>Add New User</a></li>
                    </ul>
                </li>
                <!-- Category -->
                
                <!-- Menu -->
                <li class="<?php echo e(Request::is('admin/menu*')? 'active active-menu' : null); ?>">
                    <a href="#menu" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="<?php echo e(Request::is('admin/menu*')? 'true' : 'false'); ?>"><i class="las la-list-ul"></i><span>Menu</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="menu" class="iq-submenu collapse <?php echo e(Request::is('admin/menu*')? 'show' : null); ?>" data-parent="#iq-sidebar-toggle">
                        <li class="<?php echo e(Request::is('admin/menu/create')? 'active' : null); ?>"><a href="<?php echo e(Route('public.menu.create')); ?>"><i class="las la-user-plus"></i>Add Menu</a></li>
                        <li class="<?php echo e(Request::is('admin/menu')? 'active' : null); ?>"><a href="<?php echo e(Route('public.menu.index')); ?>"><i class="las la-eye"></i>Menu List</a></li>
                    </ul>
                </li>
                <li class="<?php echo e((Request::is('roles') || Request::is('permissions') || Request::is('users*'))? 'active active-menu' : null); ?>">
                    <a href="<?php echo e(Route('site.settings')); ?>" class="iq-waves-effect"><i class="las la-tools"></i><span>Site Settings</span></a>
                </li>
                <?php endif; ?>
                <li class="<?php echo e(Request::is('admin/upload')? 'active' : null); ?>">
                    <a href="<?php echo e(Route('public.upload')); ?>" class="iq-waves-effect"><i class="las la-upload"></i><span>Upload Content</span></a>
                </li>
                <li class="<?php echo e(Request::is('admin/music')? 'active' : null); ?>">
                    <a href="<?php echo e(Route('public.music')); ?>" class="iq-waves-effect"><i class="las la-music"></i><span>Music List</span></a>
                </li>
                <li class="<?php echo e(Request::is('admin/talent')? 'active' : null); ?>">
                    <a href="<?php echo e(Route('public.talent')); ?>" class="iq-waves-effect"><i class="las la-brain"></i><span>Talent List</span></a>
                </li>
                <li class="<?php echo e(Request::is('admin/comedy')? 'active' : null); ?>">
                    <a href="<?php echo e(Route('public.comedy')); ?>" class="iq-waves-effect"><i class="las la-smile"></i><span>Comedy List</span></a>
                </li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="iq-waves-effect"><i class="ri-login-box-line"></i><span>Sign out</span></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php /**PATH C:\laragon\www\2spiceart\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>