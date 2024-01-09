@props([
    'sortable' => false,
    'field' => null,
    ])
<th {{ $attributes }} {!! !$sortable ?: "wire:click=\"sortBy('$field')\" sortable" !!} >
    {{ $slot }}
    @if($sortable && isset($this->sortField) && $field === $this->sortField)
        <span><i class="bi bi-arrow-{{$this->sortDirection === 'ASC' ? 'up' : 'down'}}-short"></i></span>
    @endif
</th>