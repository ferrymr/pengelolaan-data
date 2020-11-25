@extends('adminlte::page')

@section('title', 'Barang')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Barang</h1>
        </div>
        <div class="col-6">
            <div class="float-right">
                <a href="{{ route('admin.barang.add') }}" class="btn btn-block btn-info">
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
            <h3 class="card-title">Data Barang</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='barang-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Series</th>
                        {{-- <th>Stok</th> --}}
                        <th>Poin</th>
                        <th>Action</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>

            <div id="action-template" style="display:none">
                <div class="action-content">
                    <div class="btn-group">
                        <a href="#" class="btn btn-warning btn-sm btn-info btn-detail" title="View" style="display: none; color: white">
                        <i class="fa fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-info btn-edit" title="Edit" style="display: none;">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm btn-hapus actDelete" 
                            data-placement="left" 
                            data-toggle="confirmation" 
                            data-title="Hapus data ?"
                            onclick           = "return confirm('Yakin hapus data?')" 
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

        $(document).ready(function() {
            
            $('.image-link').magnificPopup({
                type: 'image'
            });

            function renderAction(data) {
                var wrapper = $('<p></p>').append($('#action-template .action-content').clone());

                if(data.action.view) {
                    wrapper.find('.btn-detail').attr('href', data.action.view).show();
                }
                            
                if(data.action.edit) {
                    wrapper.find('.btn-edit').attr('href', data.action.edit).show();
                }

                if(data.action.hapus) {
                    wrapper.find('.btn-hapus')
                        .attr('href', data.action.hapus)
                        .attr('data-id', data.kode_barang)
                        .attr('data-title', 'Delete ' + data.kode_barang + '?').show();
                }

                //return the buttons
                return wrapper.html();
            }

            dataTable = $('#barang-table').DataTable({
                "pageLength": 25,
                processing: true,
                serverSide: true,
                stateSave: false,
                // dom: '<"top">rt<"bottom"ilp><"clear">',
                ajax: '{!! route('admin.barang.datatable') !!}',
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
                        data: 'image', 
                        name: 'image', 
                        render: function(data) {
                            return `
                                <a class="image-link" href="${data}" target="_blank">
                                    <img class="img-fluid thumbnail image-link" style="width:70%" src="${data}">
                                </a>
                            `;
                        }
                    },
                    { data: 'kode_barang', name: 'kode_barang'},
                    { data: 'nama', name: 'nama' },
                    { data: 'jenis', name: 'jenis' },
                    { data: 'unit', name: 'unit' },
                    // { data: 'stok', name: 'stok' },
                    { data: 'poin', name: 'poin' },
                    { data: 'created_at', name: 'created_at', visible:false },
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
                order: [[ 8, 'desc' ]]
               
            });
        });
    </script>
@stop
