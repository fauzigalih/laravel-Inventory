{{ HTML::buttonIconCustom($title, $icon, array_merge(
    [
        'id' => 'btn_' . strtolower($title),
        'class' => 'btn btn-primary'
    ], $attributes
)) }}