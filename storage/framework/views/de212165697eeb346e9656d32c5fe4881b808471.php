<?php $__env->startComponent('mail::message'); ?>
# Novo Contato



Nome: <?php echo e($data['name']); ?>

Email: <?php echo e($data['email']); ?>


Messagem: <?php echo e($data['message']); ?>


Obrigado,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/laravel-subscription/resources/views/emails/site/contact.blade.php ENDPATH**/ ?>