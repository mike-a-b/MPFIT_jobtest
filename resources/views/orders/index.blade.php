<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <thead>
                        <tr>
                            <th scope="col">FIO</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->fio }}</td>
                                <td>{{ $order->product?->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->comment }}</td>
                                <td>{{ $order->status ? "Выполнено" : "Новый" }}</td>
                                <td><a href="{{ route('orders.show', $order) }}">[SHOW DETAILS/EDIT]</a ></td>
                                <td>
                                    <form action="{{ route('orders.destroy', $order) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button class="ms-4">
                                            {{ __('[DELETE]') }}
                                        </x-primary-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

