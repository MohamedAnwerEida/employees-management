<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employees list</div>

                <div class="panel-body">
                    <div class="text-center">
                        <a href="<?php echo e(url('/employees/add' )); ?>" class="btn btn-info btn-lg">
                             Add <i class="fa fa-plus fa-fw"></i>
                        </a>
                    </div>
                    <?php if($employees->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>identity</th>
                                        <th>full name</th>
                                        <th>options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                        
                                        <tr>
                                            <td><?php echo e($employee->id); ?></td>
                                            <td><?php echo e($employee->name); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/employees/edit/'.@$employee->id )); ?>" class="btn btn-success btn-sm">
                                                     Edit <i class="fa fa-pencil fa-fw"></i>
                                                </a>
                                                <a href="<?php echo e(url('/employees/delete/'.@$employee->id )); ?>" class="btn btn-danger btn-sm confirm"> delete <i class="fa fa-trash fa-fw"></i></a>
                                            </td>
                                        </tr>                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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