

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
                      <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-sm iq-bg-success"><i
                         class="ri-add-fill"><span class="pl-1">Add New</span></i>
                      </a>
                      </span>
                      <table class="table table-bordered table-responsive-md table-striped text-center">
                         <thead>
                            <tr>
                              <th><?php echo trans('SL'); ?></th>
                              <th><?php echo trans('Name'); ?></th>
                              <th><?php echo trans('Status'); ?></th>
                              <th><?php echo trans('Description'); ?></th>
                              <th><?php echo trans('Sort'); ?></th>
                              <th><?php echo trans('Created'); ?></th>
                              <th><?php echo trans('Updated'); ?></th>
                              <th ><?php echo trans('Action'); ?></th>
                            </tr>
                         </thead>
                         <tbody>
                           <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                           <tr>
                              <td contenteditable="true"><?php echo e($loop->iteration); ?></td>
                              <td contenteditable="true"><?php echo e($item->category_name); ?></td>
                              <td contenteditable="true">
                                <?php if($item->status == '1'): ?>
                                  <span class="badge badge-success">Active</span>
                                  <?php else: ?>
                                  <span class="badge badge-warning">Deactive</span>
                                  <?php endif; ?>
                              </td>
                              <td contenteditable="true"><?php echo e($item->description); ?></td>
                            
                              <td>
                                 <span class="table-up"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a></span>
                                 <span class="table-down"><a href="#!" class="indigo-text"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></a></span>
                              </td>
                              <td contenteditable="true"><?php echo e($item->created_at->diffForHumans()); ?></td>
                              <td contenteditable="true"><?php echo e($item->updated_at->diffForHumans()); ?></td>
                              <td>
                                 <a  href="<?php echo e(route('categories.edit',$item->id)); ?>"
                                 class="btn btn-light btn-rounded btn-sm px-2 my-0"> Edit  </a>
                                 <span class="table-remove">
                                    <form action="<?php echo e(route('categories.destroy',$item->id)); ?>" method="post">
                                       <?php echo csrf_field(); ?>
                                       <?php echo method_field('DELETE'); ?>
                                   <button class="btn btn-primary btn-rounded btn-sm my-0" type="submit">Delete</button>
                                   </form>
                                 </span>
                              </td>
                        </tbody>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                           <tr>
                               <td class="text-muted text-center" colspan="100%">
                                   <?php echo e(trans($empty_message)); ?></td>
                           </tr>
                           <?php endif; ?>
                       </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
     $.ajaxSetup({
      headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
  })
function getDATA(){
        $.ajax({
            url: "<?php echo e(url('/api/cat')); ?>/",
                  type:"GET",
                  dataType:"json",
            success:function(response){

                }
        })

     }
     getDATA();   
</script> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\pro-4\mPortal\resources\views/backend/admin/category/index.blade.php ENDPATH**/ ?>