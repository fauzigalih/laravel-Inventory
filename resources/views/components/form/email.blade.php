<div class="form-group col-md-4">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::email($name, $value, array_merge(['class' => 'form-control', 'placeholder' => 'name@domain.com'], $attributes)) }}
</div>