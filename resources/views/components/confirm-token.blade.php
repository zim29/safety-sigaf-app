@props(['title' => __('Confirmar código Token'), 'content' => __('Esta acción require verificación de código Token. Por favor ingrese a su apliación de autenticación y digite el código provisto que no esté próximo a vencer.'), 'button' => __('Autorizar')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<div
    class="w-100"
    {{ $attributes }}
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingToken('{{ $confirmableId }}');"
    x-on:token-confirmed.window="
        if(document.getElementById('{{$confirmableId}}') !== null) bootstrap.Modal.getOrCreateInstance(document.getElementById('{{$confirmableId}}')).hide()
        setTimeout(
            () => 
                $event.detail.id === '{{ $confirmableId }}' && 
                $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false }))
        , 250);"
>
    {{ $slot }}
</div>

@once
<x-dialog-modal id="{{ $confirmableId }}" data-bs-backdrop="static">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        <p class="text-center"><i class="bi bi-shield-lock-fill text-warning" style="font-size: 5rem;"></i></p>
        <p class="text-center fs-40">Acción Requerida</p>
        <p class="text-center fs-20">{{ $content }}</p>

        <div class="mt-4" x-data="{}" x-on:confirming-code.window="
            bootstrap.Modal.getOrCreateInstance(document.getElementById('{{$confirmableId}}')).show(); setTimeout(() => $refs.confirmableOTP.focus(), 250)"
        >
        <div class="row gy-3">
            <div class="col-xl-12 mb-2">
                <x-input 
                    id="confirmableOTP"
                    type="text" 
                    label="{{ __('Codigo token') }}" 
                    autocomplete="one-time-code"
                    x-ref="confirmableOTP"
                    wire:model="confirmableOTP"
                    wire:keydown.enter="confirmCode"
                    maxlength="6"
                    onkeypress="validateInput(event, '^[0-9]')"  />
            </div>
        </div>
            

        </div>
    </x-slot>

    <x-slot name="footer">
        <div class="vstack gap-1">
            <button class="btn btn-success w-100" dusk="confirm-password-button" wire:click="confirmCode" wire:loading.attr="disabled">
                {{ $button }}
            </button>
            <button class="btn btn-warning w-100" wire:click="stopConfirmingToken" x-on:click="bootstrap.Modal.getOrCreateInstance(document.getElementById('{{$confirmableId}}')).hide();" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </button>
        </div>
    </x-slot>
</x-dialog-modal>


@endonce

