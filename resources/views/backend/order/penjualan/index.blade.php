@extends('adminlte::page')

@section('title', 'Penjualan')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Penjualan</h1>
        </div>
        <div class="col-6">
            <div class="float-right">
                <a href="{{ route('admin.penjualan.add') }}" class="btn btn-block btn-info">
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
            <h3 class="card-title">Data Penjualan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='penjualan-table'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Invoice</th>
                        <th>Tanggal</th>
                        <th>Nama Pembeli</th>
                        <th>Keterangan</th>
                        <th>Sub Total</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>

            <div id="action-template" style="display:none">
                <div class="action-content">
                    <a href="#" class="btn btn-sm btn-info btn-show" title="Show" style="display: none;">
                        <i class="fa fa-eye"></i>
                    </a>
                    {{-- <a class="btn btn-danger btn-sm btn-hapus actDelete" 
                        data-placement="left" 
                        data-toggle="confirmation" 
                        data-title="Hapus data ?" 
                        style="display:none;">
                        <i class="fa fa-trash fa-fw"></i>
                    </a> --}}
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
                            
                if(data.action.show) {
                    wrapper.find('.btn-show').attr('href', data.action.show).show();
                }

                // if(data.action.hapus) {
                //     wrapper.find('.btn-hapus')
                //         .attr('href', data.action.hapus)
                //         .attr('data-id', data.no_do)
                //         .attr('data-title', 'Delete ' + data.no_do + '?').show();
                // }

                //return the buttons
                return wrapper.html();
            }

            dataTable = $('#penjualan-table').DataTable({
                processing: true,
                serverSide: true,
                stateSave: false,
                // dom: '<"top">rt<"bottom"ilp><"clear">',
                ajax: '{!! route('admin.penjualan.datatable') !!}',
                orderCellsTop: true,
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'no_do', name: 'no_do' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'nama', name: 'nama' },
                    { data: 'note', name: 'note' },
                    { data: 'sub_total', name: 'sub_total' },
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
                    { data: 'id', name: 'id', visible: false },
                ],
                order: [[ 5, 'desc' ]]
            });
        
        });
    </script>
@stop