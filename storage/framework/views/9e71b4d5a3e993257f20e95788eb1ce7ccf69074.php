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
            Orders List
        </h2>
     <?php $__env->endSlot(); ?>
    <head>

        <script src="https://kit.fontawesome.com/c28a70ce29.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <div class="container mx-auto">
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg text-white font-semibold bg-[#BE8E4B]">
                <h2>Active orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-[#37251b]">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Total (RM)
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order status
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order details
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($order->orderStatus != "Completed" && $order->user_id === Auth::user()->id): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e(date('h:iA, D, d/n/Y', strtotime($order->created_at))); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->totalPrice); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->orderStatus); ?>

                            </td>
                            <form action="<?php echo e(url('order-details', $order->id)); ?>" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    <?php elseif($order->orderStatus != "Completed" && Auth::user()->name === 'admin'): ?>
                    <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e(date('h:iA, D, d/n/Y', strtotime($order->created_at))); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->totalPrice); ?>

                            </td>
                            <form action="<?php echo e(route('order.show', $order->id)); ?>" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <select name="status">
                                        <?php if($order->orderStatus == "Pending"): ?>
                                            <option value="Pending" selected>Pending</option>
                                            <option value="Ready to pick up">Ready to pick up</option>
                                            <option value="Completed">Completed</option>
                                        <?php else: ?>
                                            <option value="Pending">Pending</option>
                                            <option value="Pick up" selected>Ready to pick up</option>
                                            <option value="Completed">Completed</option>
                                        <?php endif; ?>                                        
                                    </select>
                                    <button id="confirm_update" class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    Update</button>
                                </td>
                            </form>
                            <form action="<?php echo e(url('order-details', $order->id)); ?>" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div><br><br>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg text-white font-semibold bg-[#BE8E4B]">
                <h2>Completed orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-[#37251b]">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Total (RM)
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order status
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order details
                            </th>
                            <?php if(Auth::user()->name != 'admin'): ?>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Action
                            </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($order->orderStatus == "Completed" && $order->user_id === Auth::user()->id): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e(date('h:iA, D, d/n/Y', strtotime($order->created_at))); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->totalPrice); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->orderStatus); ?>

                            </td>
                            <form action="<?php echo e(url('order-details', $order->id)); ?>" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    View</button>
                                </td>
                            </form>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <a href="<?php echo e(url('add-review',$order->id)); ?>" class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Leave a review</a>
                            </td>
                        </tr>
                    <?php elseif($order->orderStatus == "Completed" && Auth::user()->name === 'admin'): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e(date('h:iA, D, d/n/Y', strtotime($order->created_at))); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->totalPrice); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->orderStatus); ?>

                            </td>
                            <form action="<?php echo e(url('order-details', $order->id)); ?>" method="GET">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <button class="inline-flex items-center px-4 py-2 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    View</button>
                                </td>
                            </form>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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
  $(document).ready(function() {

    $('#confirm_update').click(function(e) {
      e.preventDefault();
      var form = e.target.form;

          form.submit();
          swal("Order status successfully changed!", {
            icon: "success",
          });

    })
  })

</script><?php /**PATH D:\Coding\GitHub\KoipiamoXTest\Kopiamo\resources\views/order/index.blade.php ENDPATH**/ ?>