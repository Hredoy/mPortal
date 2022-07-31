

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
                        <?php echo Form::open(array('route' => 'videos.store', 'method' => 'POST', 'role' => 'form','enctype' =>'multipart/form-data' ,'class' => 'needs-validation')); ?>

                            <?php echo csrf_field(); ?>

                 

                            <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('Video Title', trans('Video Title'), array('class' => 'col-md-3 control-label')); ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('Video Name'))); ?>

                                     
                                    </div>
                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                         
                            <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('last_name', trans('Thumbnail Image'), array('class' => 'col-md-3 control-label')); ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::file('thumbnail_image', NULL, array('id' => 'thumbnail_image', 'class' => 'form-control', 'placeholder' => trans('Thumbnail Image'))); ?>

                                  
                                    </div>
                                    <?php if($errors->has('last_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group has-feedback row <?php echo e($errors->has('role') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('role', trans('Category'), array('class' => 'col-md-3 control-label')); ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <select class="custom-select form-control" name="category_id" id="category_id">
                                            <option value=""><?php echo e(trans('Select Category')); ?></option>
                                            <?php if($cagegories): ?>
                                                <?php $__currentLoopData = $cagegories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                     
                                    </div>
                                    <?php if($errors->has('role')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category_id')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group has-feedback row <?php echo e($errors->has('video') ? ' has-error ' : ''); ?>">
                                <?php echo Form::label('last_name', trans('Upload Video'), array('class' => 'col-md-3 control-label')); ?>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <?php echo Form::file('video', NULL, array('id' => 'video', 'class' => 'form-control', 'placeholder' => trans('Upload Video'))); ?>

                                  
                                    </div>
                                    <?php if($errors->has('video')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('video')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                     
                          
                            <?php echo Form::button(trans('Create a Video'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )); ?>

                        <?php echo Form::close(); ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mPortal\resources\views/videomanagement/create-video.blade.php ENDPATH**/ ?>