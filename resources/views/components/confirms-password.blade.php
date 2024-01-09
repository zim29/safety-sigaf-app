@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="
        if(document.getElementById('{{$confirmableId}}') !== null) bootstrap.Modal.getOrCreateInstance(document.getElementById('{{$confirmableId}}')).hide()
        setTimeout(
            () => 
                $event.detail.id === '{{ $confirmableId }}' && 
                $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false }))
        , 250);"
>
    {{ $slot }}
</span>

@once
<x-dialog-modal id="{{ $confirmableId }}">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        <p class="text-center"><i class="bi bi-shield-lock-fill text-warning" style="font-size: 5rem;"></i></p>
        <p class="text-center fs-40">Acción Requerida</p>
        <p class="text-center fs-22">{{ $content }}</p>
        

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="bootstrap.Modal.getOrCreateInstance(document.getElementById('{{$confirmableId}}')).show(); setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <x-input type="password" class="mt-1 block w-3/4 {{ $errors->has('confirmable_password') ? 'is-invalid' : '' }} }}" placeholder="{{ __('Password') }}" autocomplete="current-password"
                        x-ref="confirmable_password"
                        wire:model="confirmablePassword"
                        wire:keydown.enter="confirmPassword" />

        </div>
    </x-slot>

    <x-slot name="footer">
        <div class="vstack gap-1">
            <button class="btn btn-warning w-100" wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="btn btn-success w-100" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
                {{ $button }}
            </button>
        </div>
    </x-slot>
</x-dialog-modal>
@endonce
