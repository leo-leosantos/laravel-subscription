<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Checkout')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <label for="">Assinando : <?php echo e($plan->name); ?></label>
                    <form action="<?php echo e(route('subscriptions.store')); ?>" method="post" id="form">
                        <?php echo csrf_field(); ?>
                        <div class="col-span-6 sm:col-span-4 py-2">
                            <input type="text" name="card-holder-name" id="card-holder-name" placeholder="Nome no cartão" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500">
                        </div>

                        <div class="col-span-6 sm:col-span-4 py-2">
                            <div id="card-element"></div>
                        </div>

                        <div class="col-span-6 sm:col-span-4 py-2">
                            <button data-secret="<?php echo e($intent->client_secret); ?>"
                            type="submit" id="card-buttom"
                            class="inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]">
                            >
                            Enviar
                          </button>
                    </div>

                    </form>
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



<script>
    const stripe = Stripe("<?php echo e(config('cashier.key')); ?>");
    const elements = stripe.elements();
    const cardElement = elements.create('card')

    cardElement.mount('#card-element');

    //subscriptions payment

    const form = document.getElementById('form');
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButtom = document.getElementById('card-buttom');
    const clientSecret = cardButtom.dataset.secret;


    form.addEventListener('submit', async (e) => {
        e.preventDefault();


     const {setupIntent, error} =   await  stripe.confirmCardSetup(
            clientSecret,{
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name:  cardHolderName.value
                    }
                }
            }

        );

        if(error){
            alert('Error')
            console.log(error)
            return;
        }

        let token = document.createElement('input');
        token.setAttribute('type', 'hidden');
        token.setAttribute('name', 'token');
        token.setAttribute('value', setupIntent.payment_method);

        form.appendChild(token);


        form.submit();

    });


</script>
<?php /**PATH /var/www/laravel-subscription/resources/views/subscriptions/index.blade.php ENDPATH**/ ?>