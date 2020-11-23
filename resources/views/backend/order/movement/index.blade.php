@extends('adminlte::page')

@section('title', 'Movement')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Movement</h1>
        </div>
        <div class="col-6">
            <div class="float-right">
                <a href="{{ route('admin.movement.add') }}" class="btn btn-block btn-info">
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
            <h3 class="card-title">Data Movement</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='movement-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Faktur</th>
                        <th>No Member</th>
                        <th>Nama Member</th>
                        <th>Tanggal</th>
                        <th>Jenis Movement</th>
                        {{-- <th>Nama Barang</th>
                        <th>Jumlah</th> --}}
                        <th>Action</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
            <div id="action-template" style="display:none">
                <div class="action-content">
                    {{-- <a href="#" class="btn btn-warning btn-sm btn-info btn-detail" title="View" style="display: none; color: white">
                    <i class="fa fa-eye"></i>
                    </a> --}}
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

    @stop

@section('css')

@stop

@section('js')
    
    <script type="text/javascript">
        var dataTable;

        $(function() {
            function renderAction(data) {
                var wrapper = $('<p></p>').append($('#action-template .action-content').clone());

                // if(data.action.view) {
                //     wrapper.find('.btn-detail').attr('href', data.action.view).show();
                // }
                            
                if(data.action.edit) {
                    wrapper.find('.btn-edit').attr('href', data.action.edit).show();
                }

                if(data.action.hapus) {
                    wrapper.find('.btn-hapus')
                        .attr('href', data.action.hapus)
                        .attr('data-id', data.no_faktur)
                        .attr('data-title', 'Delete ' + data.no_faktur + '?').show();
                }

                //return the buttons
                return wrapper.html();
            }

            dataTable = $('#movement-table').DataTable({
                "pageLength": 25,
                processing: true,
                serverSide: true,
                stateSave: false,
                // dom: '<"top">rt<"bottom"ilp><"clear">',
                ajax: '{!! route('admin.movement.datatable') !!}',
                orderCellsTop: true,
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'no_sm', name: 'no_sm'},
                    { data: 'no_member', name: 'no_member'},
                    { data: 'nama', name: 'nama' },
                    { data: 'tgl_pinjam', name: 'tgl_pinjam' },
                    { data: 'tipe_move', name: 'tipe_move' },
                    // { data: 'nama_barang', name: 'nama_barang' },
                    // { data: 'jumlah', name: 'jumlah'},
                    {
                        // Define the action column
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'dt-body-center',
                        render: renderAction
                    },
                    { data: 'nama', name: 'nama', visible: false },
                ],
                order: [[ 1, 'asc' ]]
               
            });
        });
    </script>
@stop