<?php $__env->startSection('title','Home'); ?>


<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Home Content Start -->
<div class="home_content">
    <div class="d-flex justify-content-end" >  
        <i class="fas fa-edit remove" style="font-size: 30px;" onMouseOver="this.style.color='#333'" onMouseOut="this.style.color='Red'"></i>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6"> 
            <!-- Emergency Area -->
            <div class="card m-b-30">
                <div class="card-body">       
                    <h4 class="mt-0 header-title">Add Emergency Helpline</h4>
                    <p class="sub-title">This emergency helpline are show on top header.</p>

                    <form class="kmp_emergency" action="<?php echo e(Route('homepageUpdate')); ?>"  method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Emergency Tittle With Number:</label>
                            <input type="text" name="emergency_tittle" value="<?php echo e($homepage->emergency_tittle); ?>" class="form-control" required placeholder="Emergency Helpline : 999 And KMP Control Room : 01769690516" disabled />
                        </div>       									 
                        <div class="form-group">
                            <div>
                                <button type="submit" name="emergency"  class="btn btn-primary waves-effect waves-light" disabled>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Logo Area -->
            <div class="card m-b-30">
                <div class="card-body">
                <form class="kmp_emergency" action="<?php echo e(Route('homepageUpdate')); ?>"  method="POST" enctype="multipart/form-data" >
                    <?php echo csrf_field(); ?>
                        <h4 class="mt-0 header-title">Logo Upload</h4>
                        <p class="sub-title">Upload logo.</p>

                        <div class="m-b-30">
                            <div class="form-group">
                                <input name="logo_upload" type="file" value="<?php echo e($homepage->logo_upload); ?>" disabled>
                                <img src="<?php echo e(asset('upload'). $homepage->logo_upload); ?>" alt="user" width="70px" height="70px"/>
                             </div>
                        </div>
                        

                       <!-- <p class="sub-title">Upload logo background image.</p>

                        <div class="m-b-30">
                            <div class="form-group">
                                <input name="logo_background_image" type="file" value="<?php echo e($homepage->logo_background_image); ?>" disabled>
                            </div>           
                        </div>-->

                        <div class="m-t-15">
                            <div class="form-group">
                                <button type="submit" name="logo_submit" class="btn btn-primary waves-effect waves-light" disabled>
                                    Update Logo
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- History, Misson And Vision -->
            <div class="card m-b-30">
                <div class="card-body">       
                    <h4 class="mt-0 header-title">Add KMP History, Misson And Vision</h4>
                    <p class="sub-title">This history,mission and vison are show on homepage</p>

                    <form class="kmp_emergency"   action="<?php echo e(Route('homepageUpdate')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Add KMP History:</label>
                            <textarea id="textarea"  name="kmp_history"  class="form-control" rows="6" placeholder="Add KMP history here..." disabled><?php echo e($homepage->kmp_history); ?></textarea><br/>
                            <label>Add KMP Mission:</label>
                            <textarea id="textarea" name="kmp_mission"  class="form-control" rows="6" placeholder="Add KMP mission here..." disabled><?php echo e($homepage->kmp_mission); ?></textarea><br/>
                            <label>Add KMP Vision:</label>
                            <textarea id="textarea"  name="kmp_vision"  class="form-control" rows="6" placeholder="Add KMP vision here..." disabled><?php echo e($homepage->kmp_vision); ?></textarea>
                        </div>       									 
                        <div class="form-group">
                            <div>
                                <button type="submit" name="kmp_history_misson" class="btn btn-primary waves-effect waves-light" disabled>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Social Media Link</h4>
                    <p class="sub-title">This social media link are show on every page and also top header.</p>

                    <form class="kmp_emergency"  action="<?php echo e(Route('homepageUpdate')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Facbook Link:</label>
                            <input type="text" name="facebook_link" value="<?php echo e($homepage->facebook_link); ?>" class="form-control" required placeholder="www.facebook.com/kmp" disabled/><br/>
                            <label>Twitter Link:</label>
                            <input type="text" name="twitter_link"  value="<?php echo e($homepage->twitter_link); ?>" class="form-control" required placeholder="www.twitter.com/kmp" disabled/><br/>
                            <label>Youtube Link:</label>
                            <input type="text"  name="youtube_link" value="<?php echo e($homepage->youtube_link); ?>" class="form-control" required placeholder="www.youtube.com/kmp" disabled/>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" name="social_media" class="btn btn-primary waves-effect waves-light" disabled>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- Comissoner Area -->
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Comissoner</h4>
                    <p class="sub-title">This comissoner image, biography, messege from PC are show on homepage. </p>
                    <form class="kmp_emergency" action="<?php echo e(Route('homepageUpdate')); ?>" method="POST"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Add Comissoner Name</label>
                            <input type="text" class="form-control" name="comissoner_name" value="<?php echo e($homepage->comissoner_name); ?>" required placeholder="Comissoner Name" disabled/><br/>
                            <p class="sub-title">Upload comissoner image.</p>

                            <div class="m-b-30">
                                <input name="comissoner_image" type="file" value="<?php echo e($homepage->comissoner_image); ?>" disabled>
                                <img src="<?php echo e(asset('upload'). $homepage->comissoner_image); ?>" alt="user" width="70px" height="70px"/>
                            </div>
                            <label>Biography Of Comissoner:</label>
                            <textarea id="textarea" class="form-control" name="biography_of_comissoner" rows="6" placeholder="Write news description here..." disabled> <?php echo e($homepage->biography_of_comissoner); ?></textarea><br/>
                            <label>Message From Comissoner:</label>
                            <textarea id="textarea" class="form-control" name="message_from_comissoner" rows="6" placeholder="Write news description here..." disabled> <?php echo e($homepage->message_from_comissoner); ?></textarea>
                        </div>       									 
                        <div class="form-group">
                            <div>
                                <button type="submit" name="comissoner" class="btn btn-primary waves-effect waves-light" disabled>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- Home Content End -->
<script type="text/javascript">
    //Remove Disable
            $('.remove').click(function() {
                $('input,textarea,button').each(function() {
                    if ($(this).attr('disabled')) {
                        $(this).removeAttr('disabled');
                    }
                    else {
                        $(this).attr({
                            'disabled': 'disabled'
                        });
                    }
                });
            });
    </script>
<?php $__env->stopSection(); ?>


    
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kmpnew\resources\views/admin/homepage.blade.php ENDPATH**/ ?>