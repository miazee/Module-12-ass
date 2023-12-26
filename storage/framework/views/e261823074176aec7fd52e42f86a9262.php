<?php $__env->startSection("title", "Show Bus"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Show Bus</h1>
            <a href="<?php echo e(route("admin.buses.index")); ?>"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Buses</a>
        </div>

    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="bus_name" class="col-sm-3 col-form-label text-right font-weight-bold">Bus Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="bus_name" value="<?php echo e($bus->bus_name); ?>" name="bus_name"
                                   disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="model" class="col-sm-3 col-form-label text-right font-weight-bold">Model *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="model" value="<?php echo e($bus->model); ?>"
                                   name="model" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="capacity"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Capacity *</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="capacity" value="<?php echo e($bus->capacity); ?>"
                                   name="capacity" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control" disabled>
                                <option value="1" <?php echo e($bus->status === 1 ? "selected" : ""); ?>>Active</option>
                                <option value="0" <?php echo e($bus->status === 0 ? "selected" : ""); ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Server/public_html/ostad/ostad_module12_assignment/resources/views/admin/tickets/show.blade.php ENDPATH**/ ?>