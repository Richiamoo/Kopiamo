<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
<script src="https://cdn.tailwindcss.com"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css" rel="stylesheet">
</head>



<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if(auth()->guard()->check()): ?>
    <?php if(Auth::user()->name === 'admin'): ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-white leading-tight mt-5">
                    Review and Rating 
                </h2>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
    


    
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>

                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            
                                        </th>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Username
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rating
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Comment
                                        </th>
                            
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Time created
                                        </th>
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Details
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <img class="h-8 w-8 rounded-full object-cover" src="<?php echo e($review->user->profile_photo_url); ?>" alt="<?php echo e($review->user->name); ?>" />
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($review->user->name); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($review->rating); ?> /5
                                            </td> 
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($review->comment); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e(date('h:iA, D, d/n/Y', strtotime($review->created_at))); ?>

                                            </td> 
                                            
                                            <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                <a href="<?php echo e(route('review.show', $review->order_id)); ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Review details</a>
               
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
                
                
                <?php else: ?>
        <div class="lg:px-24 lg:py-12 md:py-20 md:px-44 px-4 py-12 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
            <div class="xl:pt-24 w-screen xl:w-1/4 relative pb-12 lg:pb-0">
                <div class="relative">
                    <div >
                        <div class="">
                            <h1 class="z-30 my-2 text-gray-800 font-bold text-2xl">
                                Looks like you've already sent your
                                review
                            </h1>
                            <p class="z-20 my-2 text-gray-800">Big thanks and kudos to you!!</p><br/><br/><br/>
                            <a href="<?php echo e(url()->previous()); ?>" class=" sm:w-full lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-yellow-600 text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-opacity-50">Sure! Alright,bring me back!</a>
                        </div>
                    </div>
                   <!-- <div>
                        <img src="<?php echo e(asset('uploads/menus/'.'love.png')); ?>" width="400px" height="400px" style="opacity:0.2" class="-z-10"/>
                    </div>-->
                </div>
            </div>
            <div>
                <img src="<?php echo e(asset('uploads/menus/'.'review.png')); ?>" width="500px" height="30px"/>
            </div>
    </div>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-0 max-w-md md:max-w-2xl "><!--horizantil margin is just for display-->
                    <div class="flex items-start px-4 py-6">
                        <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                        <div class="">
                        
                            <div class="flex items-center justify-between">
                                <h2 class="text-lg font-semibold text-gray-900 -mt-1"><?php echo e($review->user->name); ?></h2>
                                <small class="text-sm text-gray-700 ml-96"><?php echo e(date('h:iA, D, d/n/Y', strtotime($review->created_at))); ?></small>
                            </div>
                            <p class="text-gray-700">Order ID: <?php echo e($review->order_id); ?></p><br/>
                            <p>Menu:</p>
                            <?php $__currentLoopData = $orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            -<?php echo e($items->products->menuName); ?>-<br/>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <p class="mt-3 text-gray-700 text-sm">
                            Comment:<br/>
                            <?php echo e($review->comment); ?>

                            </p>
                            <div class="mt-4 flex items-center">
                                <div class="flex mr-2 text-gray-700 text-sm mr-3">
                                <svg fill="none" viewBox="0 0 24 24"  class="w-4 h-4 mr-1" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                <span><?php echo e($review->rating); ?> /5</span>
                                </div>
                                
                            </div>
                        
                        </div>
                    </div>
                </div> <br/>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>  
        <?php endif; ?> 


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
    




    <?php /**PATH D:\Coding\GitHub\KoipiamoXTest\Kopiamo\resources\views/review/index.blade.php ENDPATH**/ ?>