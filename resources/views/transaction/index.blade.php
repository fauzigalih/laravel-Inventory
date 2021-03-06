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
                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Created By</th>
                            <th>Code Trx</th>
                            <th>Product</th>
                            <th>Stock First</th>
                            <th>Qty In/Out</th>
                            <th>Stock Final</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model->all() as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->invoice }}</td>
                                <td>{{ $data->user->name ?? null}}</td>
                                <td>{{ $data->code_trx }}</td>
                                <td>{{ $data->productIn->product->name_product ?? $data->productOut->product->name_product ?? null }}</td>
                                <td>{{ $data->stock_first }}</td>
                                <td>{{ $data->qty_trx }}</td>
                                <td>{{ $data->stock_final }}</td>
                                <td>
                                    {{ HTML::image('images/'.($data->productIn->product->image_product ?? $data->productOut->product->image_product ?? null), 
                                        $data->productIn->product->image_product ?? $data->productOut->product->image_product ?? null, 
                                        ['width' => 70 , 'height' => 50]) }}
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['transaction.destroy', $data->id]]) !!}
                                        @method('DELETE')
                                        {!! HTML::buttonIcon(null, 'far fa-trash-alt', ['class' => 'btn btn-link']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection