<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
<script src="https://cdn.tailwindcss.com"></script>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-white leading-tight">
            Order Summary
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto py-2">
        <div class="max mx-auto py-8 sm:px-6 lg:px-8 bg-white">
            <div class="pl-20 py-4">
                <p class="text-lg font-bold">Product details</p>
            </div>
            <div class="w-3/4 pl-20 ml-20 shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-[#37251b]">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                        </tr>
                    </thead>
                <?php $__currentLoopData = $orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                <img src="<?php echo e(asset('uploads/menus/'. $items->products->coffee_photo_path)); ?>"  alt="Image" height="80px;" width="80px;">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                <?php echo e($items->products->menuName); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                <?php echo e($items->qty); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                RM<?php echo e($items->price); ?>

                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="pl-20 py-4">
                <p class="text-xl font-bold">TOTAL: RM<?php echo e($order->totalPrice); ?></p>
            </div>
            <div class="pl-20">
                <p class="text-lg"><b>Notes         : </b><?php echo e($order->notes); ?></p>
                <p class="text-lg"><b>Order status  : </b><?php echo e($order->orderStatus); ?></p>
                <?php if($order->orderStatus == "Pending"): ?>
                    <p class="text-lg">Please wait while we are preparing your drinks ...</p>
                <?php elseif($order->orderStatus == "Ready to pick up"): ?>
                    <p class="text-lg">Your drinks are ready to be picked up at our store!</p>
                <?php else: ?>
                    <p class="text-lg">Don't forget to rate & review our drinks. We love to hear a feedback from you.</p>
                <?php endif; ?>
            </div>
            <?php if(Auth::user()->name === 'admin'): ?>
            <div class="pl-20 pt-5">
                <p class="text-lg pb-2"><b>Customer details</b></p>
                <p class="text-lg"><b>Full Name     : </b><?php echo e($order->fullname); ?></p>
                <p class="text-lg"><b>Email         : </b><?php echo e($order->email); ?></p>
                <p class="text-lg"><b>Phone Number  : </b><?php echo e($order->phone); ?></p>
                <p class="text-lg"><b>Payment Type  : </b><?php echo e($order->paymentType); ?></p>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\Coding\GitHub\KoipiamoXTest\Kopiamo\resources\views/order/details.blade.php ENDPATH**/ ?>