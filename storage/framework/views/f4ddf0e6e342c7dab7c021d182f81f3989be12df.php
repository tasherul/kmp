<?php $__env->startSection('title','Video'); ?>


<?php $__env->startSection('content'); ?>

<!-- Home Content Start -->
<div class="home_content">

<div class="row">
    <div class="col-lg-5">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Add Video</h4>
                <p class="sub-title">Add video from here</p>

                <form class="" action="<?php echo e(route('videoInsertUpdate')); ?>"  method="POST"  enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Video Title</label>
                        <input type="text"  name="video_title" value="<?php echo e($video->video_title); ?>" class="form-control" required placeholder="Type something"/>
                    </div>   

                  <!--   <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Video Type</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="video_type" required >
                                <option >Select Type</option>
                                <option <?php if($video->video_type == 'Youtube Video'): ?> selected="selected" <?php endif; ?>>Youtube Video</option>
                                <option <?php if($video->video_type == 'Vimo Video'): ?> selected="selected" <?php endif; ?>>Vimo Video</option>
                                <option <?php if($video->video_type == 'Private Video'): ?> selected="selected" <?php endif; ?>>Private Video</option>
                            </select>
                        </div>
                    </div>--->

                        <div class="form-group">
                        <label>Video Link</label>
                        <input type="text" name="video_link" value="<?php echo e($video->video_link); ?>" class="form-control" required placeholder="Type something"/><br/>
                       
                       
                        <label>Video Thumbnail</label>
                        <div class="m-b-30">
                            <input name="video_thumbnail" value="<?php echo e($video->video_thumbnail); ?>" type="file" >
                        </div>

                       <!-- <p class="sub-title">Suggest to upload video from youtube.</p>
                        <div class="m-b-30">
                            <div action="#" class="dropzone">
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                            </div>
                        </div>

                    -->
                    </div>
                    

                    <input type="hidden" name="edit_id" value="<?php echo e($video->id); ?>">   
                    
                    <div class="form-group">
                        <div>
                            <button type="submit" name="video" class="btn btn-primary waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-7">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Basic example</h4>
                <p class="sub-title">
                From here you can edit and delete video.
                </p>

                <?php if(isset($videos[0])): ?>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($key+1); ?></th>
                                <td class="text_property"> <?php echo e($video->video_title); ?>  </td>
                                <td>
                                <div class="">
                                    <img width="70px" height="70px" class="embed-responsive-item" src="<?php echo e(asset('public/upload/').$video->video_thumbnail); ?>" />
                                </div>  
                                </td>
                                <td>
                                <!--<button class="btn btn-success btn-sm waves-effect waves-light" type="submit">View</button> -->
                                <a href="<?php echo e(route('videoEdit', $video->id )); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                <a href="<?php echo e(route('videoDelete', $video->id )); ?>" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                   		
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="content_center">

                    <?php echo e($videos->links()); ?>

    
                </div>
                
                <?php else: ?>

                    No Data Found

                <?php endif; ?>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->      
</div>


<!-- Home Content End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\01-KMP-Development-final\resources\views/admin/video.blade.php ENDPATH**/ ?>