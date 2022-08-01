

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
                                <a class="dropdown-item" href="<?php echo e(route('categories.create')); ?>">
                                    <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                    <?php echo trans('Add New Category'); ?></a>
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
                                <?php echo e(trans_choice('videosmanagement.videos-table.caption', 1, ['videoscount' => $categories->count()])); ?>

                            </caption>
                            <thead class="thead">
                                <tr>
                                    <th><?php echo trans('SL'); ?></th>
                                    <th><?php echo trans('Name'); ?></th>
                                    <th class="hidden-xs"><?php echo trans('Category'); ?></th>
                                    <th class="hidden-xs"><?php echo trans('Status'); ?></th>
                                    <th class="hidden-xs"><?php echo trans('Thumbnail'); ?></th>
                                    <th class=""><?php echo trans('Video'); ?></th>
                                    <th><?php echo trans('Created'); ?></th>
                                    <th><?php echo trans('Updated'); ?></th>
                                    <th colspan="5"><?php echo trans('Action'); ?></th>
                                    <th class="no-search no-sort"></th>
                                    <th class="no-search no-sort"></th>
                                </tr>
                            </thead>
                            <tbody id="videos_table">
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td class="hidden-xs"><?php echo e($category->category_name); ?></td>
                                    <td class="hidden-xs">
                                        <?php if($category->status == '1'): ?>
                                        <span class="badge badge-success">Active</span>
                                        <?php else: ?>
                                        <span class="badge badge-warning">Deactive</span>
                                        <?php endif; ?>

                                    
                                    <td class="hidden-sm hidden-xs hidden-md"><?php echo e($category->created_at); ?></td>
                                    <td class="hidden-sm hidden-xs hidden-md"><?php echo e($category->updated_at); ?></td>
                                    <td><a href="<?php echo e(route('categories.edit',$category->id)); ?>" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-secondary btn-block"><span class="hidden-xs hidden-sm">Edit </span></a>
                                        <button type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete the Video" data-message="Are you sure you want to delete this video?" class="btn btn-block btn-outline-danger btn-sm" style="width: 100%;"><span class="hidden-xs hidden-sm">Delete </span></button>

                                    </td>
                                </tr>
                            <tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">
                                        <?php echo e(trans($empty_message)); ?></td>
                                </tr>
                            </tbody>
                            <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('modals.modal-delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php if((count($categories) > config('videosmanagement.datatablesJsStartCount')) && config('videosmanagement.enabledDatatablesJs')): ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\pro-4\mPortal\resources\views/backend/category/index.blade.php ENDPATH**/ ?>