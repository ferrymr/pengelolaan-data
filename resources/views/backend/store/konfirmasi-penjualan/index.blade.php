@extends('adminlte::page')

@section('title', 'Konfirmasi Penjualan')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Konfirmasi Penjualan</h1>
        </div>
        <div class="col-6">
            {{-- <div class="float-right">
                {!! Form::open([
                    'url' => route('admin.slider.store'),
                    'method'=>'POST',
                    'class'=>'form-horizontal',
                    'id'=>'form-slider-store',
                    'files'=>'true'
                ]) !!}
                <input type="file" name="filename[]" id="filecount" multiple="multiple">                
                {!! Form::close() !!}
            </div> --}}
        </div>
    </div>
@stop

@section('content')
    @include('flash::message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Konfirmasi Penjualan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='slider-table'>
                <thead>
                    <tr>
                        <th class="col-md-1">Order</th>
                        <th>Foto Slider</th>
                        <th>Nama File</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>

            <div id="action-template" style="display:none">
                <div class="action-content">
                    <a class="btn btn-danger btn-xs btn-delete actDelete" data-placement="left" data-toggle="confirmation" data-title="Hapus data ?" style="display:none;">
                        <i class="fa fa-trash fa-fw"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- @section('plugins.Datatables', true) --}}

@section('js')
    
    <script type="text/javascript">

        var dataTable;
        // use a global for the submit and return data rendering in the examples
        var editor; 

        $(function() {

            // $('body').confirmation({
            //     selector: '[data-toggle="confirmation"]'
            // });
            
            function renderAction(data) {

                var wrapper = $('<p></p>').append($('#action-template .action-content').clone());

                if(data.action.delete) {
                    wrapper.find('.btn-delete')
                        .attr('href', data.action.delete)
                        .attr('data-id', data.id)
                        .attr('data-title', 'Hapus ' + data.name + '?').show();
                }

                //return the buttons
                return wrapper.html();
            }

            dataTable = $('#slider-table').DataTable({
                rowReorder: true,
                processing: true,
                serverSide: true,
                stateSave: false,
                ajax: '{!! route('admin.slider.datatable') !!}',
                orderCellsTop: true,
                columns: [
                    { data: 'order', name: 'order' },
                    { 
                        data: 'id', 
                        name: 'id', 
                        render: function(data) {
                            return '<img class="img-fluid thumbnail" style="width: 75%" src="./slider/slider-image/'+data+'">';
                        } 
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        // Define the action column
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'dt-body-center',
                        render: renderAction
                    },
                    
                ],
                createdRow: function (row, data, index) {
                    $(row).attr('data-id', data.id);
                    $(row).addClass('row1');
                },
                select: true,

                order: [[ 0, 'asc' ]]
            });

            dataTable.on( 'row-reorder', function ( e, diff, edit ) {   
                sendOrderToServer();
            } );

            function sendOrderToServer() {
                
                var order = [];
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });

                $.ajax({
                    type: "GET", 
                    url: "{{ route('admin.slider.shortable') }}",
                    data: {
                        order:order,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        location.reload(); 
                    }
                });

            }
            
        });
    </script>
@stop