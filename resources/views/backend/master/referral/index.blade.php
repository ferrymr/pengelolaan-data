@extends('adminlte::page')

@section('title', 'Referral')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Referral</h1>
        </div>
        <div class="col-6">
            <div class="float-right">
                <a href="{{ route('admin.referral.add') }}" class="btn btn-block btn-info">
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
            <h3 class="card-title">Data Referral</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='referral-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Member</th>
                        <th>Nama Lengkap</th>
                        <th>Register</th>
                        <th>Upline</th>
                        <th>Direktur</th>
                        <th>Action</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>

            <div id="action-template" style="display:none">
                <div class="action-content">
                    <a href="#" class="btn btn-sm btn-info btn-edit" title="Edit" style="display: none;">
                        <i class="fa fa-edit"></i>&nbsp; Update
                    </a>
                    {{-- <a class="btn btn-danger btn-sm btn-hapus actDelete" title="Delete" 
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

    <!-- modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Downline</h5>
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

                // if(data.action.hapus) {
                //     wrapper.find('.btn-hapus')
                //         .attr('href', data.action.hapus)
                //         .attr('data-id', data.no_member)
                //         .attr('data-title', 'Delete ' + data.no_member + '?').show();
                // }
                
                return wrapper.html();
            }

            dataTable = $('#referral-table').DataTable({
                processing: true,
                serverSide: true,
                stateSave: false,
                // dom: '<"top">rt<"bottom"ilp><"clear">',
                ajax: '{!! route('admin.referral.datatable') !!}',
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
                    { data: 'no_member', name: 'no_member' },
                    { data: 'name', name: 'name' },
                    { data: 'daftar', name: 'daftar' },
                    { data: 'kode_up', name: 'kode_up' },
                    { data: 'kode_dr', name: 'kode_dr' },
                    {
                        // Define the action column
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'dt-body-center',
                        render: renderAction
                    },
                    { data: 'name', name: 'name', visible: false },
                ],
                order: [[ 1, 'asc' ]]
            });
        });
    </script>
@stop