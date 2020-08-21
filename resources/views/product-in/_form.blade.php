@php
    use App\Product;
    use App\ProductIn;
    use App\User;

    $actionCreate = Route::currentRouteName() === 'product-in.create';
    $isDisabled = Route::currentRouteName() === 'product-in.show';
    $actionEdit = Route::currentRouteName() === 'product-in.edit';
    $activeInvoice = $actionCreate ? $model->invoiceData() : $model->invoice;
@endphp
{!! Form::open(['route' => $actionEdit ? ['product-in.update', $model->id] : 'product-in.store', 'method' => $actionEdit ? 'PUT' : 'POST','autocomplete' => 'off']) !!}
    <div class="form-row">
        {!! Form::textGroup('invoice', $activeInvoice, ['readonly' => true]) !!}
        {!! Form::selectGroup('product_id', Product::listProduct(), $model->product_id, ['autofocus' => true, 'disabled' => $isDisabled]) !!}
        {!! Form::textGroup('qty_in', $model->qty_in, ['disabled' => $isDisabled]) !!}
    </div>
    @if (!$isDisabled)
        {!! HTML::buttonIcon('Save', 'fas fa-plus') !!}
    @endif
    {!! HTML::linkIcon(url()->previous(), 'Back', 'fas fa-arrow-left', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}