<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Cart
        </h2>
    </x-slot>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c28a70ce29.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <style>
          #summary {
            background-color:  #BE8E4B;
          }
        </style>
      </head>
      
      <body class="bg-gray-100">
        <div class="container mx-auto mt-10">
          <div class="flex shadow-md my-10">
            <div class="w-3/4 bg-white px-10 py-10">
              <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                {{-- @foreach (Cart::content() as $item) --}}
                    <h2 class="font-semibold text-2xl">{{ Cart::content()->count() }} Drinks</h2> 
                {{-- @endforeach --}}
              </div>
              <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Menu Details</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
              </div>
              @foreach ($carts as $cart)
                <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5"> <!-- product -->
                        <div class="w-20">
                            <img class="h-24" src="{{ asset('uploads/menus/'. $cart->options->photo) }}" alt="">
                        </div>
                        <div class="flex flex-col justify-between ml-4 flex-grow">
                            <span class="font-bold text-sm">{{ $cart->name }}</span>
                            <span class="text-red-500 text-xs">{{ $cart->options->type }}</span>
                            <form class="inline-block" action="{{ route('cart.destroy', $cart->rowId) }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="font-semibold hover:text-red-500 text-gray-500 text-xs confirm_delete">Remove</button>
                            </form>
                        </div>
                    </div>

                    <span class="text-center w-1/5 font-semibold text-sm">RM{{ $cart->price(2) }}</span>
                    <div class="flex justify-center w-1/5">
                        <div>
                            <form action={{ route('cart.update', $cart->rowId)}} method="post">
                                @csrf
                                @method('PUT')
                            <input
                                type="number"
                                class="form-control block w-20 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="cart_qty" name="cart_qty"
                                placeholder="Number input"
                                value={{ $cart->qty }}
                            />
                        </div>
                        <div>
                            <button id="confirm_update" class="text-blue-600 hover:text-blue-900 mt-2 ml-5 fas fa-edit confirm_update" ></button>
                            
                        </div>
                            </form>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm">RM{{ $cart->priceTotal() }}</span>
                </div>
              @endforeach
    
            </div>
      
            <div id="summary" class="w-1/4 px-8 py-10">
              <h1 class="font-semibold text-2xl border-b pb-8 text-white">Order Summary</h1>
              <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase text-white">Total Items </span>
                <span class="font-semibold text-sm text-white">{{ Cart::content()->count() }}</span>
              </div>
              <div class="flex justify-between mt-10 mb-5 text-white">
                <span class="font-semibold text-sm uppercase text-white">Subtotal</span>
                <span class="font-semibold text-sm text-white">RM{{ Cart::subTotal() }}</span>
              </div>
              <div class="flex justify-between mt-10 mb-5 text-white">
                <span class="font-semibold text-sm uppercase text-white">Sales Tax</span>
                <span class="font-semibold text-sm text-white">RM 0.00</span>
              </div>
              <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase text-white">
                  <span>Total cost</span>
                  <span>RM{{ Cart::subTotal() }}</span>
                </div>
                <form action="{{ route('checkout.pagetocheckout') }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="from" value="cartpage">
                    <button type="submit" class= "py-3 text-sm w-full inline-flex items-center px-4 bg-[#e4bc84] border border-transparent rounded-md font-semibold text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Checkout</button>
                </form>
              </div>
            </div>
      
          </div>
        </div>
      </body>
      
</x-app-layout>
<script>
  //CONFIRM DELETE
  $(document).ready(function() {
    $('.confirm_delete').click(function(e) {
      e.preventDefault();
      var form = e.target.form;
      swal({
        title: "Are you sure you want to remove this item from your cart?",
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


    $('#confirm_update').click(function(e) {
      e.preventDefault();
      var form = e.target.form;
      swal({
        title: "Are you sure you want to update the quantity?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willUpdate) => {
        if (willUpdate) {
          form.submit();
          swal("Item quantity successfully updated!", {
            icon: "success",
          });
        } else {
          
        }
      });
    })
  })

</script>