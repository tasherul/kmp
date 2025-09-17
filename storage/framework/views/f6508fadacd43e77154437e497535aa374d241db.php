<?php $__env->startSection('title','Photo'); ?>


<?php $__env->startSection('content'); ?>

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-5">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Photo Gallery</h4>
                    <p class="sub-title">Upload photo gallery from here.</p>

                    <form class="" action="<?php echo e(route('photoInsertUpdate')); ?>"  method="POST"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="image_tittle" value="<?php echo e($photo->image_tittle); ?>" class="form-control" required placeholder="Type something"/><br/>
                            <p class="sub-title">Upload image.</p>
                            <div class="m-b-30">
                            <input name="gallery_image" value="<?php echo e($photo->gallery_image); ?>" type="file" accept="image/*">
                            </div>
                        </div>

                        <input type="hidden" name="edit_id" value="<?php echo e($photo->id); ?>">    
                        
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
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
                    From here you can edit and delete photo gallery
                    </p>

                    <?php if(isset($photos[0])): ?>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($key+1); ?></th>
                                    <td> <img src="<?php echo e(asset('upload'). $photo->gallery_image); ?>" alt="user" width="100px" height="100px"/>  </td>
                                    <td class="text_property"><?php echo e($photo->image_tittle); ?> </td>
                                    <td>
                                    <a href="<?php echo e(route('photoEdit', $photo->id )); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                    <a href="<?php echo e(route('photoDelete', $photo->id )); ?>" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="content_center">

                        <?php echo e($photos->links()); ?>

       
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
  
  
  
  
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kmpnew\resources\views/admin/photo_gallery.blade.php ENDPATH**/ ?>