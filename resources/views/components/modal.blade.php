@props([
        'id' => md5($attributes->wire('model')), 
])

<div class="modal fade effect-scale" id="{{ $id }}"
    data-bs-backdrop="static"
    x-on:close.stop="show = false"
    {{$attributes}}
    wire:ignore.self
>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>

