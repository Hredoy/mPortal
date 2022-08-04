<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html" class="header-logo">
            <img src="<?php echo e(asset('assets/frontend/../assets/images/logo.png')); ?>" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-primary text-uppercase"><?php echo e(config('app.name')); ?></span>
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
                <li><a href="<?php echo e(url('/')); ?>" class="text-primary"><i class="ri-arrow-right-line"></i><span>Visit
                            site</span></a></li>
                <li class="active active-menu"><a href="<?php echo e(route('public.home')); ?>" class="iq-waves-effect"><i
                            class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
                </li>
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                <li>
                    <a href="#pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                            class="las la-file-alt iq-arrow-left"></i><span>Authentication</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="sign-in.html"><i class="las la-sign-in-alt"></i>Login</a></li>
                        <li><a href="sign-up.html"><i class="ri-login-circle-line"></i>Register</a></li>
                        <li><a href="pages-recoverpw.html"><i class="ri-record-mail-line"></i>Recover Password</a></li>
                        <li><a href="pages-confirm-mail.html"><i class="ri-file-code-line"></i>Confirm Mail</a></li>
                        <li><a href="pages-lock-screen.html"><i class="ri-lock-line"></i>Lock Screen</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#category" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="las la-list-ul"></i><span>Category</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="<?php echo e(Route('categories.create')); ?>"><i class="las la-user-plus"></i>Add Category</a></li>
                        <li><a href="<?php echo e(Route('categories')); ?>"><i class="las la-eye"></i>Category List</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <li>
                    <a href="<?php echo e(Route('public.upload')); ?>" class="iq-waves-effect"><i class="las la-upload"></i><span>Upload Content</span></a>
                </li>
                <li>
                    <a href="<?php echo e(Route('public.music')); ?>" class="iq-waves-effect"><i class="las la-music"></i><span>Music List</span></a>
                </li>
                <li>
                    <a href="<?php echo e(Route('public.talent')); ?>" class="iq-waves-effect"><i class="las la-brain"></i><span>Talent List</span></a>
                </li>
                <li>
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
<?php /**PATH C:\xampp\htdocs\mPortal\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>