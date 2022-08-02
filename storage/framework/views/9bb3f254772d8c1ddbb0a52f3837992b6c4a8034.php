

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
                      <h4 class="card-title">Edit Content</h4>
                   </div>
                </div>
                <div class="iq-card-body">

                  <form method="POST" action="<?php echo e(route('public.upload.update',$upload->id)); ?>" accept-charset="UTF-8" role="form" enctype="multipart/form-data" class="needs-validation" file="true">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field('PUT'); ?>   
                      <div class="row">
                         <div class="col-lg-7">
                            <div class="row">
                               <div class="col-12 form-group">
                                  <input type="text" name="name" value="<?php echo e(old('name', $upload->name)); ?>" class="form-control" placeholder="Title">
                               </div>
                               
                               <div class="col-md-9 form-group form_gallery">
                                 <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                 <input data-name="#gallery2" id="form_gallery-upload" name="thumbnail_image" class="form_gallery-upload"
                                    type="file" accept="png',jpg',jpeg">
                                    <?php if($errors->has('thumbnail_image')): ?>
                               <span class="help-block">
                                   <strong><?php echo e($errors->first('thumbnail_image')); ?></strong>
                               </span>
                               <?php endif; ?>
                               </div>
                               <div class="col-sm-3 form-group">
                                 <img src="<?php echo e(asset('/uploads/'.Auth::user()->name.'/images/'.$upload->thumbnail_image)); ?>" class="msg-photo" alt="" style="width: 75px; height:50px;" />
                               </div>
                               <div class="col-md-6 form-group">
                                  <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                                     <option selected disabled="">Movie Category</option>
                                     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($cate->id); ?>" <?php echo e($cate->id == $upload->category_id ? 'selected':''); ?>><?php echo e($cate->category_name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                  <?php if($errors->has('category_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('category_id')); ?></strong>
                                </span>
                                <?php endif; ?>
                               </div>
                               <div class="col-sm-6 form-group">
                                 <select class="form-control" name="type" id="exampleFormControlSelect3">
                                    <option selected disabled="">Choose File Type</option>
                                    <option value="1">Audio</option>
                                    <option value="2">Video</option>
                                    <option value="3">Others</option>
                                 </select>
                               </div>
                               <div class="col-12 form-group">
                                  <textarea id="text" name="description" rows="5" class="form-control"
                                     placeholder="Description"><?php echo e($upload->description); ?></textarea>
                               </div>
                            </div>
                         </div>
                         <div class="col-lg-5">
                            <div class="d-block position-relative">
                               <div class="form_video-upload">
                                  <input type="file" name="upload" accept="video/mp4,video/x-m4v,video/*" multiple>
                                  <p>Upload video</p>
                               </div>
                               <?php if($errors->has('upload')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('upload')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-sm-6 form-group">
                            <input type="date" class="form-control" value="<?php echo e($upload->release_date); ?>" name="release_date" placeholder="Release Date">
                            <?php if($errors->has('release_date')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('release_date')); ?></strong>
                                </span>
                                <?php endif; ?>
                         </div>
                         <div class="col-sm-6 form-group">
                           <select class="form-control" name="region_id" id="exampleFormControlSelect2">
                              <option selected disabled="">Choose Region</option>
                              <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($ctn->id); ?>" <?php echo e($ctn->id == $upload->region_id ? 'selected':''); ?>><?php echo e($ctn->region_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                           <?php if($errors->has('region_id')): ?>
                         <span class="help-block">
                             <strong><?php echo e($errors->first('region_id')); ?></strong>
                         </span>
                         <?php endif; ?>
                        </div>
                        <div class="col-sm-12 form-group">
                           <input type="time" class="form-control" value="<?php echo e($upload->upload_duration); ?>" name="upload_duration" placeholder="Movie Duration">
                        </div>
                         <div class="col-12 form-group ">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-danger">cancel</button>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\pro-4\mPortal\resources\views/backend/uploads/edit.blade.php ENDPATH**/ ?>