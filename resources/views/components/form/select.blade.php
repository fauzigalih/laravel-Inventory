<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::select($name, $value ?? ['One', 'Two', 'Three'], null, array_merge(
        [
            'class' => 'form-control', 
            'placeholder' => 'Select ' . ucwords(str_replace('_', ' ', $name)),
        ], $attributes)) }}
</div>