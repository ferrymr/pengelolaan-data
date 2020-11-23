@extends('adminlte::page')

@section('title', 'Adjusment')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Adjusment</h1>
        </div>
        <div class="col-6">
            <div class="float-right">
                <a href="{{ route('admin.adjusment.add') }}" class="btn btn-block btn-info">
                    <i class="fa fa-plus-square"></i>&nbsp; Tambah
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('flash::message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Adjusment</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='adjusment-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Adjusment</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Catatan</th>
                        <th>Operator</th>
                        <th>Action</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>

            <div id="action-template" style="display:none">
                <div class="action-content">
                    <a href="#" class="btn btn-sm btn-info btn-edit" title="Edit" style="display: none;">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm btn-hapus actDelete" title="Delete" 
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

    <!-- modal -->
    {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Komposisi Data Series</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
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
                        .attr('data-id', data.no_so)
                        .attr('data-title', 'Delete ' + data.no_so + '?').show();
                }
                
                return wrapper.html();
            }

            dataTable = $('#adjusment-table').DataTable({
                processing: true,
                serverSide: true,
                stateSave: false,
                // dom: '<"top">rt<"bottom"ilp><"clear">',
                ajax: '{!! route('admin.adjusment.datatable') !!}',
                orderCellsTop: true,
                "pageLength": 25,
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    { data: 'no_so', name: 'no_so' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'jenis', name: 'jenis' },
                    { data: 'note', name: 'note' },
                    { data: 'kasir', name: 'kasir' },
                    {
                        // Define the action column
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'dt-body-center',
                        render: renderAction
                    },
                    { data: 'tanggal', name: 'tanggal', visible: false },
                ],
                order: [[ 1, 'asc' ]]
            });
        });
    </script>
@stop