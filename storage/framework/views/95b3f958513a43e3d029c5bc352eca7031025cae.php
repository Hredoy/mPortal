

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
                      <h4 class="card-title">Edit Category</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="row">
                     <div class="col-lg-12">
                        <form method="POST" action="<?php echo e(route('categories.update',$category->id)); ?>">
                           <?php echo csrf_field(); ?>
                           <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                               <input type="text" class="form-control" value="<?php echo e(old('category_name',$category->category_name)); ?>" name="category_name" id="category_name" placeholder="Name">
                               <?php if($errors->has('category_name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('category_name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                               <textarea id="text" name="description" rows="5" class="form-control"
                               placeholder="Description"><?php echo e(old('description',$category->description)); ?></textarea>
                               <?php if($errors->has('description')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group radio-box">
                               <label>Status</label>
                               <div class="radio-btn">
                                 <?php if($category->status == 1): ?>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio6" name="status" checked value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio6">enable</label>
                                 </div> 
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio7" name="status" value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio7">disable </label>
                                 </div>
                                 <?php else: ?>
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio6" name="status"  value="1" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio6">enable</label>
                                 </div> 
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio7" name="status" checked value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio7">disable </label>
                                 </div> 
                                 <?php endif; ?>
                                 
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
<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\pro-4\mPortal\resources\views/backend/admin/category/edit.blade.php ENDPATH**/ ?>