@php
    use App\Product;

    $actionCreate = Route::currentRouteName() === 'product-out.create';
    $isDisabled = Route::currentRouteName() === 'product-out.show';
    $actionEdit = Route::currentRouteName() === 'product-out.edit';
    $activeInvoice = $actionCreate ? $model->invoiceData() : $model->invoice;
@endphp
{!! Form::open(['route' => $actionEdit ? ['product-out.update', $model->id] : 'product-out.store', 'method' => $actionEdit ? 'PUT' : 'POST','autocomplete' => 'off']) !!}
    <div class="form-row">
        {!! Form::textGroup('invoice', $activeInvoice, ['readonly' => true]) !!}
        {!! Form::selectGroup('product_id', Product::listProduct(), $model->product_id, ['autofocus' => true, 'disabled' => $isDisabled]) !!}
        {!! Form::textGroup('qty_out', $model->qty_out, ['disabled' => $isDisabled]) !!}
    </div>
    @if (!$isDisabled)
        {!! HTML::buttonIcon('Save', 'fas fa-plus') !!}
    @endif
    {!! HTML::linkIcon(url()->previous(), 'Back', 'fas fa-arrow-left', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}