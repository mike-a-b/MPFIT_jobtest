<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new order:') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('orders.store') }} " method="post">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="fio" :value="__('FIO')" />
                            <x-text-input id="fio" class="block mt-1 w-full" type="text" name="fio" :value="old('fio')"
                                          placeholder="FIO" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('fio')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="product_id" :value="__('Product')" />
                            <select name="product_id" class="block mt-1 w-full" id="product_id">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            {{--<x-text-input id="product_id" class="block mt-1 w-full" type="text" name="product_id"--}}
                            {{--:value="$order->product_id" required autocomplete="off" />--}}
                            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                                          placeholder="quantity"  required autocomplete="off" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="comment" :value="__('Comment')" />
                            <x-text-input id="comment" class="block mt-1 w-full" type="text" name="comment"
                                          placeholder="comment" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Save order') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

