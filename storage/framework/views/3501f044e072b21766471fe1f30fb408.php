<?php $__env->startSection("title", "Trips"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Trips</h1>
            <a href="<?php echo e(route("admin.trips.create")); ?>"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create Trips</a>
        </div>

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

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bus Name</th>
                            <th>Route</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Days</th>
                            <th>Status</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($trip->bus->bus_name); ?></td>
                                <td><?php echo e($trip->route->origin . "-" . $trip->route->destination); ?></td>
                                <td><?php echo e(date("h:i A", strtotime($trip->departure_time))); ?></td>
                                <td><?php echo e(date("h:i A", strtotime($trip->arrival_time))); ?></td>
                                <td>
                                    <?php $__currentLoopData = explode(",", $trip->days); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-secondary badge-counter"><?php echo e($day); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <?php if($trip->status === 1): ?>
                                        <span class="badge badge-success badge-counter">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger badge-counter">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route("admin.trips.show", $trip->id)); ?>" class="btn btn-sm"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="<?php echo e(route("admin.trips.edit", $trip->id)); ?>" class="btn btn-sm"><i
                                            class="fa fa-edit"></i></a>
                                    <form action="<?php echo e(route("admin.trips.destroy", $trip->id)); ?>" method="post" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("DELETE"); ?>
                                        <button class="btn btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Server/public_html/ostad/ostad_module12_assignment/resources/views/admin/trips/index.blade.php ENDPATH**/ ?>