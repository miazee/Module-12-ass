<?php $__env->startSection("title", "Create Bus"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Bus</h1>
            <a href="<?php echo e(route("admin.buses.index")); ?>"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Buses</a>
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
                <form action="<?php echo e(route("admin.buses.store")); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="bus_name" class="col-sm-3 col-form-label text-right font-weight-bold">Bus Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="bus_name" value="<?php echo e(old("bus_name")); ?>" name="bus_name"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="model" class="col-sm-3 col-form-label text-right font-weight-bold">Model *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="model" value="<?php echo e(old("model")); ?>"
                                   name="model">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="capacity"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Capacity *</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="capacity" value="<?php echo e(old("capacity")); ?>"
                                   name="capacity">
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

<?php echo $__env->make("admin.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Server/public_html/ostad/ostad_module12_assignment/resources/views/admin/buses/create.blade.php ENDPATH**/ ?>