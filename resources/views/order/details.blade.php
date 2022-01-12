<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order Summary
        </h2>
    </x-slot>

    <div class="container mx-auto py-2">
        <div class="max mx-auto py-8 sm:px-6 lg:px-8 bg-white">
            <div class="pl-20 py-4">
                <p class="text-lg font-bold">Product details</p>
            </div>
            <div class="w-3/4 pl-20">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                </table>
            </div>
            <div class="pl-20 py-4">
                <p class="text-xl font-bold">TOTAL: RM</p>
            </div>
            @foreach ($orders as $order)
            <div class="pl-20">
                <p class="text-lg"><b>Notes: </b>{{ $order->notes }}</p>
                <p class="text-lg"><b>Order status: </b>{{ $order->orderStatus }}</p>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>