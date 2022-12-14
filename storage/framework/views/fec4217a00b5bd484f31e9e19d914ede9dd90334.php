<footer>
   <div class="container-fluid">
       <div class="row">
           <div class="container padding-def">
               <div class="col-lg-1  col-sm-2 col-xs-12 footer-logo">
                   <!--<a class="navbar-brand" href="index.html"><img src="<?php echo e(asset('assets/frontend/images/logo.svg')); ?>" alt="Project name" class="logo" /></a>-->
                   <a class="navbar-brand" href="index.html">
                       <img src="<?php echo e(asset('assets/frontend/images/logo.svg')); ?>" alt="Project name" class="logo" />
                       <span>Circle</span>
                   </a>
               </div>
               <div class="col-lg-7 col-sm-6 col-xs-12">
                   <div class="f-links">
                       <ul class="list-inline">
                           <li><a href="#">About</a></li>
                           <li><a href="#">Press</a></li>
                           <li><a href="#">Copyright</a></li>
                           <li><a href="#">Advertise</a></li>
                           <li class="hidden-xs"><a href="#">Help</a></li>
                           <?php $__currentLoopData = $contents->where('type', 2)->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($content->link); ?>"><?php echo e($content->name); ?> </a>
                                    </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </ul>
                   </div>
                   <div class="delimiter"></div>
               </div>
               <div class="col-lg-7 col-sm-6 col-xs-12">
                   <div class="f-copy">
                       <ul class="list-inline">
                           <li><a href="#">Terms</a></li>
                           <li><a href="#">Privacy</a></li>
                           <li>Copyrights 2016 <a href="azyrusthemes.com" class="hidden-xs">azyrusthemes.com</a></li>
                       </ul>
                   </div>
               </div>
               <div class="col-lg-offset-1 col-lg-3 col-sm-4 col-xs-12">
                   <div class="f-last-line">
                       <div class="f-icon pull-left">
                           <a href="#"><i class="fa fa-facebook-square"></i></a>
                           <a href="#"><i class="fa fa-twitter"></i></a>
                           <a href="#"><i class="fa fa-google-plus"></i></a>
                       </div>
                       <div class="f-lang pull-right">
                           <!-- Small button group -->
                           <div class="btn-group dropup pull-right">
                               <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Language <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu">
                                   <li><a href="#"><i class="cv cvicon-cv-relevant"></i> Relevant</a></li>
                                   <li><a href="#"><i class="cv cvicon-cv-calender"></i> Recent</a></li>
                                   <li><a href="#"><i class="cv cvicon-cv-view-stats"></i> Viewed</a></li>
                                   <li><a href="#"><i class="cv cvicon-cv-star"></i> Top Rated</a></li>
                                   <li><a href="#"><i class="cv cvicon-cv-watch-later"></i> Longest</a></li>
                               </ul>
                           </div>
                       </div>
                       <div class="clearfix"></div>
                   </div>
                   <div class="delimiter visible-xs"></div>
               </div>
           </div>
       </div>
   </div>
</footer><?php /**PATH C:\xampp\htdocs\mPortal\resources\views/frontend/partials/footer.blade.php ENDPATH**/ ?>