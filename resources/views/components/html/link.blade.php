{{ HTML::linkIconCustom($url, $title, $icon, array_merge(
    [
        'id' => 'link_' . strtolower($title),
    ], $attributes)) }}