<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::file($name,
        array_merge(
            [
                'class' => 'form-control-file', 
                'placeholder' => ucwords(str_replace('_', ' ', $name)),
                'id' => $name,
            ], 
            $attributes,
        )) }}
</div>