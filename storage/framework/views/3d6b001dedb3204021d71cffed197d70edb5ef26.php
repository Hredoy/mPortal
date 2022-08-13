<?php
use Monarobase\CountryList\CountryListl;
$countries = Countries::getList('en', 'json');

?>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="container padding-def">
                <div class="col-lg-1  col-sm-2 col-xs-12 footer-logo">
                    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e($settings->logo); ?>" alt="<?php echo e($settings->app_name); ?>" class="logo" />
                        <span><?php echo e(($settings->app_name)? $settings->app_name : config('app.name')); ?></span>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-6 col-xs-12">
                    <div class="f-links">
                        <ul class="list-inline">
                            <?php $__currentLoopData = $contents->where('type', 2)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($content->link); ?>"><?php echo e($content->name); ?> </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="delimiter"></div>
                </div>
                <div class="col-lg-7 col-sm-6 col-xs-12">
                    <div class="f-copy">
                        <ul class="list-inline">
                            <li><?php echo e($settings->footer_text); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-3 col-sm-4 col-xs-12">
                    <div class="f-last-line">
                        <div class="f-icon pull-left">
                            <?php $__currentLoopData = $contents->where('type', 2)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a
                                    href="<?php echo e($content->link); ?>"><?php echo e($content->icon ? $content->icon : $content->name); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="f-lang pull-right">
                            <!-- Small button group -->
                            <div class="btn-group dropup pull-right">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Library <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="cv cvicon-cv-calender"></i> Latest</a></li>
                                    <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Mostly Viewed</a></li>
                                    <li><a href="#"><i class="cv cvicon-cv-star"></i> Mostly Liked</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="f-last-line">
                        <div class="f-lang pull-right">
                            <!-- Small button group -->
                            <form action="<?php echo e(route('getlocation')); ?>" method="get">
                                <label for="forCountry">Region</label>
                                <select class="form-control" name="country" style="padding: 0;" id="forCountry"
                                    onchange="this.form.submit()">
                                    <option value="">All</option>
                                    <?php $__currentLoopData = json_decode($countries); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($val); ?>"
                                            <?php if(getLocation() && $val == getLocation()): ?> selected <?php endif; ?>><?php echo e($val); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="delimiter visible-xs"></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH D:\laragon\www\2spiceart\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>