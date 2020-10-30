@extends('adminlte::page')

@section('title', 'Konfirmasi Pendaftaran')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Konfirmasi Pendaftaran</h1>
        </div>
    </div>
@stop

@section('content')
    @include('flash::message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Konfirmasi Pendaftaran</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='konfirmasi-daftar-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bukti Transfer</th>
                        <th>Nama Pendaftar</th>
                        <th>Transaksi di store</th>
                        <th>Daftar Menjadi</th>
                        <th>Transfer ke bank</th>
                        <th>Nama rekening</th>
                        <th>No rekening</th>
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
                        {{-- <a href="#" class="btn btn-sm btn-danger btn-cancel" title="Cancel" style="display: none;">
                            <i class="fa fa-times"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

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

            dataTable = $('#konfirmasi-daftar-table').DataTable({
                rowReorder: true,
                processing: true,
                serverSide: true,
                stateSave: false,
                ajax: '{!! route('admin.konfirmasi-daftar.datatable') !!}',
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
                        data: 'transaction.user.name',
                        name: 'transaction.user.name'
                    },
                    {
                        data: 'no_doo',
                        name: 'no_doo'
                    },
                    // daftar menjadi
                    {
                        data: 'transaction.jenis',
                        name: 'transaction.jenis'
                    },
                    {
                        data: 'transaction.bank',
                        name: 'transaction.bank'
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

        });
    </script>
@stop