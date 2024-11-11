<x-wine-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-bold text-base text-2xl text-blueGray-700">List of All Wines</h2>
                    <x-wine.wine-list :wines="$wines"/>
                </div>
            </div>
        </div>
    </div>
</x-wine-layout>

{{--<h1>Wines</h1>--}}
{{--    <ul>--}}
{{--        @foreach ($wines as $wine)--}}
{{--            <li>{{ $wine->name }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}

