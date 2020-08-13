<div class="btn-group" role="group" aria-label="Basic example">
    {!! Form::open(['url' => $route.'/'.$model->id]) !!}
        @method('GET')
        {!! HTML::buttonIcon(null, 'far fa-eye', ['class' => 'btn btn-link']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => $route.'/'.$model->id.'/edit']) !!}
        @method('GET')
        {!! HTML::buttonIcon(null, 'far fa-edit', ['class' => 'btn btn-link']) !!}
    {!! Form::close() !!}
    {!! Form::open(['url' => $route.'/'.$model->id]) !!}
        @method('DELETE')
        {!! HTML::buttonIcon(null, 'far fa-trash-alt', ['class' => 'btn btn-link']) !!}
    {!! Form::close() !!}
</div>