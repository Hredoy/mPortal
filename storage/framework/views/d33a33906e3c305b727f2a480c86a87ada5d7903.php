
<?php $__env->startSection('second_navbar'); ?>
    <?php echo $__env->make('frontend.partials.second_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_section'); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Updates from Subscriptions -->
                
                <!-- /Updates from Subscriptions -->
                <!-- Featured Videos -->
                <div class="content-block head-div">
                    <div class="cb-header">
                        <div class="row">
                            <div class="col-lg-10 col-sm-10 col-xs-8">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#" class="color-active">
                                            <span class="visible-xs">Featured</span>
                                            <span class="hidden-xs">Featured Videos</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="cb-content videolist">
                        <div class="row">
                            <?php $__currentLoopData = $uploads->where('featured', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-sm-6 videoitem mx-2">
                                <div class="b-video">
                                    <div class="v-img">
                                        <a href="<?php echo e(route('singleVideo', $item->id)); ?>"><img src="<?php echo e(asset($item->thumbnail_image)); ?>" alt="" width="100%" height="215px" class="ls_obj-cover"></a>
                                        <div class="time"><?php echo e($item->upload_duration); ?></div>
                                    </div>
                                    <div class="ls_height-1 v-desc">
                                        <a href="<?php echo e(route('singleVideo', $item->id)); ?>"><?php echo e(substr($item->name,0, 50)."..."); ?></a>
                                    </div>
                                    <div class="v-views">
                                        <?php echo e($item->view); ?> views.
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <!-- /Featured Videos -->

                <!-- New Videos in Current Region -->
                
                <!-- /New Videos in Current Region -->

                <!-- Popular Playlists -->
                
                <!-- /Popular Playlists -->

                <!-- Popular Channels -->
                
                <!-- /Popular Channels -->

                <!-- pagination -->
                
                <!-- /pagination -->

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/frontend/categories/music.blade.php ENDPATH**/ ?>