
@extends('layouts.admin')


@section('content')




                    <div class="panel panel-grey">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <table id="feature-table" class="table table-bordered">
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>




@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function() {

    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '{{route('admin.feature.field',[$id])}}',
        success: function(d) {
            editor = new $.fn.dataTable.Editor( {
                ajax: '{{route('admin.feature.editor',[$id])}}',
                table: '#feature-table',
                fields: d.fields
            });

            $('#feature-table').on( 'click', 'tbody td:not(:first-child)', function (e) {
                editor.inline( this );
            } );
        }
    });

    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '{{route('admin.feature',[$id])}}',
        success: function(d) {
            $('#feature-table').DataTable({
                dom: "Bfrtip",
                data: d.data,
                columns: d.columns
            });
        }
    });
});



</script>

@endsection
