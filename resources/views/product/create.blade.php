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
                {!! Form::open(['url' => 'product']) !!}
                    <div class="form-row">
                        <div class="form-group col-md-4">

                            {!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control', 'placeholder' => 'Pick a size...']) !!}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
    
                                {!! Form::select('animal',[
                                    'Cats' => ['leopard' => 'Leopard'],
                                    'Dogs' => ['spaniel' => 'Spaniel'],
                            ], null, ['class' => 'form-control', 'placeholder' => 'Pick a size...']) !!}
                            </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                              <option selected>Choose...</option>
                              <option>...</option>
                            </select>
                          </div>
                        {!! Form::textGroup('invoice', null, ['autofocus' => true]) !!}
                        {!! Form::textGroup('name_product') !!}
                        {!! Form::textGroup('type_product') !!}
                    </div>
                    <div class="form-row">
                        {!! Form::textGroup('unit') !!}
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
                        {!! Form::numberGroup('active') !!}
                    </div>
                    {!! HTML::buttonIcon('Save', 'fas fa-plus') !!}
                    {!! HTML::linkIcon(url()->previous(), 'Back', 'fas fa-arrow-left', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection