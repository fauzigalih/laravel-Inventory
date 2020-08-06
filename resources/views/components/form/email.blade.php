<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::email($name, $value, array_merge(['class' => 'form-control', 'placeholder' => 'name@domain.com'], $attributes)) }}
</div>