<!-- resources/views/patient/dashboard.blade.php -->



<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="alert alert-success">
            Congratulations! You are now logged in as a <strong>Admin</strong>.
        </div>
        <!-- Add patient-specific content here -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\php\Digivardan\Digivardan\Digivardan\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>