@php
    $action = Route::currentRouteName();
    $activeInvoice = Route::currentRouteName() === 'product.create' ? $model->invoiceData() : $model->invoice;
    $autofocus = Route::currentRouteName() === 'product.create' ? true : false;
    $isReadonly = Route::currentRouteName() === 'product.show' ? true : false;
@endphp
{{ $action }}
{!! Form::open(['url' => 'product', 'autocomplete' => 'off']) !!}
    <div class="form-row">
        {!! Form::textGroup('invoice', $activeInvoice, ['readonly' => true]) !!}
        {!! Form::textGroup('name_product', $model->name_product, ['autofocus' => $autofocus, 'readonly' => $isReadonly]) !!}
        {!! Form::textGroup('type_product') !!}
    </div>
    <div class="form-row">
        {!! Form::selectGroup('unit', ['Pcs' => 'Pcs', 'Carton/Dus' => 'Carton/Dus']) !!}
        {!! Form::numberGroup('price') !!}
        {!! Form::numberGroup('stock_first') !!}
    </div>
    <div class="form-row">
        {!! Form::numberGroup('stock_in') !!}
        {!! Form::numberGroup('stock_out') !!}
        {!! Form::numberGroup('stock_final') !!}
    </div>
    <div class="form-row">
        {!! Form::fileGroup('image_product') !!}
        {!! Form::selectGroup('active', [1 => 'Active', 0 => 'Not Active']) !!}
    </div>
    {!! HTML::buttonIcon('Save', 'fas fa-plus') !!}
    {!! HTML::linkIcon(url()->previous(), 'Back', 'fas fa-arrow-left', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}