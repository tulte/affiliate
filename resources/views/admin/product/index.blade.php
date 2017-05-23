
@extends('layouts.admin')


@section('content')




                    <div class="panel panel-grey">
                        <div class="panel-heading">
                            <a href="{{route('admin.product.create')}}" class="btn btn-default btn-sm"><i class="fa fa-plus" style="color:black"></i></a>
                        </div>
                        <div class="panel-body">
                            <table id="product-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->topic->name}}</td>
                                            <td style="text-align: right;">
                                                <a href="{{route('admin.product.edit', [$product->id])}}" ><i class="fa fa-2x fa-edit" style="color:black"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.product.destroy', [$product->id])}}" data-toggle="confirmation" data-placement="left" data-title="Delete Entry?"><i class="fa fa-2x fa-remove" style="color:black"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>




@endsection

@section('scripts')

<script type="text/javascript">

$(function() {
    $('#product-table').DataTable({
        "bInfo": false,
        "bLengthChange": false,
        "ordering": false,
        "info":     false,
        "pagingType": "simple",
        "columnDefs": [
            { "width": "10px", "targets": 0 },
            { "width": "10px", "targets": [-1, -2] }
        ]
    });

    $('[data-toggle=confirmation]').confirmation({
          rootSelector: '[data-toggle=confirmation]',
          // other options
        });
});

</script>

@endsection
