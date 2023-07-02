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
            Order details
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto py-2">
        <div class="max mx-auto py-8 sm:px-6 lg:px-8 bg-white">
            <div class="pl-20 py-4">
                <p class="text-lg font-bold">Product details</p>
            </div>
            <div class="w-3/4 pl-20">
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
           
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH D:\Coding\GitHub\KoipiamoXTest\Kopiamo\resources\views/review/reviewdetails.blade.php ENDPATH**/ ?>