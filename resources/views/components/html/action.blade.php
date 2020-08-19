<div class="btn-group" role="group" aria-label="Basic example">
    {!! Form::open(['route' => [$route.'.show', $model->id]]) !!}
        @method('GET')
        {!! HTML::buttonIcon(null, 'far fa-eye', ['class' => 'btn btn-link']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => [$route.'.edit', $model->id]]) !!}
        @method('GET')
        {!! HTML::buttonIcon(null, 'far fa-edit', ['class' => 'btn btn-link']) !!}
    {!! Form::close() !!}
    {!! Form::open(['route' => [$route.'.destroy', $model->id]]) !!}
        @method('DELETE')
        {!! HTML::buttonIcon(null, 'far fa-trash-alt', ['class' => 'btn btn-link']) !!}
    {!! Form::close() !!}
</div>