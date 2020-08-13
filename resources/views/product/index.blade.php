@include('components.main')
@extends('layout.main')

@section('title', $namePage)
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                @include('layout.alert')
                <h4 class="c-grey-900 mB-20">{{ $namePage }}</h4>
                {!! HTML::linkIcon('/product/create', 'Create', 'fas fa-plus', ['class' => 'btn btn-primary']) !!}
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Name Product</th>
                            <th>Type</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock First</th>
                            <th>Stock In</th>
                            <th>Stock Out</th>
                            <th>Stock Final</th>
                            <th>Image</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->invoice }}</td>
                                <td>{{ $data->name_product }}</td>
                                <td>{{ $data->type_product }}</td>
                                <td>{{ $data->unit }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->stock_first }}</td>
                                <td>{{ $data->stock_in }}</td>
                                <td>{{ $data->stock_out }}</td>
                                <td>{{ $data->stock_final }}</td>
                                <td>{{ $data->image_product }}</td>
                                <td>{{ $data->active === 1 ? 'Active' : 'Not Active' }}</td>
                                <td>{!! HTML::actionButton('product', $data) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection