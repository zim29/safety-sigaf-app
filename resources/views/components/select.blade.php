@props([
        'disabled' => false,
        'options' => [],
        'id' => rand(),
        'tabindex' => '1000',
        'autofocus' => false,
        'label' => '', 
        'class' => '', 
        ])

<div class="form-floating mb-3">
    <select 
            class="form-select {{ $class }} {{ $errors->has( $id ) ? 'is-invalid' : '' }}" 
            {{ $disabled ? 'disabled' : '' }}
            id="{{ $id }}" 
            placeholder="{{ __( $label )  }}" 
            tabindex="{{ $tabindex }}" 
            {{ $autofocus ? 'autofocus' : '' }}
            {{$attributes}}
    >
        <option value="" disabled >Escoja una opción</option>
        @foreach($options as $option)
            <option value="{{ $option['id'] }}" >{{ $option['name'] }}</option>
        @endforeach
    </select>
    <label for="{{ $id }}" class="form-label text-default">{{ __($label) }}</label>
    @error( $id )
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

