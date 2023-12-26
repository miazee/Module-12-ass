<?php $__env->startSection("title", "Create Route"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Route</h1>
            <a href="<?php echo e(route("admin.routes.index")); ?>"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Routes</a>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="m-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if(session()->has("success")): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo e(session("success")); ?>

            </div>
        <?php endif; ?>

        <?php if(session()->has("error")): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo e(session("error")); ?>

            </div>
        <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="<?php echo e(route("admin.routes.store")); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="origin" class="col-sm-3 col-form-label text-right font-weight-bold">Origin *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="origin" value="<?php echo e(old("origin")); ?>" name="origin"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="destination" class="col-sm-3 col-form-label text-right font-weight-bold">Destination *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="destination" value="<?php echo e(old("destination")); ?>"
                                   name="destination">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="distance"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Distance (km)</label>
                        <div class="col-sm-6">
                            <input type="number" step="any" class="form-control" id="distance" value="<?php echo e(old("distance")); ?>"
                                   name="distance">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Server/public_html/ostad/ostad_module12_assignment/resources/views/admin/routes/create.blade.php ENDPATH**/ ?>