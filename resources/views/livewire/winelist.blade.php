<?php

use App\Models\Wine;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {

    public $count = 0;
    public Collection $wines;
    public $sortField = 'time_tried';
    public $sortDirection = 'desc';
    public bool $hasEditAccess = false;

    public function mount()
    {
        $this->wines = Wine::orderBy('time_tried', 'desc')->get();
        if (auth()->user() && auth()->user()->can('adminWine', auth()->user())) {
            $this->hasEditAccess = true;
        }
    }

    public function sortBy($field)
    {
        $this->count++;
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->wines = Wine::orderBy($this->sortField, $this->sortDirection)->get();
    }


} ?>

<section class="py-1 bg-blueGray-50">
    <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-2">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-800 w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                        <h3 class="font-bold text-base text-blueGray-700">All Wines</h3>
                    </div>
                    @if($hasEditAccess)
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a
                                href="/wine/create"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            >Add Wine</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                    <tr>
                        <x-sortable-column
                            field="name"
                            :sortField="$sortField"
                            :sortDirection="$sortDirection"
                            label="Name"
                        />
                        <x-sortable-column
                            field="color"
                            :sortField="$sortField"
                            :sortDirection="$sortDirection"
                            label="Color"
                        />
                        <x-sortable-column
                            field="type"
                            :sortField="$sortField"
                            :sortDirection="$sortDirection"
                            label="Type"
                        />
                        <x-sortable-column
                            field="from"
                            :sortField="$sortField"
                            :sortDirection="$sortDirection"
                            label="From"
                        />
                        <x-sortable-column
                            field="liked_it"
                            :sortField="$sortField"
                            :sortDirection="$sortDirection"
                            label="Liked It?"
                        />
                        @if($hasEditAccess)
                            <x-sortable-column
                                field="notes"
                                :sortField="$sortField"
                                :sortDirection="$sortDirection"
                                label="Notes"
                            />
                        @endif
                        <x-sortable-column
                            field="time_tried"
                            :sortField="$sortField"
                            :sortDirection="$sortDirection"
                            label="Date Tried"
                        />
                        @if($hasEditAccess)
                            <th
                                class="cursor-pointer px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs border-l-0 border-r-0 whitespace-nowrap font-bold text-left"
                            >
                                Actions
                            </th>
                        @endif
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($wines as $wine)
                        <tr>
                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                {{ $wine->name }}
                            </th>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                <x-wine.icons.wine-glass :isRed="$wine->color == 'red'"/>
                            </td>
                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $wine->type }}
                            </td>
                            <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $wine->from }}
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                @if($wine->liked_it == '1')
                                    <x-wine.icons.thumbs-up/>
                                @endif
                            </td>
                            @if($hasEditAccess)
                                <td class="w-1/3 max-w-xs border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs p-4">
                                    {{ $wine->notes }}
                                </td>
                            @endif
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                {{ $wine->time_tried_formatted }}
                            </td>
                            @if($hasEditAccess)
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <a
                                        href="{{ route('wine.edit', $wine) }}"
                                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    >Edit</a>
                                </td>
                            @endif

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

