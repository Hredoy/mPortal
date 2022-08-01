

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
                    <form method="POST" action="<?php echo e(route('videos.update',$video->id)); ?>" accept-charset="UTF-8" role="form" enctype="multipart/form-data" class="needs-validation" file="true">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Video Title</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="name" placeholder="Video Name" name="name" type="text" class="form-control" value="<?php echo e(old('name', $video->name)); ?>"></div>
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
                                    <img src="<?php echo e(asset('/video-audio/'.Auth::user()->name.'/images/'.$video->thumbnail_image)); ?>" class="msg-photo" alt="" style="width: 150px; height:100px;" />
                                </div>
                            </div>
                           
                        </div>
                        <div class="form-group has-feedback row"><label for="role" class="col-md-3 control-label">Category</label>
                            <div class="col-md-9">
                                <div class="input-group"><select name="category_id" id="category_id" class="custom-select form-control">
                                        <option value="">Select Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cate->id); ?>" <?php echo e($cate->id == $video->category_id ? 'selected':''); ?>><?php echo e($cate->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select></div>
                                <?php if($errors->has('category_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('category_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <div class="col-md-9">
                                    <video width="320" height="100" controls>
                                        <source src="<?php echo e(asset('/video-audio/'.Auth::user()->name.'/video/'.$video->video_audio)); ?>" type="video/mp4"> </video>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback row"><label for="last_name" class="col-md-3 control-label">Upload Video/Audio</label>
                            <div class="col-md-9">
                                <input class="form-control form-control-sm" id="video" type="file" name="video">
                                <?php if($errors->has('video')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('video')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Relese Date</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input id="" placeholder="Release Date" name="release_date" type="date" class="form-control" value="<?php echo e(old('release_date', $video->release_date)); ?>"></div>
                                <?php if($errors->has('release_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('release_date')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group has-feedback row"><label for="role" class="col-md-3 control-label">Region</label>
                            <div class="col-md-5">
                                <div class="input-group"><select name="region_id" id="region_id" class="custom-select form-control">
                                        <option value="">Select Region</option>
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ctn->id); ?>" <?php echo e($ctn->id == $video->region_id ? 'selected':''); ?>><?php echo e($ctn->iso3); ?> || <?php echo e($ctn->nicename); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select></div>
                                <?php if($errors->has('region_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('region_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group has-feedback row"><label for="Video Title" class="col-md-3 control-label">Video/Audio Duration</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input id="" placeholder="Video/Audio Duration" name="video_duration" type="time" class="form-control" value="<?php echo e(old('video_duration', $video->video_duration)); ?>"></div>
                                <?php if($errors->has('video_duration')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('video_duration')); ?></strong>
                                </span>
                                <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mPortal\resources\views/backend/video-audio/edit.blade.php ENDPATH**/ ?>