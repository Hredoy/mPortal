

<?php $__env->startSection('template_title'); ?>
<?php echo trans($page_title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <?php echo trans($page_title); ?>

                        <div class="pull-right">
                            <a href="<?php echo e(route('videos')); ?>" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('usersmanagement.tooltips.back-users')); ?>">
                                <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                <?php echo trans('Back to Videos'); ?>

                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('videos.update',$category->id)); ?>" accept-charset="UTF-8" role="form" enctype="multipart/form-data" class="needs-validation" file="true">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Video Title</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="name" placeholder="Video Name" name="name" type="text" class="form-control" value="<?php echo e(old('name', $category->category_name)); ?>"></div>
                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group has-feedback row"><label for="last_name" class="col-md-3 control-label">Thumbnail Image</label>
                            <div class="col-md-9">
                                <input class="form-control form-control-sm" id="thumbnail_image" type="file" name="thumbnail_image"> <?php if($errors->has('thumbnail_image')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('thumbnail_image')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <div class="col-md-9">
                                    <img src="<?php echo e(asset('/category/'.Auth::user()->name.'/images/'.$category->thumbnail_image)); ?>" class="msg-photo" alt="" style="width: 150px; height:100px;" />
                                </div>
                            </div>
                           
                        </div>
                        









                        <button type="submit" class="btn btn-success margin-bottom-1 mb-1 float-right">Update Video</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\pro-4\mPortal\resources\views/backend/category/edit.blade.php ENDPATH**/ ?>