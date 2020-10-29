@extends('adminlte::page')

@section('title', 'Konfirmasi Pemesanan')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Konfirmasi Pemesanan</h1>
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
            <h3 class="card-title">Data Konfirmasi Pemesanan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='konfirmasi-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bukti Transfer</th>
                        <th>Kode pemesanan</th>
                        <th>Nama pemesan</th>
                        <th>Transfer ke bank</th>
                        <th>Nama rekening</th>
                        <th>No rekening</th>
                        <th>Grand Total</th>
                        <th>Status</th>                        
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>

            <div id="action-template" style="display:none">
                <div class="action-content">
                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-success btn-edit" title="Confirm" style="display: none;">
                            <i class="fa fa-check"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger btn-cancel" title="Cancel" style="display: none;">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
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

                if(data.action.edit) {
                    wrapper.find('.btn-edit').attr('href', data.action.edit).show();
                }

                if(data.action.cancel) {
                    wrapper.find('.btn-cancel').attr('href', data.action.cancel).show();
                }

                //return the buttons
                return wrapper.html();
            }

            dataTable = $('#konfirmasi-table').DataTable({
                rowReorder: true,
                processing: true,
                serverSide: true,
                stateSave: false,
                ajax: '{!! route('admin.konfirmasi-penjualan.datatable') !!}',
                orderCellsTop: true,
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { 
                        data: 'filename', 
                        name: 'filename', 
                        render: function(data) {
                            return `
                                <a class="image-link" href="${data}" target="_blank">
                                    <img class="img-fluid thumbnail image-link" style="width:70%" src="${data}">
                                </a>
                            `;
                        } 
                    },
                    {
                        data: 'transaction.no_do',
                        name: 'transaction.no_do'
                    },
                    {
                        data: 'transaction.user.name',
                        name: 'transaction.user.name'
                    },
                    {
                        data: 'bank',
                        name: 'bank'
                    },
                    {
                        data: 'rekening_name',
                        name: 'rekening_name'
                    },
                    {
                        data: 'rekening_number',
                        name: 'rekening_number'
                    },
                    {
                        data: 'transaction.grand_total',
                        name: 'transaction.grand_total'
                    },
                    { 
                        data: 'status', 
                        name: 'status', 
                        render: function(data) {
                            return `
                                ${data}
                            `;
                        } 
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