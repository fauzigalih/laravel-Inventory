@php
    use App\Product;
    use App\User;

    $activeInvoice = Route::currentRouteName() === 'product.create' ? $model->invoiceData() : $model->invoice;
    $actionCreate = Route::currentRouteName() === 'product.create';
    $isDisabled = Route::currentRouteName() === 'product.show';
    $actionUpdate = Route::currentRouteName() === 'product.edit';
    $urlForm = Route::currentRouteName() === 'product.edit' ? 'product/'.$model->id : 'product';
@endphp
{!! Form::open(['url' => $urlForm, 'autocomplete' => 'off']) !!}
    @if ($actionUpdate)
        @method('PUT')
    @endif
    <div class="form-row">
        {!! Form::textGroup('invoice', $activeInvoice, ['readonly' => true]) !!}
        {!! Form::textGroup('name_product', $model->name_product, ['autofocus' => $actionCreate, 'disabled' => $isDisabled]) !!}
        {!! Form::textGroup('type_product', $model->type_product, ['disabled' => $isDisabled]) !!}
    </div>
    <div class="form-row">
        {!! Form::selectGroup('unit', Product::$unitCategories, $model->unit, ['disabled' => $isDisabled]) !!}
        {!! Form::numberGroup('price', $model->price, ['disabled' => $isDisabled]) !!}
        {!! Form::numberGroup('stock_first', $model->stock_first, ['disabled' => $isDisabled]) !!}
    </div>
    <div class="form-row">
        {!! Form::numberGroup('stock_in', $model->stock_in, ['disabled' => $isDisabled]) !!}
        {!! Form::numberGroup('stock_out', $model->stock_out, ['disabled' => $isDisabled]) !!}
        {!! Form::numberGroup('stock_final', $model->stock_final, ['disabled' => $isDisabled]) !!}
    </div>
    <div class="form-row">
        {!! Form::fileGroup('image_product', ['disabled' => $isDisabled]) !!}
        {!! Form::selectGroup('active', User::$activeCategories, $model->active, ['disabled' => $isDisabled]) !!}
    </div>
    @if (!$isDisabled)
        {!! HTML::buttonIcon('Save', 'fas fa-plus') !!}
    @endif
    {!! HTML::linkIcon(url()->previous(), 'Back', 'fas fa-arrow-left', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}