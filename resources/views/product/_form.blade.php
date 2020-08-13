@php
    use App\Product;
    use App\User;

    $activeInvoice = Route::currentRouteName() === 'product.create' ? $model->invoiceData() : $model->invoice;
    $actionCreate = Route::currentRouteName() === 'product.create';
    $isReadonly = Route::currentRouteName() === 'product.show';
    $actionUpdate = Route::currentRouteName() === 'product.edit';
    $urlForm = Route::currentRouteName() === 'product.edit' ? 'product/'.$model->id : 'product';
@endphp
{!! Form::open(['url' => $urlForm, 'autocomplete' => 'off']) !!}
    @if ($actionUpdate)
        @method('PUT')
    @endif
    <div class="form-row">
        {!! Form::textGroup('invoice', $activeInvoice, ['readonly' => true]) !!}
        {!! Form::textGroup('name_product', $model->name_product, ['autofocus' => $actionCreate, 'readonly' => $isReadonly]) !!}
        {!! Form::textGroup('type_product', $model->type_product, ['readonly' => $isReadonly]) !!}
    </div>
    <div class="form-row">
        {!! Form::selectGroup('unit', Product::$unitCategories, $model->unit) !!}
        {!! Form::numberGroup('price', $model->price, ['readonly' => $isReadonly]) !!}
        {!! Form::numberGroup('stock_first', $model->stock_first, ['readonly' => $isReadonly]) !!}
    </div>
    <div class="form-row">
        {!! Form::numberGroup('stock_in', $model->stock_in, ['readonly' => $isReadonly]) !!}
        {!! Form::numberGroup('stock_out', $model->stock_out, ['readonly' => $isReadonly]) !!}
        {!! Form::numberGroup('stock_final', $model->stock_final, ['readonly' => $isReadonly]) !!}
    </div>
    <div class="form-row">
        {!! Form::fileGroup('image_product', null, ['readonly' => $isReadonly]) !!}
        {!! Form::selectGroup('active', User::$activeCategories, $model->active, ['readonly' => $isReadonly]) !!}
    </div>
    @if (!$isReadonly)
        {!! HTML::buttonIcon('Save', 'fas fa-plus') !!}
    @endif
    {!! HTML::linkIcon(url()->previous(), 'Back', 'fas fa-arrow-left', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}