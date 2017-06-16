
@extends('layouts.admin')


@section('content')




                    <div class="panel panel-grey">
                        <div class="panel-heading">
                            <a href="{{route('admin.site.create')}}" class="btn btn-default btn-sm"><i class="fa fa-plus" style="color:black"></i></a>
                        </div>
                        <div class="panel-body">
                            <table id="site-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>URL</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sites as $site)
                                        <tr>
                                            <td>{{$site->id}}</td>
                                            <td>{{$site->url}}</td>
                                            <td style="text-align: right;">
                                                <a href="{{route('admin.site.edit', [$site->id])}}" ><i class="fa fa-2x fa-edit" style="color:black"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.site.destroy', [$site->id])}}" data-toggle="confirmation" data-placement="left" data-title="Delete Entry?"><i class="fa fa-2x fa-remove" style="color:black"></i></a>
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
    $('#site-table').DataTable({
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
