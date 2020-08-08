<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::number($name, $value, 
        array_merge(
            [
                'class' => 'form-control', 
                'placeholder' => ucwords(str_replace('_', ' ', $name)),
                'id' => $name,
            ], 
            $attributes,
        )) }}
</div>