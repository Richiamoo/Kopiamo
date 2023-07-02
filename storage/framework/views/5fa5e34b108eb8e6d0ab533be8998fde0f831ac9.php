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
            Checkout
        </h2>
     <?php $__env->endSlot(); ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container p-12 mx-auto">
            <div class="flex flex-col w-4/5 px-0 mx-auto md:flex-row">
                <div class="flex flex-col md:w-full pl-20">
                    <h2 class="mb-4 font-bold md:text-xl text-heading">Customer details
                    </h2>
                    <form class="justify-center w-full mx-auto" method="post" action="<?php echo e(route('order.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if(auth()->guard()->check()): ?>
                        <div>
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full">
                                    <label for="fullName" class="block mb-3 text-sm font-semibold text-gray-500">Full Name</label> 
                                    <input id="fullName" name="fullName" type="text" value="<?php echo e(Auth::user()->name); ?>"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="space-x-0 lg:flex lg:space-x-4">
                                    <div class="w-full lg:w-1/2">
                                        <label for="Email" class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                        <input id="Email" name="Email" type="email" value="<?php echo e(Auth::user()->email); ?>"
                                            class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                            required>
                                    </div>
                                    <div class="w-full lg:w-1/2 ">
                                        <label for="phoneNumber" class="block mb-3 text-sm font-semibold text-gray-500">Phone Number</label>
                                        <input id="phoneNumber" name="phoneNumber" type="text" value="<?php echo e(Auth::user()->phonenum); ?>"
                                            class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                            required>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                            <div class="relative pt-3 xl:pt-6"><label for="note"
                                    class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                                    (Optional)</label><textarea id="note" name="note"
                                    class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    rows="4" placeholder="Notes for takeout"></textarea>
                            </div>
                        </div>
                </div>
                
                <?php if(session('fromCart')): ?>
                <input id="ordertype" name="ordertype" value="cart" hidden>
                <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5 md:ml-12">
                    <div class="pt-12 md:pt-0 2xl:ps-4">
                        <h2 class="text-xl font-bold">Order Summary
                        </h2>
                        <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mt-8">
                            <div class="flex flex-col space-y-4">
                                <div class="flex space-x-4">
                                    <div>
                                        <img src="<?php echo e(asset('uploads/menus/'. $item->options->photo)); ?>"  alt="Image" width="60" class="rounded-full">
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold"><?php echo e($item->name); ?></h2>
                                        <p class="text-sm"><b>Coffee Type: </b><?php echo e($item->options->type); ?></p>
                                        <p class="text-sm"><b>Quantity: </b><?php echo e($item->qty); ?></p>
                                        <span class="text-red-600">Price</span> RM <?php echo e($item->priceTotal()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <input id="total" name="total" value="<?php echo e(Cart::subTotal()); ?>" hidden>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="flex items-center w-full py-4 text-sm font-semibold border-t border-gray-300 lg:py-5 text-heading text-xl last:border-b-0 last:text-base last:pb-0">
                            TOTAL<span class="ml-2" id="sum">RM <?php echo e(Cart::subTotal()); ?></span>
                        </div>
                        <div>
                            <button onclick="swalfunc()" class="w-full inline-flex justify-center py-2 px-4 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Place order | Cash</button>
                        </div>
                        <div id="paypal-button-container" class="pt-3"></div>
                    </div>
                    </form>
                </div>

                
                <?php else: ?>
                <input id="ordertype" name="ordertype" value="buynow" hidden>
                <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5 md:ml-12">
                    <div class="pt-12 md:pt-0 2xl:ps-4">
                        <h2 class="text-xl font-bold">Order Summary
                        </h2>
                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mt-8">
                            <div class="flex flex-col space-y-4">
                                <div class="flex space-x-4">
                                    <div>
                                        <img src="<?php echo e(asset('uploads/menus/'. $menu->coffee_photo_path)); ?>"  alt="Image" width="60" class="rounded-full">
                                    </div>
                                    <div>
                                        <input id="prodID" name="prodID" value="<?php echo e($menu->id); ?>" hidden>
                                        <input id="qty" name="qty" value="1" hidden>
                                        <input id="itemprice" name="itemprice" value="<?php echo e($menu->menuPrice); ?>" hidden>
                                        <h2 class="text-xl font-bold"><?php echo e($menu->menuName); ?></h2>
                                        <p class="text-sm"><b>Coffee Type: </b><?php echo e($menu->menuType); ?></p>
                                        <p class="text-sm"><b>Quantity: </b>1</p>
                                        <span class="text-red-600">Price</span> RM <?php echo e($menu->menuPrice); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <input id="total" name="total" value="<?php echo e($menu->menuPrice); ?>" hidden>
                        <div
                            class="flex items-center w-full py-4 text-sm font-semibold border-t border-gray-300 lg:py-5 text-heading text-xl last:border-b-0 last:text-base last:pb-0">
                            TOTAL<span class="ml-2" id="sum">RM <?php echo e($menu->menuPrice); ?></span></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <button onclick="swalfunc()" class="w-full inline-flex justify-center py-2 px-4 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Place order | Cash</button>
                        </div>
                        <div id="paypal-button-container" class="pt-3"></div>
                    </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=Abv9MPoFAmYSYzc4JBwlK5HY7T6qMoTnFiyoaPVJ-TdXjVR8ovF_Qby5D9hzK5C8-J6hE4jexpHnGj9k&currency=MYR"></script>
    <!-- jquery for ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- sweetalert cdn -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    paypal.Buttons({

    // Sets up the transaction when a payment button is clicked
    createOrder: function(data, actions) {
    return actions.order.create({
        purchase_units: [{
        amount: {
            value           :   $('#total').val(),
            currency_code   :   "MYR",
        }
        }]
    });
    },

    // Finalize the transaction after payer approval
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            // var transaction = orderData.purchase_units[0].payments.captures[0];
            // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

            var data = {
                'fullName': $('#fullName').val(),
                'Email': $('#Email').val(),
                'phoneNumber': $('#phoneNumber').val(),
                'note': $('#note').val(),
                'total': $('#total').val(),
                'ordertype': $('#ordertype').val(),
                'prodID': $('#prodID').val(),
                'itemprice': $('#itemprice').val(),
                'qty': $('#qty').val(),
            }
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/store-paypal",
                data: data,
                dataType: "json",
                success: function(response){
                    swal(response.status);
                    setTimeout('window.location.href = "/my-orders"', 2000);
                }
            });
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
        });
    }
    }).render('#paypal-button-container');
     
    function swalfunc(){
        setTimeout(swal("Order placed successfully!"), 2000);
    }

    </script>

    </body>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>

<?php /**PATH D:\Coding\GitHub\KoipiamoXTest\Kopiamo\resources\views/order/checkout.blade.php ENDPATH**/ ?>