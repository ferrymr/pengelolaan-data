@extends('adminlte::page')

@section('title', 'Bank')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Bank</h1>
        </div>
        <div class="col-6">
            <div class="float-right">
                <a href="{{ route('admin.bank.add') }}" class="btn btn-block btn-info">
                    <i class="fa fa-plus-square"></i>&nbsp;Tambah
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('flash::message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Bank</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='bank-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bank</th>
                        <th>Akun Bank</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                        <th class="text-center">&nbsp;</th>
                    </tr>
                </thead>
            </table>

            <div id="action-template" style="display:none">
                <div class="action-content">
                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-info btn-edit" title="Edit" style="display: none;">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm btn-hapus actDelete" 
                            data-placement="left" 
                            data-toggle="confirmation" 
                            data-title="Hapus data ?" 
                            style="display:none;">
                            <i class="fa fa-trash fa-fw"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    
    <script type="text/javascript">

        var dataTable;

        $(function() {
            
            function renderAction(data) {

                var wrapper = $('<p></p>').append($('#action-template .action-content').clone());
                            
                if(data.action.edit) {
                    wrapper.find('.btn-edit').attr('href', data.action.edit).show();
                }

                if(data.action.hapus) {
                    wrapper.find('.btn-hapus')
                        .attr('href', data.action.hapus)
                        .attr('data-id', data.id)
                        .attr('data-title', 'Delete ' + data.id + '?').show();
                }

                //return the buttons
                return wrapper.html();
            }

            dataTable = $('#bank-table').DataTable({
                processing: true,
                serverSide: true,
                stateSave: false,
                // dom: '<"top">rt<"bottom"ilp><"clear">',
                ajax: '{!! route('admin.bank.datatable') !!}',
                orderCellsTop: true,
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'bank_name', name: 'bank_name' },
                    { data: 'bank_account', name: 'bank_account' },
                    { data: 'description', name: 'description' },
                    {
                        // Define the action column
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'dt-body-center',
                        render: renderAction
                    },
                    { data: 'id', name: 'id', visible: false },
                ],
                order: [[ 5, 'desc' ]]
            });
        
        });
    </script>
@stop