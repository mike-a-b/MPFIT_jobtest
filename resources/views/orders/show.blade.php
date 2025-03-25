<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order data:') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('orders.update', $order) }} " method="post">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="fio" :value="__('FIO')" />
                            <x-text-input disabled="" id="fio" class="block mt-1 w-full" type="text" name="fio"
                                          :value="$order->fio" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('fio')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="product_id" :value="__('Product')" />
                            <select disabled="" name="product_id" class="block mt-1 w-full" id="product_id">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
{{--                            <x-text-input id="product_id" class="block mt-1 w-full" type="text" name="product_id"--}}
{{--                                          :value="$order->product_id" required autocomplete="off" />--}}
                            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input disabled="" id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                                          :value="$order->quantity" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="comment" :value="__('Comment')" />
                            <x-text-input disabled="" id="comment" class="block mt-1 w-full" type="text" name="comment"
                                          :value="$order->comment" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <p><input type="checkbox" name="status" value="1" @checked($order->status)> ORDER COMPLETE</p>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

