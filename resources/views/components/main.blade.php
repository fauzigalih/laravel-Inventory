@php
    Form::component('textGroup', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
    Form::component('emailGroup', 'components.form.email', ['name', 'value' => null, 'attributes' => []]);
    Form::component('passwordGroup', 'components.form.password', ['name', 'value' => null, 'attributes' => []]);
    Form::component('numberGroup', 'components.form.number', ['name', 'value' => null, 'attributes' => []]);
    Form::component('fileGroup', 'components.form.file', ['name', 'attributes' => []]);
    Form::component('selectGroup', 'components.form.select', ['name', 'attributes' => []]);

    HTML::component('linkIcon', 'components.html.link', ['url', 'title', 'icon' => null, 'attributes' => []]);
    HTML::component('buttonIcon', 'components.html.button', ['title', 'icon' => null, 'attributes' => []]);
@endphp