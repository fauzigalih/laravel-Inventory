<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::text($name, $value, array_merge(['class' => 'form-control', 'placeholder' => ucwords(str_replace('_', ' ', $name))], $attributes)) }}
</div>