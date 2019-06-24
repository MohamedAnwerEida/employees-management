<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Report</div>

                <div class="panel-body">
                    <?php if($employee->registrations()->exists() ): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>day</th>
                                    <th>date</th>
                                    <th>attendance time</th>
                                    <th>exit time</th>
                                    <th>temprory out time</th>
                                    <th>return time</th>
                                    <th>total attendance hours</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $employee->registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(Carbon\Carbon::parse($registration->day)->format('l')); ?></td>
                                    <td><?php echo e(Carbon\Carbon::parse($registration->day)->format('Y-i-d')); ?></td>
                                    <td>
                                        <?php echo e(@$registration->attendance_registration ? Carbon\Carbon::parse($registration->attendance_registration)->format('h:i:s'):'Null'); ?>

                                    </td>
                                    <td>
                                        <?php echo e(@$registration->exist_registration ? Carbon\Carbon::parse($registration->exist_registration)->format('h:i:s'):'Null'); ?>

                                    </td>
                                    <td>
                                        <?php echo e(@$registration->temprory_out_registration ? Carbon\Carbon::parse($registration->temprory_out_registration)->format('h:i:s'):'Null'); ?>

                                    </td>
                                    <td>
                                        <?php echo e(@$registration->return_registration ? Carbon\Carbon::parse($registration->return_registration)->format('h:i:s') :'Null'); ?>

                                    </td>
                                    <td>
                                        <?php echo e(@$registration->diffIn); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="alert alert-success text-center">
                            <a href="<?php echo e(url('reports/export/'. $employee->id)); ?>" class="btn btn-success btn-md">
                                Export employee report to xlsx
                            </a>
                        </div>
                    </div>
                    <?php else: ?>
                    no data !
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>