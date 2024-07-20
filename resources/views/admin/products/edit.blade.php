<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10  sm:rounded-lg">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-white bg-red-500 py-5">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.products.update',$product) }}" enctype="multipart/form-data">
                    <h1>EditProduct</h1>
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="cover" :value="__('cover')" />
                        <img src="{{ Storage::url($product->cover) }}" class="h-[100px]" alt="Product Cover">
                        <x-text-input id="cover" class="block mt-1 w-full" type="file" name="cover" :value="old('cover')"   />
                        <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="path_file" :value="__('path_file')" />
                        <p>
                            {{ Storage::url($product->path_file) }}
                        </p>
                        <x-text-input id="path_file" class="block mt-1 w-full" type="file" name="path_file" :value="old('path_file')"   />
                        <x-input-error :messages="$errors->get('path_file')" class="mt-2" />
                    </div>
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input value="{{ $product->name }}" id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input value="{{ $product->price }}" id="price" class="block mt-1 w-full" type="number" name="price"  required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('category')" />
                            <select name="category_id" id="category" class="w-full py-4W">
                                <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty($categories)
                                    
                                @endempty
                                @endforeach
                            
                            
                            </select>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('about')" />
                        <textarea value="{{ $product->about }}" name="about" id="about" class="w-full"></textarea>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                   
            
            
                    <div class="flex items-center justify-end mt-4">
                     
            
                        <x-primary-button class="ms-4">
                            {{ __('Update Product') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
