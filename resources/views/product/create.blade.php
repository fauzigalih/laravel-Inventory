@include('components.main')
@extends('layout.main')

@section('title', $namePage)
@section('content')
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item col-md-12">
        <div class="bgc-white p-20 bd">
            <h4 class="c-grey-900">{{ $namePage }}</h4>
            <div class="mT-30">
                
                {!! Form::open(['url' => 'product', 'autocomplete' => false]) !!}
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <div class="form-row">
                        {!! Form::textGroup('invoice', null, ['autofocus' => true]) !!}
                        {!! Form::textGroup('name_product') !!}
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
            </div>
        </div>
    </div>
</div>
@endsection