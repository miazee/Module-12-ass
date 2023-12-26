<?php $__env->startSection("title", "Edit Trip"); ?>
<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Trip</h1>
            <a href="<?php echo e(route("admin.trips.index")); ?>"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> Trips</a>
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
                <form action="<?php echo e(route("admin.trips.update", $trip->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("PUT"); ?>
                    <div class="form-group row">
                        <label for="bus_id" class="col-sm-3 col-form-label text-right font-weight-bold">Bus *</label>
                        <div class="col-sm-6">
                            <select name="bus_id" id="bus_id" class="form-control">
                                <option value="">Choose...</option>
                                <?php $__currentLoopData = $buses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bus->id); ?>" <?php echo e($bus->id == $trip->bus_id ? "selected" : ""); ?>><?php echo e($bus->bus_name . " (" . $bus->model . ")"); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="route_id" class="col-sm-3 col-form-label text-right font-weight-bold">Route *</label>
                        <div class="col-sm-6">
                            <select name="route_id" id="route_id" class="form-control">
                                <option value="">Choose...</option>
                                <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($route->id); ?>" <?php echo e($route->id == $trip->route_id ? "selected" : ""); ?>><?php echo e($route->origin . " - " . $route->destination); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="departure_time" class="col-sm-3 col-form-label text-right font-weight-bold">Departure Time *</label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="departure_time" value="<?php echo e($trip->departure_time); ?>" name="departure_time"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="arrival_time" class="col-sm-3 col-form-label text-right font-weight-bold">Arrival Time *</label>
                        <div class="col-sm-6">
                            <input type="time" class="form-control" id="arrival_time" value="<?php echo e($trip->arrival_time); ?>"
                                   name="arrival_time">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="days" class="col-sm-3 col-form-label text-right font-weight-bold">Days *</label>
                        <div class="col-sm-6">
                            <select name="days[]" id="days" class="form-control" multiple>
                                <option value="">Choose...</option>
                                <?php
                                    /**
                                     * @var $trip
                                     */
                                    $days = explode(",", $trip->days);
                                ?>
                                <option value="Sunday" <?php echo e(in_array("Sunday", $days) ? "selected" : ""); ?>>Sunday</option>
                                <option value="Monday" <?php echo e(in_array("Monday", $days) ? "selected" : ""); ?>>Monday</option>
                                <option value="Tuesday" <?php echo e(in_array("Tuesday", $days) ? "selected" : ""); ?>>Tuesday</option>
                                <option value="Wednesday" <?php echo e(in_array("Wednesday", $days) ? "selected" : ""); ?>>Wednesday</option>
                                <option value="Thursday" <?php echo e(in_array("Thursday", $days) ? "selected" : ""); ?>>Thursday</option>
                                <option value="Friday" <?php echo e(in_array("Friday", $days) ? "selected" : ""); ?>>Friday</option>
                                <option value="Saturday" <?php echo e(in_array("Saturday", $days) ? "selected" : ""); ?>>Saturday</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Status</label>
                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1" <?php echo e($trip->status === 1 ? "selected" : ""); ?>>Active</option>
                                <option value="0" <?php echo e($trip->status === 0 ? "selected" : ""); ?>>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label text-right font-weight-bold">Sub
                            Routes</label>
                        <div class="col-sm-9">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Origin *</th>
                                    <th>Destination *</th>
                                    <th>Distance (km)</th>
                                    <th>Departure Time</th>
                                    <th>Arrival Time</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $subRoutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $subRoute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><label><input type="hidden" name="exist_sub_routes[<?php echo e($i); ?>][id]" value="<?php echo e($subRoute->id); ?>"></label><label><input type="text" name="exist_sub_routes[<?php echo e($i); ?>][origin]" value="<?php echo e($subRoute->origin); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="text" name="exist_sub_routes[<?php echo e($i); ?>][destination]" value="<?php echo e($subRoute->destination); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="number" step="any" name="exist_sub_routes[<?php echo e($i); ?>][distance]" value="<?php echo e($subRoute->distance); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="time" name="exist_sub_routes[<?php echo e($i); ?>][departure_time]" value="<?php echo e($subRoute->departure_time); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="time" name="exist_sub_routes[<?php echo e($i); ?>][arrival_time]" value="<?php echo e($subRoute->arrival_time); ?>" class="form-control form-control-sm"></label></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php for($i = count($subRoutes); $i < 5; $i++): ?>
                                    <tr>
                                        <td><label><input type="text" name="sub_routes[<?php echo e($i); ?>][origin]" value="<?php echo e(old("sub_routes.$i.origin")); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="text" name="sub_routes[<?php echo e($i); ?>][destination]" value="<?php echo e(old("sub_routes.$i.destination")); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="number" step="any" name="sub_routes[<?php echo e($i); ?>][distance]" value="<?php echo e(old("sub_routes.$i.distance")); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="time" name="sub_routes[<?php echo e($i); ?>][departure_time]" value="<?php echo e(old("sub_routes.$i.departure_time")); ?>" class="form-control form-control-sm"></label></td>
                                        <td><label><input type="time" name="sub_routes[<?php echo e($i); ?>][arrival_time]" value="<?php echo e(old("sub_routes.$i.arrival_time")); ?>" class="form-control form-control-sm"></label></td>
                                    </tr>
                                <?php endfor; ?>
                                </tbody>
                            </table>

                            <div class="alert alert-info" role="alert">
                                <strong>Note: </strong>A maximum of five sub routes are allowed. If you remove the Origin and Destination it will delete the sub route from the database.
                            </div>
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

<?php echo $__env->make("admin.layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/Server/public_html/ostad/ostad_module12_assignment/resources/views/admin/trips/edit.blade.php ENDPATH**/ ?>