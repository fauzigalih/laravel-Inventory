@include('components.main')
@extends('layout.main')

@section('title', 'Create ' . $model->namePage)
@section('content')
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item col-md-12">
        <div class="bgc-white p-20 bd">
            <h4 class="c-grey-900">{{ 'Create ' . $model->namePage }}</h4>
            <div class="mT-30">
                @include('product-out._form')
            </div>
        </div>
    </div>
</div>
@endsection