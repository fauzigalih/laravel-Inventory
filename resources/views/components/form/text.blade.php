@php
    $invalid = ($errors->get($name) ? 'form-control is-invalid' : 'form-control');
@endphp
<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, 
        array_merge(
            [
                'class' => $invalid,
                'placeholder' => ucwords(str_replace('_', ' ', $name)),
            ],
            $attributes,
            )) }}
    @error ($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
