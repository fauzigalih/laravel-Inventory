@php
    $invalid = ($errors->get($name) ? 'form-control-file is-invalid' : 'form-control-file');
@endphp
<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::file($name,
        array_merge(
            [
                'class' => $invalid, 
                'id' => $name,
            ], 
            $attributes,
        )) }}
    @error ($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>