@php
    $invalid = ($errors->get($name) ? 'form-control is-invalid' : 'form-control');
@endphp
<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::select($name, $value ?? ['One', 'Two', 'Three'], null, array_merge(
        [
            'class' => $invalid, 
            'placeholder' => 'Select ' . ucwords(str_replace('_', ' ', $name)),
        ], $attributes)) }}
    @error ($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>