<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new product:') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('products.store') }} " method="post">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Name" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="categories_id" :value="__('Categories ID')" />
                            <select name="categories_id" id="categories_id">
                                <option value="1">легкий</option>
                                <option value="2">хрупкий</option>
                                <option value="3">тяжелый</option>
                            </select>
                            <x-input-error :messages="$errors->get('categories_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" placeholder="description" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="Price" class="block mt-1 w-full" type="text" pattern="^\d*(\.\d{0,2})?$" placeholder="0.00" title="Сумма в валюте (например, 123.45)"  name="price" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create new product') }}
                            </x-primary-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
