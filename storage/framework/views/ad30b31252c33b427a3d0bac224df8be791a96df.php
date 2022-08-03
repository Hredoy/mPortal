

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
                      <h4 class="card-title">Add Category</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="row">
                      <div class="col-lg-12">
                        <form method="POST" action="<?php echo e(route('categories.store')); ?>">
                           <?php echo csrf_field(); ?>
                            <div class="form-group">
                               <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Name">
                               <?php if($errors->has('category_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('category_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                               <textarea id="text" name="description" rows="5" class="form-control"
                               placeholder="Description"></textarea>
                               <?php if($errors->has('description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group radio-box">
                               <label>Status</label>
                               <div class="radio-btn">
                                  <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" id="customRadio6" name="status" value="1" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadio6">enable</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                     <input type="radio" id="customRadio7" name="status" value="0" class="custom-control-input">
                                     <label class="custom-control-label" for="customRadio7">disable </label>
                                  </div>
                               </div>
                            </div>
                            <div class="form-group ">
                               <button type="submit"  class="btn btn-primary">Submit</button>
                               <button type="reset" class="btn btn-danger">cancel</button>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

 
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\mPortal\resources\views/backend/admin/category/create.blade.php ENDPATH**/ ?>