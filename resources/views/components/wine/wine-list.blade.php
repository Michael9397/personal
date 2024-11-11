<section class="py-1 bg-blueGray-50">
    <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-2">
        <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-800 w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">All Wines</h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <button class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Add Wine</button>
                    </div>
                </div>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                    <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Name
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Type
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            From
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Liked it?
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left max-w-1">
                            notes
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Time Tried
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($wines as $wine)
                        <tr>
                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                {{ $wine->name }}
                            </th>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                <x-wine.icons.wine-glass :isRed="$wine->type == 'red'"/>
                            </td>
                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $wine->from }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                @if($wine->liked_it == '1')
                                    <x-wine.icons.thumbs-up />
                                @endif
                            </td>
                            <td class="w-1/3 max-w-xs border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs p-4">
                                {{ $wine->notes }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $wine->time_tried_formatted }}
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No wines found.</td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
