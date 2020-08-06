@extends('layout.main')

@section('title', $namePage)
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">{{ $namePage }}</h4>
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model as $data)
                            <tr>
                                <td>{{ $loop->iteration ?? '' }}</td>
                                <td>{{ $data->invoice ?? ''}}</td>
                                <td>{{ $data->nameProduct }}</td>
                                <td>{{ $data->typeProduct }}</td>
                                <td>{{ $data->unit }}</td>
                                <td>{{ $data->price }}</td>
                                <td>{{ $data->stockFirst }}</td>
                                <td>{{ $data->stockIn }}</td>
                                <td>{{ $data->stockOut }}</td>
                                <td>{{ $data->stockFinal }}</td>
                                <td>{{ $data->imageProduct }}</td>
                                <td>{{ $data->active }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection