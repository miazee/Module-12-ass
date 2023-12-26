<?php $__env->startSection("title", "Tickets"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
            <a href="<?php echo e(route("admin.tickets.create")); ?>"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Create Ticket</a>
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

        <div class="row">
            <div class="col-md-4">
                <label for="route_id" class="d-block mb-4">
                    <select name="route_id" id="route_id" class="form-control w-100">
                        <option value="">Select a Route</option>
                        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($route->id); ?>" <?php echo e(request()->input("route_id") == $route->id ? "selected" : ""); ?>><?php echo e($route->origin . " - " . $route->destination); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </label>
            </div>

            <div class="col-md-4">
                <label for="booking_date" class="d-block mb-4">
                    <input type="date" name="booking_date" value="<?php echo e(request()->input("booking_date")); ?>" id="booking_date" class="form-control">
                </label>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable">
                        <thead>
                        <tr>
                            <th>Ticket Number</th>
                            <th>Name</th>
                            <th>Email / Phone</th>
                            <th>Seat Number</th>
                            <th>Booking Date</th>
                            <th>Route</th>
                            <th>Bus</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                /**
                                 * @var $ticket
                                 */
                                $seats = explode(",", $ticket["seat_numbers"]);
                            ?>
                            <tr>
                                <td><?php echo e($ticket["ticket_number"]); ?></td>
                                <td><?php echo e($ticket["passenger"]["name"]); ?></td>
                                <td><?php echo e($ticket["passenger"]["email_or_phone"]); ?></td>
                                <td>
                                    <?php $__currentLoopData = $seats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-info badge-counter"><?php echo e($seat); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($ticket["booking_date"]); ?></td>

                                <?php if(empty($ticket["sub_route"])): ?>
                                    <td>
                                        <span class="badge badge-secondary"><?php echo e($ticket["trip"]["route"]["origin"]); ?> to <?php echo e($ticket["trip"]["route"]["destination"]); ?></span>
                                    </td>
                                <?php else: ?>
                                    <td>
                                        <span class="badge badge-secondary"><?php echo e($ticket["sub_route"]["origin"]); ?> to <?php echo e($ticket["sub_route"]["destination"]); ?></span>
                                    </td>
                                <?php endif; ?>

                                <td><?php echo e($ticket["trip"]["bus"]["bus_name"]); ?></td>
                                <td>
                                    <a href="" class="btn btn-sm disabled"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-sm disabled"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-sm disabled"><i class="fa fa-trash"></i></a>
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

<?php $__env->startPush("scripts"); ?>
    <script>
        jQuery("#route_id, #booking_date").on("change", function() {
            let routeId = jQuery("#route_id").val();
            let bookingDate = jQuery("#booking_date").val();

            let url = "<?php echo e(route('admin.tickets.index')); ?>";

            if (routeId) {
                url += "?route_id=" + routeId;
            }

            if (bookingDate) {
                url += (routeId ? "&" : "?") + "booking_date=" + bookingDate;
            }

            window.location.href = url;
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("admin.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Server/public_html/ostad/ostad_module12_assignment/resources/views/admin/tickets/index.blade.php ENDPATH**/ ?>