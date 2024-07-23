<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
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

                @forelse ($my_transactions as $transaction)
                    <div class="item-product flex flex-row justify-between">
                        <img src="{{ Storage::url($transaction->product->cover) }}" class="h-[100px]" alt="Product Cover">
                        <div>
                            <h3>{{ $transaction->product->name }}</h3>
                            <p>{{ $transaction->product->category->name }}</p>
                        </div>
                        <div>
                            <p>Rp.{{ $transaction->price }}</p>
                        </div>
                        <div>
                            <p>{{ $transaction->is_paid ? 'Paid' : 'Unpaid' }}</p>
                        </div>
                        <div class="flex flex-row gap-x-3">
                            <a href="{{ route('admin.products_orders.show', $transaction->order) }}" class="py-5 px-3 bg-indigo-500 text-white">
                                Details
                            </a>
                        </div>
                    </div>
                @empty
                    <h1>Belum Ada Transaksi Anda Tersedia</h1>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
