

<?php $__env->startSection('template_title'); ?>
<?php echo trans($page_title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
<?php if(config('videosmanagement.enabledDatatablesJs')): ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(config('videosmanagement.datatablesCssCDN')); ?>">
<?php endif; ?>
<style type="text/css" media="screen">
    .videos-table {
        border: 0;
    }

    .videos-table tr td:first-child {
        padding-left: 15px;
    }

    .videos-table tr td:last-child {
        padding-right: 15px;
    }

    .videos-table.table-responsive,
    .videos-table.table-responsive table {
        margin-bottom: 0;
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">

                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            <?php echo trans($page_title); ?>

                        </span>

                        <div class="btn-group pull-right btn-group-xs">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                <span class="sr-only">
                                    Hello</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo e(route('videos.create')); ?>">
                                    <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                    <?php echo trans('Add New Video'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <?php if(config('videosmanagement.enableSearchvideos')): ?>
                    <?php echo $__env->make('partials.search-videos-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <div class="table-responsive videos-table">
                        <table class="table table-striped table-sm data-table">
                            <caption id="video_count">
                                <?php echo e(trans_choice('videosmanagement.videos-table.caption', 1, ['videoscount' => $videos->count()])); ?>

                            </caption>
                            <thead class="thead">
                                <tr>
                                    <th><?php echo trans('SL'); ?></th>
                                    <th><?php echo trans('Name'); ?></th>
                                    <th class="hidden-xs"><?php echo trans('Category'); ?></th>
                                    <th class="hidden-xs"><?php echo trans('Status'); ?></th>
                                    <th class="hidden-xs"><?php echo trans('Thumbnail'); ?></th>
                                    <th class="hidden-sm hidden-xs hidden-md"><?php echo trans('Video'); ?></th>
                                    <th><?php echo trans('Created'); ?></th>
                                    <th><?php echo trans('Updated'); ?></th>
                                    <th colspan="5"><?php echo trans('Action'); ?></th>
                                    <th class="no-search no-sort"></th>
                                    <th class="no-search no-sort"></th>
                                </tr>
                            </thead>
                            <tbody id="videos_table">
                                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($video->id); ?></td>
                                    <td><?php echo e($video->name); ?></td>
                                    <td class="hidden-xs"><?php echo e($video->category_id); ?></td>
                                    <td class="hidden-xs">
                                        <?php if($video->status == '1'): ?>
                                        <span class="badge badge-success">Active</span>
                                        <?php else: ?>
                                        <span class="badge badge-warning">Deactive</span>
                                        <?php endif; ?>

                                    </td>
                                    <td class="hidden-sm hidden-xs hidden-md"><img src="<?php echo e($video->thumbnail_image); ?>" class="msg-photo" alt="" style="width: 70px; height:40px;" /></td>
                                    </td>
                                    <td class="hidden-sm hidden-xs hidden-md">
                                        <video width="320" height="100" controls>
                                            <source src="<?php echo e($video->video); ?>" type="video/mp4"> </video>
                                    </td>
                                    <td class="hidden-sm hidden-xs hidden-md"><?php echo e($video->created_at); ?></td>
                                    <td class="hidden-sm hidden-xs hidden-md"><?php echo e($video->updated_at); ?></td>
                                    <td><a href="http://127.0.0.1:8000/roles/1/edit" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-secondary btn-block"><span class="hidden-xs hidden-sm">Edit </span></a>
                                        <button type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete the Video" data-message="Are you sure you want to delete this video?" class="btn btn-block btn-outline-danger btn-sm" style="width: 100%;"><span class="hidden-xs hidden-sm">Delete </span></button>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tbody id="search_results"></tbody>
                            <?php if(config('videosmanagement.enableSearchvideos')): ?>
                            <tbody id="search_results"></tbody>
                            <?php endif; ?>

                        </table>

                        <?php if(config('videosmanagement.enablePagination')): ?>
                        <?php echo e($videos->links()); ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php if((count($videos) > config('videosmanagement.datatablesJsStartCount')) && config('videosmanagement.enabledDatatablesJs')): ?>
<?php echo $__env->make('scripts.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('scripts.delete-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('scripts.save-modal-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(config('videosmanagement.tooltipsEnabled')): ?>
<?php echo $__env->make('scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php if(config('videosmanagement.enableSearchvideos')): ?>
<?php echo $__env->make('scripts.search-videos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mPortal\resources\views/videomanagement/show-video.blade.php ENDPATH**/ ?>