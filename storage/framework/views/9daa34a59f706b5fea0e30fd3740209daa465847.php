<?php $__env->startSection('title', __('Service Unavailable')); ?>
<?php $__env->startSection('code', '503'); ?>
<?php $__env->startSection('message', __($exception->getMessage() ?: 'Service Unavailable')); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GP-THINKPAD T410\Desktop\erp_pos_full\erp_pos\vendor\laravel\framework\src\Illuminate\Foundation\Exceptions/views/503.blade.php ENDPATH**/ ?>