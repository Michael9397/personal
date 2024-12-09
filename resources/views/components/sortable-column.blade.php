@props(['field', 'sortField', 'sortDirection', 'label'])

<th
    class="cursor-pointer px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs border-l-0 border-r-0 whitespace-nowrap font-bold text-left"
    wire:click="sortBy('{{ $field }}')"
>
    {{ $label }}
    @if ($sortField === $field)
        @if ($sortDirection === 'asc')
            ▲
        @else
            ▼
        @endif
    @endif
</th>
