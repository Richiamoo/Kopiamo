<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
<script src="https://cdn.tailwindcss.com"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c28a70ce29.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>



<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-white leading-tight mt-5">
                    Menu List
                </h2>
            </div>
            <form class="w-full max-w-sm" action="<?php echo e(url('/search')); ?>" method="GET">
                <div class="flex items-center py-2">
                  <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="search" type="search" placeholder="Search Menu">
                  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => []]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                    Search
                   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </form>
        </div>
     <?php $__env->endSlot(); ?>
    
    

    <?php echo $__env->make('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php if(auth()->guard()->check()): ?> 
                <?php if(Auth::user()->name === 'admin'): ?>
                    <div class="block mb-8">
                        <a href="<?php echo e(route('menu.create')); ?>" class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Add Menu</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->name === 'admin'): ?>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>

                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Image
                                        </th>
                                        
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Action
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuName); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuDesc); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuType); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuPrice); ?>

                                            </td>   
                                            <td>
                                                <img src="<?php echo e(asset('uploads/menus/'. $menu->coffee_photo_path)); ?>" height="100px;" width="100px;"  alt="Image"> 
                                            </td>

                                            

                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->name === 'admin'): ?>
                                                    <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                        <!--<a href="<?php echo e(route('menu.show', $menu->id)); ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> -->
                                                        <a href="<?php echo e(route('menu.edit', $menu->id)); ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                        <form class="inline-block" action="<?php echo e(route('menu.destroy', $menu->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <button type="submit" class="confirm_delete text-red-600 hover:text-red-900 mr-2 mt-4" >Delete</button>
                                                        </form>
                                                    </td>
                                                
                                                <?php endif; ?>
                                                
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="flex flex-col">
                                <div class="grid grid-flow-cols grid-rows-auto grid-cols-4 gap-4">
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                                            <!--<img src="img/carousel1.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">-->
                                            <div class="p-2">
                                                <p class="w-full min-h-40 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-50 lg:aspect-none">
                                                    <img src="<?php echo e(asset('uploads/menus/'. $menu->coffee_photo_path)); ?>"  alt="Image"> 
                                                </p>
                                                <br/>
                                                <h2 class="font-bold test-lg mb-2"><?php echo e($menu->menuName); ?></h2>
                                                <p class="text-sm text-gray-600"><?php echo e($menu->menuDesc); ?><p>
                                                <p class="text-sm text-gray-600"><?php echo e($menu->menuType); ?><p>
                                                <p class="text-sm text-gray-600">RM <?php echo e($menu->menuPrice); ?><p>
                                                
                                            </div>
                                            <div>
                                                <form action="<?php echo e(url('buy-now', $menu->id)); ?>" method="GET">
                                                    <?php echo csrf_field(); ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'mt-4 ']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mt-4 ']); ?>
                                                        <?php echo e(__('Buy Now')); ?>

                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                </form>
                                                <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="menu_id" value="<?php echo e($menu->id); ?>">
                                                    <input type="hidden" name="quantity" value="1"> 
                                                    
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => []]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                                                        <?php echo e(__('Add to Cart')); ?>

                                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                </form>
                                            </div>
                                       
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div> 
                </div>
            <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>  


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<script>
    //CONFIRM DELETE
    $(document).ready(function() {
      $('.confirm_delete').click(function(e) {
        e.preventDefault();
        var form = e.target.form;
        swal({
          title: "Are you sure you want to remove this drink from the menu?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("Item successfully deleted!", {
              icon: "success",
            });
          } else {
            
          }
        });
      })

    })
  
  </script><?php /**PATH D:\Coding\GitHub\KoipiamoXTest\Kopiamo\resources\views/menu/index.blade.php ENDPATH**/ ?>