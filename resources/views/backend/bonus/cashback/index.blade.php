@extends('adminlte::page')

@section('title', 'Cashback')

@php
    $current = date('m');
    $before = date('m',strtotime('-1 month'));

    switch ($current) {
        case '01': $awal = 'January'; $akhir = 'December'; break;
        case '02': $awal = 'February'; $akhir = 'January'; break;
        case '03': $awal = 'March'; $akhir = 'February'; break;
        case '04': $awal = 'April'; $akhir = 'March'; break;
        case '05': $awal = 'May'; $akhir = 'April'; break;
        case '06': $awal = 'June'; $akhir = 'May'; break;
        case '07': $awal = 'July'; $akhir = 'June'; break;
        case '08': $awal = 'August'; $akhir = 'July'; break;
        case '09': $awal = 'September'; $akhir = 'August'; break;
        case '10': $awal = 'October'; $akhir = 'September'; break;
        case '11': $awal = 'November'; $akhir = 'October'; break;
        case '12': $awal = 'December'; $akhir = 'November'; break;
        
        default:
            # code...
            break;
    }
@endphp

@section('content_header')
    {!! Form::open([
        'url' => route('admin.cashback.hitung'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-cashback'
    ]) !!}

    <div class="row">
        <div class="col-6">
            <h1>Bonus Cashback</h1>
        </div>

        <div class="col-6">
            <div class="float-right m-1">
                <button type="submit" class="btn btn-info"><i class="fa fa-redo-alt"></i>&nbsp; Hitung</button>
            </div>
            <div class="float-right m-1">
                <select class="form-control" name="bulan" id="bulan" required>
                    <option value="" selected></option>
                    <option value="{{ $before }}">{{ $akhir }}</option>
                    <option value="{{ $current }}">{{ $awal }}</option>
                </select>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop

@section('content')
    @include('flash::message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Cashback</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id='cashback-table'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Title</th>
                        <th>%</th>
                        <th>Pribadi</th>
                        <th>Group</th>
                        <th>Rabat</th>
                        <th>Total</th>
                        <th>Mark</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>

            {{-- <div id="action-template" style="display:none">
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
            </div> --}}
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Data Cashback</h5>
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
        // date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })

        var dataTable;

        $(function() {
            function renderAction(data) {
                // var wrapper = $('<p></p>').append($('#action-template .action-content').clone());
                            
            //     if(data.action.edit) {
            //         wrapper.find('.btn-edit').attr('href', data.action.edit).show();
            //     }

            //     if(data.action.hapus) {
            //         wrapper.find('.btn-hapus')
            //             .attr('href', data.action.hapus)
            //             .attr('data-id', data.kode_pack)
            //             .attr('data-title', 'Delete ' + data.kode_pack + '?').show();
            //     }
                
                return wrapper.html();
            }

            dataTable = $('#cashback-table').DataTable({
                processing: true,
                serverSide: true,
                stateSave: false,
                // dom: '<"top">rt<"bottom"ilp><"clear">',
                ajax: '{!! route('admin.cashback.datatable') !!}',
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
                    { data: 'nama', name: 'nama' },
                    { data: 'title', name: 'title' },
                    { data: 'prs', name: 'prs' },
                    { data: 'cb_pribadi', name: 'cb_pribadi' },
                    { data: 'cb_group', name: 'cb_group' },
                    { data: 'rabat', name: 'rabat' },
                    { data: 'cb_total', name: 'cb_total' },
                    { data: 'mark', name: 'mark' },
                    {
                        // Define the action column
                        data: null,
                        searchable: false,
                        orderable: false,
                        className: 'dt-body-center',
                        render: false
                    },
                    { data: 'no_member', name: 'no_member', visible: false },
                ],
                order: [[ 1, 'asc' ]]
            });
        });
    </script>
@stop