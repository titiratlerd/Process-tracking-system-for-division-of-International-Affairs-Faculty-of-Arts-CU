<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            <div class="py-12">
                <form method="POST" action="{{route('product.store')}}">
                    @csrf 
                    @method('post')
                    <div>
                        <label class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <input type="text" name="name" placeholder="Name" />
                        @error('name')
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium leading-6 text-gray-900">Qty</label>
                        <input type="text" name="qty" placeholder="Qty" />
                        @error('qty')
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                        <input type="text" name="price" placeholder="Price" />
                        @error('price')
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <input type="text" name="description" placeholder="Description" />
                        @error('description')
                            <div class="text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <input type="submit" class="bg-pink-400 pointer-events-auto "value="Save a New Product" />
                    </div>
                </form>



        </div>
    </div>

    
    </div>
</x-app-layout>