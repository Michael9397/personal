<?php

use App\Livewire\Forms\wine\WineForm;
use App\Models\Wine;
use Livewire\Volt\Component;

new class extends Component {

    public wineForm $form;
    public ?Wine $wine = null;

    public function mount()
    {
        if (! auth()->user() || ! auth()->user()->can('adminWine', auth()->user())) {
            $this->redirect(route('wine.index'));
        }
        if ($this->wine) {
            $this->form->setForm($this->wine);
        }
        if (empty($this->form->time_tried)) {
            $this->form->time_tried = now()->format('Y-m-d');
        }
    }

    public function save()
    {
        $this->form->save();
        $this->redirect(route('wine.index'));
    }
}; ?>

<div class="flex items-center justify-center">
    <div class="m-auto mb-4 max-w-[550px] w-full bg-white dark:bg-gray-900">
        <form class="py-4 px-9" wire:submit="save">
            <div>
                <div class="mb-5">
                    @if (str_contains(Route::currentRouteName(), 'create'))
                        <h2 class="text-2xl">Add New Wine</h2>
                    @else
                        <h2 class="text-2xl">Edit Wine</h2>
                    @endif
                </div>
                <div class="mb-5">
                    <x-input-label class="block" for="article-title">Name of Wine</x-input-label>
                    <input
                        type="text"
                        class="p-2 w-full border rounded-md dark:bg-gray-900 dark:text-white"
                        wire:model="form.name"
                    >
                    <div>
                        @error('form.name') <span class="text-red-600">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-5">
                    <x-input-label for="form.color">Red or White</x-input-label>
                    <select
                        id="type"
                        wire:model="form.color"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white"
                    >
                        <option value="" disabled selected>Select type</option>
                        <option value="red">Red</option>
                        <option value="white">White</option>
                    </select>
                    @error('form.color') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-5">
                    <x-input-label for="type">Type</x-input-label>
                    <x-text-input wire:model="form.type" name="type" id="type" class="w-full"/>
                </div>
                <div class="mb-5">
                    <x-input-label for="from">From</x-input-label>
                    <x-text-input wire:model="form.from" name="from" id="from" class="w-full"/>
                </div>
                <div class="mb-5">
                    <x-input-label for="liked-it">Liked it</x-input-label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            <input
                                type="radio"
                                name="liked-it"
                                id="liked-it-yes"
                                value="1"
                                wire:model="form.liked_it"
                                class="text-indigo-600 border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white"
                            >
                            <span class="ml-2">Yes</span>
                        </label>
                        <label class="inline-flex items-center ml-4">
                            <input
                                type="radio"
                                name="liked-it"
                                id="liked-it-no"
                                value="0"
                                wire:model="form.liked_it"
                                class="text-indigo-600 border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white"
                            >
                            <span class="ml-2">No</span>
                        </label>
                    </div>
                    @error('form.liked_it')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-5">
                    <x-input-label>Notes</x-input-label>
                    <x-textarea-input wire:model="form.notes" class="w-full"/>
                </div>
                <div class="mb-5">
                    <x-input-label for="date_tried">Date Tried</x-input-label>
                    <input
                        type="date"
                        id="time_tried"
                        wire:model="form.time_tried"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:text-white"
                    />
                    @error('form.time_tried') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full inline-flex justify-center items-center px-4 py-2 bg-[#800020] text-white text-sm font-medium rounded-md shadow-sm hover:bg-[#66001a] focus:outline-none focus:ring focus:ring-[#800020] focus:ring-opacity-50"
                    >
                        Save Wine
                    </button>
                </div>


        </form>
    </div>
</div>
