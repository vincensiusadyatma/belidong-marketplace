<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col gap-y-5 p-10">
                
            <a href="{{ route('admin.products.create') }}" class="w-fit py-5 px-3 bg-indigo-500 text-white">Add new product</a>
              @foreach ($products as $product)
                <div class="item-product flex flex-row justify-between">
                    <img src="{{ Storage::url($product->cover) }}" class="h-[100px]" alt="Product Cover">
                    <div>
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->category->name }}</p>
                        <p>{{ $product->creator->name }}</p>
                    </div>
                    <div>
                        <p>Rp.{{ $product->price }}</p>
                    </div>
                    <div class="flex flex-row gap-x-3">
                        <a href="" class="py-5 px-3 bg-indigo-500 text-white">Edit</a>
                        <a href="" class="py-5 px-3 bg-red-500 text-white">Delete</a>
                    </div>
                </div>
                @empty($products)
                    <h1>Belum Ada Product Tersedia</h1>
                @endempty
              @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
