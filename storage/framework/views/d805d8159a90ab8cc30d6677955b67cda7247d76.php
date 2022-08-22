
<?php $__env->startSection('class', 'single-video'); ?>
<?php $__env->startSection('second_navbar'); ?>
<?php echo $__env->make('frontend.partials.second_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom_css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link href="https://vjs.zencdn.net/7.20.2/video-js.css" rel="stylesheet" />
<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />
<style>
    .social-btn-sp #social-links {
        margin: 0 auto;
        max-width: 500px;
    }

    .social-btn-sp #social-links ul li {
        display: inline-block;
    }

    .social-btn-sp #social-links ul li a {
        padding: 7.5px;
        margin: 1px;
        font-size: 20px;
    }

    table #social-links {
        display: inline-table;
    }

    table #social-links ul li {
        display: inline;
    }

    table #social-links ul li a {
        padding: 2.5px;
        ;
        margin: .5px;
        font-size: 7.5px;
    }

    /* Custon autoplay swich checkbox */
    .custom-control.teleport-switch {
        --color: #4cd964;
        padding-left: 0;
    }

    .custom-control.teleport-switch .teleport-switch-control-input {
        display: none;
    }

    .custom-control.teleport-switch .teleport-switch-control-input:checked~.teleport-switch-control-indicator {
        border-color: var( --ls_color-primary);
    }

    .custom-control.teleport-switch .teleport-switch-control-input:checked~.teleport-switch-control-indicator::after {
        left: -14px;
    }

    .custom-control.teleport-switch .teleport-switch-control-input:checked~.teleport-switch-control-indicator::before {
        right: 2px;
        background-color: var( --ls_color-primary);
    }

    .custom-control.teleport-switch .teleport-switch-control-input:disabled~.teleport-switch-control-indicator {
        opacity: .4;
    }

    .custom-control.teleport-switch .teleport-switch-control-indicator {
        display: inline-block;
        position: relative;
        margin: 0 10px;
        top: 4px;
        width: 32px;
        height: 20px;
        background: #fff;
        border-radius: 16px;
        -webkit-transition: .3s;
        -o-transition: .3s;
        transition: .3s;
        border: 2px solid #ccc;
        overflow: hidden;
    }

    .custom-control.teleport-switch .teleport-switch-control-indicator::after {
        content: '';
        display: block;
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        -webkit-transition: .3s;
        -o-transition: .3s;
        transition: .3s;
        top: 2px;
        left: 2px;
        background: #ccc;
    }

    .custom-control.teleport-switch .teleport-switch-control-indicator::before {
        content: '';
        display: block;
        position: absolute;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        -webkit-transition: .3s;
        -o-transition: .3s;
        transition: .3s;
        top: 2px;
        right: -14px;
        background: #ccc;
    }

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_section'); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-sm-12">
                <?php if($upload->sell && !$is_purchased): ?>
                <div class="sv-video">
                    <a href=""><img src="<?php echo e(asset('images/premium.png')); ?>" alt="" width="auto" height="350px" class="ls_obj-cover"></a>
                </div>
                <?php else: ?>
                <video id="my-video" class="video-js ls_video-container" controls
                    preload="auto" poster="<?php echo e(asset($upload->thumbnail_image)); ?>" data-setup="{}"
                    <?php if(auth()->guard()->check()): ?> <?php if(auth()->user()->auto_play == false): ?>
                    autoplay="false"
                    <?php else: ?>
                    muted autoplay
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                    muted autoplay
                    <?php endif; ?>
                    >
                    <source src="<?php echo e(asset($upload->upload)); ?>" type="video/mp4" />
                </video>
                
                <input type="hidden" name="nextlink" value="<?php echo e(route('singleVideo', $relatedUpload[0]['id'])); ?>">
                <?php endif; ?>
                <h1><a href="#"><?php echo e($upload->name); ?></a></h1>
                <?php if($upload->sell): ?>
                <div class="card">
                    <div class="card-body">
                        <?php if($upload->sell && $is_purchased): ?>
                        <a href="<?php echo e(route('user.buynow', $upload->id)); ?>" class="btn btn-success my-2">Purched !</a>
                        <?php else: ?>
                        <a href="<?php echo e(route('user.buynow', $upload->id)); ?>" class="btn btn-success my-2">Buy Now</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="acide-panel acide-panel-top">
                    <a href="#"><i class="cv cvicon-cv-watch-later" data-toggle="tooltip" data-placement="top" title="Watch Later"></i></a>
                    <a href="#"><i class="cv cvicon-cv-liked" data-toggle="tooltip" data-placement="top" title="Liked"></i></a>
                    <a href="#"><i class="cv cvicon-cv-flag" data-toggle="tooltip" data-placement="top" title="Flag"></i></a>
                </div>
                <div class="author clearfix">
                    <div class="author-head ls_avatar-img">
                        <a href="#"><img src="<?php if($upload->user->profile && $upload->user->profile->avatar_status == 1): ?> <?php echo e($upload->user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($upload->user->email)); ?> <?php endif; ?>" alt="<?php echo e($upload->user->name); ?>" class="sv-avatar"></a>
                        <div class="sv-name">
                            <div><a href="#"><?php echo e($upload->user->name); ?></a> . <?php echo e(App\Models\Upload::where('user_id', $upload->user_id)->count()); ?> Videos</div>
                            <div class="c-sub hidden-xs">
                                <?php if($upload->user_id == Auth::id()): ?>
                                <button disabled class="c-f">
                                    Follow
                                </button>
                                <?php else: ?>
                                <?php if(!$followCheck): ?>
                                <a href="<?php echo e(Route("public.follow", $upload->user_id)); ?>" class="c-f">
                                    Follow
                                </a>
                                <?php else: ?>
                                <a href="<?php echo e(Route("public.unfollow", $upload->user_id)); ?>" class="c-f">
                                    Unfollow
                                </a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <div class="c-s">
                                    <?php echo e($upload->user->followers()->get()->count()); ?>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                        <a href="#" class="author-btn-add"><i class="cv cvicon-cv-plus"></i></a>
                    </div>
                    <div class="author-border">
                    </div>
                    <div class="sv-views">
                        <div class="sv-views-count d-flex">
                            <?php if( empty($likeCheck)): ?>
                            <a href="<?php echo e(Route('like', $upload->id)); ?>" class="btn "><i class="fa fa-thumbs-up" style="font-size: 1.2em"></i></a>
                            <?php else: ?>
                            <a href="<?php echo e(Route('unlike', $upload->id)); ?>" class="btn"><i class="fa fa-thumbs-down  " style="font-size: 1.2em"></i></a>
                            <?php endif; ?>
                            <small> <?php echo e($upload->likes->count('count')); ?> Likes</small>

                            <small> <?php echo e($upload->view); ?> views</small>
                        </div>
                        <div class="sv-views-progress">
                            <div class="sv-views-progress-bar ls_progress-bar"></div>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    
                    <div class="social-btn-sp pull-right">
                        <?php echo $shareButtons; ?>

                    </div>

                </div>
                <div class="info">
                    <div class="info-content">
                        

                        <h4>Category </h4>
                        <?php switch($upload->category_id):
                        case ($upload->category_id == 1): ?>
                        <p>Music</p>
                        <?php break; ?>
                        <?php case ($upload->category_id == 2): ?>
                        <p>Talent</p>
                        <?php break; ?>
                        <?php case ($upload->category_id == 3): ?>
                        <p>Comedy</p>
                        <?php break; ?>

                        <?php default: ?>
                        <p>No category Found</p>
                        <?php endswitch; ?>


                        <h4>About </h4>
                        <p><?php echo $upload->description; ?></p>

                        

                        <div class="row date-lic">
                            <div class="col-xs-6">
                                <h4>Release Date:</h4>
                                <p><?php echo e($upload->release_date); ?></p>
                            </div>
                            <div class="col-xs-6 ta-r">
                                <h4>License:</h4>
                                <p>Standard</p>
                            </div>
                        </div>
                    </div>

                    <div class="showless hidden-xs">
                        <a>Tell Us What You Think</a>
                    </div>

                    <!-- <div class="content-block head-div head-arrow head-arrow-top visible-xs">
                        <div class="head-arrow-icon">
                            <i class="cv cvicon-cv-next"></i>
                        </div>
                    </div> -->

                    

                    <!-- similar videos -->
                    <div class="caption hidden-xs">
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-v-footer">
                        <!-- comments -->
                        <div class="comments">
                            <div class="reply-comment">
                                <div class="rc-header"><i class="cv cvicon-cv-comment"></i> <span class="semibold"><?php echo e($upload->comments->count()); ?></span> Comments</div>
                                <div class="rc-ava"><a href="#"><img src="<?php echo e(asset('assets/frontend/images/ava5.png')); ?>" alt=""></a></div>
                                <div class="rc-comment">
                                    <form action="<?php echo e(route('comment.add')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <textarea name="body" rows="3" placeholder="Share what you think?"></textarea>
                                        <input type="hidden" name="upload_id" value="<?php echo e($upload->id); ?>" id="">
                                        <button type="submit">
                                            <i class="cv cvicon-cv-add-comment"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="comments-list">
                                <?php $__currentLoopData = $upload->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- comment -->
                                <div class="cl-comment">
                                    <div class="cl-avatar"><a href="#"><img src="<?php echo e(asset('assets/frontend/images/ava8.png')); ?>" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#"><?php echo e($comment->user->name); ?></a> . <?php echo e($comment->created_at->diffForHumans()); ?></div>
                                        <div class="cl-text"><?php echo e($comment->body); ?></div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 121</span> <span class="grey"><span class="circle"></span> 2</span> . <a href="#">Reply</a></div>
                                        <div class="cl-replies"><a href="#">View all <?php echo e($comment->replies->count()); ?> replies <i class="fa fa-chevron-down" aria-hidden="true"></i></a></div>
                                        <div class="cl-flag"><a href="#"><i class="cv cvicon-cv-flag"></i></a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <!-- END comment -->
                                <div class="reply-comment">
                                    <div class="rc-ava"><a href="#"><img src="<?php echo e(asset('assets/frontend/images/ava5.png')); ?>" alt=""></a></div>
                                    <div class="rc-comment">
                                        <form action="<?php echo e(route('comment.add')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <textarea name="body" rows="3" placeholder="Share what you think?"></textarea>
                                            <input type="hidden" name="upload_id" value="<?php echo e($upload->id); ?>" />
                                            <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>" />
                                            <button type="submit">
                                                <i class="cv cvicon-cv-add-comment"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- reply comment -->
                                <div class="cl-comment-reply">
                                    <div class="cl-avatar"><a href="#"><img src="<?php echo e(asset('assets/frontend/images/ava7.png')); ?>" alt=""></a></div>
                                    <div class="cl-comment-text">
                                        <div class="cl-name-date"><a href="#"><?php echo e($reply->user->name); ?></a> . <?php echo e($reply->created_at->diffForHumans()); ?></div>
                                        <div class="cl-text"><?php echo e($reply->body); ?></div>
                                        <div class="cl-meta"><span class="green"><span class="circle"></span> 70</span> <span class="grey"><span class="circle"></span> 9</span> . <a href="#">Reply</a></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- END reply comment -->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                
                            </div>
                        </div>
                        <!-- END comments -->
                    </div>
                </div>
                <div class="content-block head-div head-arrow visible-xs">
                    <!-- <div class="head-arrow-icon">
                        <i class="cv cvicon-cv-next"></i>
                    </div> -->
                    
                </div>
            </div>

            <!-- right column -->
            <div class="col-lg-4 col-xs-12 col-sm-12 hidden-xs">

                <!-- up next -->
                <div class="caption">
                    <div class="left">
                        <a href="#">Up Next</a>
                    </div>
                    <div class="right" id="autoplayDiv">
                        
                        <?php if(auth()->guard()->check()): ?>
                        <label class="custom-control teleport-switch">
                            <span class="teleport-switch-control-description">Auto Play</span>
                            <input type="checkbox" name="autoplay" class="teleport-switch-control-input" <?php if(auth()->user()->auto_play): ?> checked <?php endif; ?>>
                            <span class="teleport-switch-control-indicator"></span>
                        </label>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>">
                            <label class="custom-control teleport-switch">
                                <span class="teleport-switch-control-description">Auto Play</span>
                                <input type="checkbox" disabled class="teleport-switch-control-input" checked>
                                <span class="teleport-switch-control-indicator"></span>
                            </label>
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list">
                    <?php $__empty_1 = true; $__currentLoopData = $relatedUpload; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="h-video row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-img ls_video-thumbnail">
                                <a href="<?php echo e(route('singleVideo', $item->id)); ?>"><img src="<?php echo e(asset($item->thumbnail_image)); ?>" alt=""></a>
                                <div class="time"><?php echo e($item->upload_duration); ?></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="v-desc">
                                <a href="<?php echo e(route('singleVideo', $item->id)); ?>"><?php echo e($item->name); ?></a>
                            </div>
                            <div class="v-views">
                                <?php echo e($upload->view); ?> views
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="h-video row ">

                        <div class="col-lg-12 col-sm-12">
                            <div class="v-desc ">
                                <p class="text-center"><strong> No Video Available</strong></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <?php endif; ?>
                    <!-- END up next -->
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('custom_script'); ?>
    
    <script src="https://vjs.zencdn.net/7.20.2/video.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', 'input[name="autoplay"]', function() {
                // alert('welcome')
                $.ajax({
                    url: '/ajax/autoplay'
                    , type: 'GET'
                    , success: function(data) {
                        console.log(data);
                    }
                    , error: function(error) {
                        console.log(error)
                    }
                })
            });
            let myVideo = document.getElementById('my-video');
            myVideo.addEventListener('ended', videoCompleted, false);


            function videoCompleted(e) {
                let nextvideo = $('input[name="nextlink"]').val();
                window.location.href = nextvideo;
            }


        });

    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\2spiceart\resources\views/frontend/single_video.blade.php ENDPATH**/ ?>