@props([
    'disabled' => false,
    'type' => 'text',
    'id' => rand(),
    'tabindex' => '1000',
    'autofocus' => false,
    'label' => '',
    ])

<div class="form-floating mb-3">
    <input 
        id="{{ $id }}" 
        placeholder="{{ __( $label )  }}" 
        type="{{ $type }}"
        class="{{ $attributes['class'] ?? '' }} {{ $errors->has( $id ) ? 'is-invalid' : '' }}  form-control"
        tabindex="{{ $tabindex }}" 
        {{ $autofocus ? 'autofocus' : '' }}
        {{$attributes}}
    />
    <label for="{{ $id }}">{{ __( $label )  }}</label>

    @error( $id )
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>