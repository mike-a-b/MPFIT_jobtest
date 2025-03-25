<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-bordered table-info">
                        <tr>
                            <td class="font-semibold">1. Manage products</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('products.index') }}">Show list of products. Manage products</a></td>
                        </tr>
                        <tr>
                            <td><a  href="{{ route('products.create') }}">Add new product</a></td>
                        </tr>
                        <tr>
                            <td class="font-semibold">2. Manage orders</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('orders.index') }}">Show list of orders. Manage orders</a></td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('orders.create') }}">Add new order</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
