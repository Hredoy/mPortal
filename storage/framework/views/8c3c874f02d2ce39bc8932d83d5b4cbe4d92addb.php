

<?php $__env->startPush('custom-css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main_section'); ?>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Editable Table</h4>
                   </div>
                   
                </div>
                <div class="iq-card-body">
                   <div id="table" class="table-editable">
                      <span class="table-add float-right mb-3 mr-2">
                      <button class="btn btn-sm iq-bg-success"><i
                         class="ri-add-fill"><span class="pl-1">Add New</span></i>
                      </button>
                      </span>
                      <table class="table table-bordered table-responsive-md table-striped text-center">
                       
                         <thead>
                            <tr>
                              <th><?php echo trans('SL'); ?></th> 
                              <th><?php echo trans('Name'); ?></th>
                              <th class="hidden-xs"><?php echo trans('Category'); ?></th>
                              <th class="hidden-xs"><?php echo trans('Status'); ?></th>
                              <th class="hidden-xs"><?php echo trans('Thumbnail'); ?></th>
                              <th class=""><?php echo trans('Music'); ?></th>
                              <th class=""><?php echo trans('Sort'); ?></th>
                              <th colspan="5"><?php echo trans('Action'); ?></th>
                            
                            </tr>
                         </thead>
                        <tbody>
                           <?php $__empty_1 = true; $__currentLoopData = $uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                           <tr>
                              <td contenteditable="true"><?php echo e($loop->iteration); ?></td>
                              <td contenteditable="true"><?php echo e($video->name); ?></td>
                              <td contenteditable="true"><?php echo e($video->categories->category_name); ?></td>
                              <td contenteditable="true">
                                <?php if($video->status == '1'): ?>
                                  <span class="badge badge-success">Active</span>
                                  <?php else: ?>
                                  <span class="badge badge-warning">Deactive</span>
                                  <?php endif; ?>
                              </td>
                              <td contenteditable="true"><img src="<?php echo e(asset('/uploads/'.Auth::user()->name.'/images/'.$video->thumbnail_image)); ?>" class="msg-photo" alt="" style="width: 100px; height:60px;" /></td>
                              <td contenteditable="true">
                                 <video width="320" height="100" controls>
                                  <source src="<?php echo e(asset('/uploads/'.Auth::user()->name.'/video/'.$video->upload)); ?>" type="video/mp4">
                                 </video>
                              </td>
                              <td>
                                 <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                 <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                              </td>
                              <td>
                                    <a  href="<?php echo e(route('public.upload.edit',$video->id)); ?>"
                                    class="btn btn-light btn-rounded btn-sm px-2 my-0"> Edit  </a>
                                 <span class="table-remove">
                                    <a  href="<?php echo e(route('public.upload.destroy',$video->id)); ?>"
                                    class="btn btn-primary btn-rounded btn-sm my-0">Remove</a>
                                 </span>
                              </td>
                        </tbody>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                           <tr>
                               <td class="text-muted text-center" colspan="100%">
                                   <?php echo e(trans($empty_message)); ?></td>
                           </tr>
                       </tbody>
                       
                       <?php endif; ?>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\mPortal\resources\views/backend/uploads/index.blade.php ENDPATH**/ ?>