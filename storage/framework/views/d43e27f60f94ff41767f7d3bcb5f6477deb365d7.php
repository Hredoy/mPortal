

<?php $__env->startSection(config('laravelblocker.laravelBlockerTitleExtended')); ?>
    <?php echo trans('laravelblocker::laravelblocker.titles.show-blocked-item'); ?>

<?php $__env->stopSection(); ?>

<?php
    switch (config('laravelblocker.blockerBootstapVersion')) {
        case '4':
            $containerClass = 'card';
            $containerHeaderClass = 'card-header bg-warning text-white';
            if(isset($typeDeleted)) {
                $containerHeaderClass = 'card-header bg-danger text-white';
            }
            $containerBodyClass = 'card-body';
            break;
        case '3':
        default:
            $containerClass = 'panel panel-warning';
            if(isset($typeDeleted)) {
                $containerClass = 'panel panel-danger';
            }
            $containerHeaderClass = 'panel-heading';
            $containerBodyClass = 'panel-body';
    }
    $blockerBootstrapCardClasses = (is_null(config('laravelblocker.blockerBootstrapCardClasses')) ? '' : config('laravelblocker.blockerBootstrapCardClasses'));
?>

<?php $__env->startSection(config('laravelblocker.blockerBladePlacementCss')); ?>
    <?php if(config('laravelblocker.blockerEnableFontAwesomeCDN')): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(config('laravelblocker.blockerFontAwesomeCDN')); ?>">
    <?php endif; ?>
    <?php echo $__env->make('laravelblocker::partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelblocker::partials.bs-visibility-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('laravelblocker::partials.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">
                <div class="<?php echo e($containerClass); ?> <?php echo e($blockerBootstrapCardClasses); ?>">
                    <div class="<?php echo e($containerHeaderClass); ?>">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <?php if(isset($typeDeleted)): ?>
                                    <?php echo trans('laravelblocker::laravelblocker.blocked-item-deleted-title', ['name' => $item->value]); ?>

                                <?php else: ?>
                                    <?php echo trans('laravelblocker::laravelblocker.blocked-item-title', ['name' => $item->value]); ?>

                                <?php endif; ?>
                            </span>
                            <div class="pull-right">
                                <?php if(isset($typeDeleted)): ?>
                                    <a href="<?php echo e(url('blocker-deleted')); ?>" class="btn btn-danger text-white btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('laravelblocker::laravelblocker.tooltips.back-blocked-deleted')); ?>">
                                        <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                        <?php echo trans('laravelblocker::laravelblocker.buttons.back-to-blocked-deleted'); ?>

                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('blocker')); ?>" class="btn btn-warning text-white btn-sm float-right" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('laravelblocker::laravelblocker.tooltips.back-blocked')); ?>">
                                        <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                        <?php echo trans('laravelblocker::laravelblocker.buttons.back-to-blocked'); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="<?php echo e($containerBodyClass); ?>">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                ID
                                <span class="badge badge-pill">
                                    <?php echo e($item->id); ?>

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                TypeId
                                <span class="badge badge-pill">
                                    <?php echo e($item->typeId); ?>

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Slug
                                <span class="badge badge-pill">
                                    <?php echo $item->blockedType->slug; ?>

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Value
                                <span class="badge badge-pill">
                                    <?php echo e($item->value); ?>

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Note
                                <span class="badge badge-pill">
                                    <?php echo e($item->note); ?>

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                UserId
                                <span class="badge badge-pill">
                                    <?php if($item->userId): ?>
                                        <?php echo $item->userId; ?>

                                    <?php else: ?>
                                        <span class="disabled">
                                            <?php echo trans('laravelblocker::laravelblocker.none'); ?>

                                        </span>
                                    <?php endif; ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Created At
                                <span class="badge badge-pill">
                                    <?php echo $item->created_at->format('m/d/Y H:ia'); ?>

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Updated At
                                <span class="badge badge-pill">
                                    <?php echo $item->updated_at->format('m/d/Y H:ia'); ?>

                                </span>
                            </li>
                            <?php if($item->deleted_at): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Deleted At
                                    <span class="badge badge-pill">
                                        <?php echo $item->deleted_at->format('m/d/Y H:ia'); ?>

                                    </span>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="row">
                            <div class="col-sm-6 mt-3">
                                <?php if(isset($typeDeleted)): ?>
                                    <?php echo $__env->make('laravelblocker::forms.restore-item', ['restoreType' => 'full'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                    <a class="btn btn-sm btn-info btn-block text-white" href="/blocker/<?php echo e($item->id); ?>/edit" data-toggle="tooltip" title="<?php echo e(trans("laravelblocker::laravelblocker.tooltips.edit")); ?>">
                                        <?php echo trans("laravelblocker::laravelblocker.buttons.edit-larger"); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <?php if(isset($typeDeleted)): ?>
                                    <?php echo $__env->make('laravelblocker::forms.destroy-full', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                    <?php echo $__env->make('laravelblocker::forms.delete-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('laravelblocker::modals.confirm-modal',[
        'formTrigger' => 'confirmRestore',
        'modalClass' => 'success',
        'actionBtnIcon' => 'fa-check'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('laravelblocker::modals.confirm-modal',[
        'formTrigger' => 'confirmDelete',
        'modalClass' => 'danger',
        'actionBtnIcon' => 'fa-trash-o'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection(config('laravelblocker.blockerBladePlacementJs')); ?>
    <?php if(config('laravelblocker.enablejQueryCDN')): ?>
        <script type="text/javascript" src="<?php echo e(config('laravelblocker.JQueryCDN')); ?>"></script>
    <?php endif; ?>
    <?php echo $__env->make('laravelblocker::scripts.confirm-modal', ['formTrigger' => '#confirmDelete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('laravelblocker::scripts.confirm-modal', ['formTrigger' => '#confirmRestore'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(config('laravelblocker.tooltipsEnabled')): ?>
        <?php echo $__env->make('laravelblocker::scripts.tooltips', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('inline_template_linked_css'); ?>
<?php echo $__env->yieldContent('inline_footer_scripts'); ?>

<?php echo $__env->make(config('laravelblocker.laravelBlockerBladeExtended'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\pro-4\mPortal\vendor\jeremykenedy\laravel-blocker\src/resources/views//laravelblocker/show.blade.php ENDPATH**/ ?>