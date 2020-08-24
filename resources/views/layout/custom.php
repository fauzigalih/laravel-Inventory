<?php
public function linkIconCustom($url, $title, $icon, $attributes = [], $secure = null, $escape = true)
{
    $url = $this->url->to($url, [], $secure);

    if ($escape) {
        $title = $this->entities($title);
    }

    return $this->toHtmlString('<a href="' . $this->entities($url) . '"' . $this->attributes($attributes) . '><i class="' . $icon . '"></i> ' . $title . '</a>');
}

public function buttonIconCustom($title, $icon, $attributes = [])
{
    return $this->toHtmlString('<button' . $this->attributes($attributes) . '><i class="' . $icon . '"></i> ' . $title . '</button>');
}