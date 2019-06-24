<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registration</div>

                <div class="panel-body">
                    <?php if(\Session::has('msg')): ?>
                        <div class="alert alert-success">
                            <ul>
                                <li><?php echo \Session::get('msg'); ?></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="text-center">
                        <a href="registration/attendance_registration" class="btn btn-info btn-md">
                            attendance registration
                        </a>
                        <a href="registration/exist_registration" class="btn btn-success btn-md">
                            exist registration
                        </a>
                        <a href="registration/temprory_out_registration" class="btn btn-danger btn-md">
                            temprory out registration
                        </a>
                        <a href="registration/return_registration" class="btn btn-warning btn-md">
                            return registration
                        </a>
                    </div>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>day</th>
                                    <th>attendance registration</th>
                                    <th>exist registration</th>
                                    <th>temprory out egistration</th>
                                    <th>return registration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo e(Carbon\Carbon::today()->format('Y-m-d')); ?> 
                                    </td>
                                    <td>
                                        <?php echo e(@$registration->attendance_registration ? $registration->attendance_registration :'Null'); ?> 
                                    </td>
                                    <td>
                                        <?php echo e(@$registration->exist_registration ? $registration->exist_registration :'Null'); ?> 
                                    </td>
                                    <td>
                                        <?php echo e(@$registration->temprory_out_registration ? $registration->temprory_out_registration :'Null'); ?> 
                                    </td>
                                    <td>
                                        <?php echo e(@$registration->return_registration ? $registration->return_registration :'Null'); ?> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>