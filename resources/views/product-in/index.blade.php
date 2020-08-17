@include('components.main')
@extends('layout.main')

@section('title', $model->namePage)
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                @include('layout.alert')
                <h4 class="c-grey-900 mB-20">{{ $model->namePage }}</h4>
                {!! HTML::linkIcon(route('product-in.create'), 'Create', 'fas fa-plus', ['class' => 'btn btn-primary']) !!}
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Username</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty In</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model->all() as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->invoice }}</td>
                                <td>{{ $data->user_id }}</td>
                                <td>{{ $data->product_id }}</td>
                                <td>{{ $data->getProduct->price ?? '' }}</td>
                                <td>{{ $data->qty_in }}</td>
                                <td>{{ $data->getProduct->image_product ?? '' }}</td>
                                <td>{!! HTML::actionButton('product-in', $data) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection