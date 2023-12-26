@props([
    'disabled' => false,
    'id' => rand(),
    'tabindex' => '1000',
    'autofocus' => false,
    'label' => '',
    ])

<div class="form-check">
    <input 
        id="{{ $id }}" 
        type="checkbox"
        class="{{ $attributes['class'] ?? '' }} {{ $errors->has( $id ) ? 'is-invalid' : '' }}  form-check-input"
        tabindex="{{ $tabindex }}" 
        {{ $autofocus ? 'autofocus' : '' }}
        {{$attributes}}
    />
    <label for="{{ $id }}">{{ __( $label ?? '' )  }}</label>

    @error( $id )
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>