<?php $__env->startSection('title','Carrer'); ?>


<?php $__env->startSection('content'); ?>

<!-- Home Content Start -->
<div class="home_content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Career</h4>
                    <p class="sub-title">Add KMP Career</p>

                    <form  action="<?php echo e(route('carrerInsertUpdate')); ?>"  method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="carrer_title" value="<?php echo e($carrer->carrer_title); ?>" class="form-control" required placeholder="Type something"/>
                        </div>
                            
                        
                        <div class="form-group">
                            <label>File Upload pdf/doc</label>
                            <input name="carrer_pdf_doc" value="<?php echo e($carrer->carrer_pdf_doc); ?>" type="file" multiple="multiple">                                            
                        </div> 

                        <input type="hidden" name="edit_id" value="<?php echo e($carrer->id); ?>"> 

                        <div class="form-group">
                            <div>
                                <button type="submit" name="carrer" class="btn btn-primary waves-effect waves-light">
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
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Basic example</h4>
                    <p class="sub-title">
                    From here can edit and delete Career post
                    </p>

                    <?php if(isset($carrers[0])): ?>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $carrers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $carrer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($key+1); ?></th>
                                        <td class="text_property"> <?php echo e($carrer->carrer_title); ?>  </td>
                                        <td><a href="<?php echo e(asset('public/upload/').$carrer->carrer_pdf_doc); ?>" target="_blank"> <img src="<?php echo e(asset('kmp_dash')); ?>/image/pdf.png" alt="user" width="30px" height="30px"/> </a>  </td>
                                        <td>
                                           <a href="<?php echo e(route('carrerEdit', $carrer->id )); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                           <a href="<?php echo e(route('carrerDelete', $carrer->id )); ?>" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>    
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                        <?php echo e($carrers->links()); ?>

    
                    </div>
                    
                        
                    <?php else: ?>

                        No Data Found

                    <?php endif; ?>

                </div>
            </div>
        </div> <!-- end col -->


        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Police Comissoner</h4>
                    <p class="sub-title">Add KMP Police Comissoner List</p>

                    <form  action="<?php echo e(route('carrerInsertUpdate')); ?>"  method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="comissoner_name" value ="<?php echo e($police_comissoner->comissoner_name); ?>" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="comissoner_designation" value ="<?php echo e($police_comissoner->comissoner_designation); ?>" class="form-control" required placeholder="Type something"/>
                        </div>
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="text" name="comissoner_from_date" value ="<?php echo e($police_comissoner->comissoner_from_date); ?>" class="form-control"  required placeholder="Type date"/>
                        </div>
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="text" name="comissoner_to_date" value ="<?php echo e($police_comissoner->comissoner_to_date); ?>" class="form-control" required placeholder="Type date"/>
                        </div>  
                        
                        <input type="hidden" name="edit_id" value="<?php echo e($police_comissoner->id); ?>">   

                      
                        <div class="form-group">
                            <div>
                                <button type="submit" name="police_comissoner"  class="btn btn-primary waves-effect waves-light">
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
            <div class="card m-b-30">
                <div class="card-body">

                        <h4 class="mt-0 header-title">Basic example</h4>
                    <p class="sub-title">
                    From here can edit and delete Comissoner list
                    </p>

                    <?php if(isset($police_comissoners[0])): ?>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $police_comissoners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $police_comissoner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($key+1); ?></th>
                                    <td class="text_property"><?php echo e($police_comissoner->comissoner_name); ?></td>
                                    <td><?php echo e($police_comissoner->comissoner_designation); ?></td>										
                                    <td>
                                        <a href="<?php echo e(route('carrerEdit', $police_comissoner->id )); ?>" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a> ||
                                        <a href="<?php echo e(route('carrerDelete', $police_comissoner->id )); ?>" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>    
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="content_center">

                        <?php echo e($carrers->links()); ?>

        
                    </div>
                    
                        
                    <?php else: ?>

                      No Data Found
                    
                    <?php endif; ?>
                            
                </div>
            </div>
        </div>  
    </div> <!-- end row -->      
</div>
<!-- Home Content End -->
<?php $__env->stopSection(); ?>  
  
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\KMP-Development-final\resources\views/admin/carrer.blade.php ENDPATH**/ ?>