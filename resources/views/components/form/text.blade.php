<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, 
        array_merge(
            [
                "class" => "form-control" . "@error('invoice') is-invalid @enderror", 
                'placeholder' => ucwords(str_replace('_', ' ', $name)),
                'id' => $name,
            ], 
            $attributes,
        )) }}
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
