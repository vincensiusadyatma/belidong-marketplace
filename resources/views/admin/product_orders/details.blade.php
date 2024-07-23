<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col gap-y-5 p-10">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-white bg-red-500 py-5">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
        
                    <div class="item-product flex flex-col gap-y-5 items-center">
                        <img src="{{ Storage::url($order->proof) }}" class="h-auto w-[300px]" alt="Product Cover">
                        <div>
                            <h3>{{ $order->product->name }}</h3>
                            <p>{{ $order->product->category->name }}</p>
                            <p>{{ $order->product->creator->name }}</p>
                        </div>
                        <div class="flex flex-row gap-x-5 items-center">
                            <p class="mb-2">Rp.{{ $order->total_price }}</p>
                            @if ($order->is_paid)
                                <span class="py-2 px-5 rounded-full bg-orange-500 text-white">
                                    Paid
                                </span>
                            @else
                                <span class="py-2 px-5 rounded-full bg-orange-500 text-white">
                                    Pending
                                </span>
                            @endif
                           
                        </div>
                        <div class="flex flex-row gap-x-3">
                            <form action="{{ route('admin.product_orders.update',$order) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="py-5 px-3 bg-indigo text-white">Approve Now</button>
                            </form>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
</x-app-layout>
