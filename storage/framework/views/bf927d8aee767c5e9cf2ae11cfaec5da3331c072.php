<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Minha Assinatura')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <?php if($subscription): ?>
                    Plano: <?php echo e($user->plan()->name); ?>

                        <?php if($subscription->cancelled() && $subscription->onGracePeriod()): ?>
                        <a href="<?php echo e(route('subscriptions.resume')); ?>"  class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none"
                        >Reativar</a>
                            seu acesso vai ate o dia:  <?php echo e($user->access_end); ?>

                        <?php elseif(! $subscription->cancelled()): ?>
                        <a href="<?php echo e(route('subscriptions.cancel')); ?>"  class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none"
                        >Cancelar</a>
                    <?php endif; ?>
                        <?php if( $subscription->ended()): ?>
                                Assinatura cancelada
                        <?php endif; ?>
                        <?php else: ?>
                            [Nao é assinate]
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4">Data</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4">Preço</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td class="px-6 py-4 border-b text-sm"><?php echo e($invoice->date()->toFormattedDateString()); ?></>
                                <td class="px-6 py-4 border-b text-sm"><?php echo e($invoice->total()); ?></>
                                <td class="px-6 py-4 border-b text-sm">
                                    <a  href="<?php echo e(route('subscriptions.invoice.download', $invoice->id)); ?>"
                                        class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none"
                                        >Download</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /var/www/laravel-subscription/resources/views/subscriptions/account.blade.php ENDPATH**/ ?>