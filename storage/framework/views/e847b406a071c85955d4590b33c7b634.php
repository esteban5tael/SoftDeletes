 

<?php $__env->startSection('title'); ?> 
    <?php echo e(config('app.name')); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_header'); ?> 
    <h1 class="text-center">
        Customers 
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        
                        
                        <div class="container mb-3">
                            <?php if(request()->has('view_deleted')): ?>
                                <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.customers.index')); ?>">List Records</a>
                                <a class="btn btn-warning btn-sm" href="<?php echo e(route('admin.customers.restore_all')); ?>">Restore
                                    All</a>
                            <?php else: ?>
                                <a class="btn btn-danger btn-sm"
                                    href="<?php echo e(route('admin.customers.index', ['view_deleted' => 'DeletedRecords'])); ?>">View
                                    Deleted
                                    Records</a>
                            <?php endif; ?>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <?php echo e(__('Customer')); ?> 
                            </span>
                            <div class="float-right">
                                <a href="<?php echo e(route('admin.customers.create')); ?>" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <?php echo e(__('Create New')); ?> 
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success m-1">
                            <p><?php echo e($message); ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($customer->id); ?></td>
                                            <td><?php echo e($customer->name); ?></td>
                                            <td><?php echo e($customer->phone); ?></td>
                                            <td><?php echo e($customer->email); ?></td>
                                            <td>
                                                
                                                <form action="<?php echo e(route('admin.customers.destroy', $customer->id)); ?>"
                                                    method="POST">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    
                                                    <?php if(request()->has('view_deleted')): ?>
                                                        <a class="btn btn-secondary btn-sm"
                                                            href="<?php echo e(route('admin.customers.restore', $customer)); ?>">
                                                            <i class="fas fa-trash-restore"></i>
                                                            Restore</a>
                                                    <?php else: ?>
                                                        <a class="btn btn-sm btn-primary "
                                                            href="<?php echo e(route('admin.customers.show', $customer->id)); ?>"><i
                                                                class="fa fa-fw fa-eye"></i> <?php echo e(__('Show')); ?></a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="<?php echo e(route('admin.customers.edit', $customer->id)); ?>"><i
                                                                class="fa fa-fw fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fa fa-fw fa-trash"></i> <?php echo e(__('Delete')); ?></button>
                                                    <?php endif; ?>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php\laravel\Silverio\SoftDelete\resources\views/admin/customers/index.blade.php ENDPATH**/ ?>