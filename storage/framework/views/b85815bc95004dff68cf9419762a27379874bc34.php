

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
                            <h4 class="card-title">Add Content</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST" action="<?php echo e(route('public.upload.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Title" required>
                                            <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 form_gallery form-group">
                                            <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                            <input data-name="#gallery2" id="form_gallery-upload" name="thumbnail_image" class="form_gallery-upload" type="file" accept=".png,.jpg,.jpeg,.gif,.svg" required>
                                            <?php if($errors->has('thumbnail_image')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('thumbnail_image')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select class="form-control" name="category_id" id="exampleFormControlSelect1" required>
                                                <option selected disabled="">Category</option>
                                                <option value="1">Music</option>
                                                <option value="2">Comedy</option>
                                                <option value="3">Talent</option>

                                                
                                                
                                            </select>
                                            <?php if($errors->has('category_id')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('category_id')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <select class="form-control" name="region" id="exampleFormControlSelect3" required>
                                                <option selected disabled="">Choose Region</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country); ?>"><?php echo e($country); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('region')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('region')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea id="text" name="description" rows="5" class="form-control" placeholder="Description"></textarea>
                                            <?php if($errors->has('description')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('description')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="d-block position-relative">
                                        <div class="form_video-upload">
                                            <input type="file" name="upload" accept=".mp3,.mp4,.3gp,.mkev,.mkv,.amv,.avi">
                                            <p>Upload Audio/Video</p>
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
                                <div class="col-md-6 form-group">
                                    <Label for="contentType">Content Type: </Label>
                                  <select name="sell" id="contentType" class="form-control">
                                    <option value="0" selected>Free</option>
                                    <option value="1">Premium</option>
                                  </select>
                                </div>
                                <div class="col-md-6 form-group" id="inputPrice" style="display: none">
                                    <Label for="priceID">Price: </Label>
                                    <input type="number" name="price" id="priceID" class="form-control" required step="any">
                                </div>
                            </div>

                            <div class="row">
                                

                            
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
<?php $__env->startPush('custom-script'); ?>
<script>
    $(document).ready(function(){
        let contenttype = $('select[name="sell"]');
        $(document).on('change', 'select[name="sell"]', function(){
            let data = $(this).val();
            if(data == 1){
                $('#inputPrice').css('display','block');
            }else if(data == 0){
                $('#inputPrice').css('display','none');
            }
            // console.log(data);
        });
    });


</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/backend/uploads/create.blade.php ENDPATH**/ ?>