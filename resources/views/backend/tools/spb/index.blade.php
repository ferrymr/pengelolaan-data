@extends('adminlte::page')

@section('title', 'BarangSpb')

@section('content_header')
        
<div class="row">
    <div class="col-6">
        <div class="float-left">
            <h3>Barang SPB</h3>
        </div>
    </div>
    <div class="col-6">
        <div class="float-right">
           <form class="form-inline">
            <div class="form-group mx-sm-2">
                <div class="col-sm-16">
                    <select  name="id_spb" id="id_spb" class="form-control filter-select">
                        <option value="">Pilih SPB</option>
                        <option value="00005">00005</option>
                        <option value="00042">00042</option>
                    </select>
                </div>
            </div>
                <button type="button" name="filter" id="filter" class="btn btn-info">View</button>
           </form>
        </div>
    </div>
            
</div>
  
@stop

@section('content')
    @include('flash::message')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Barang SPB</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id='barangspb-table'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Spb</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            {{-- <th>Poin</th> --}}
                            <th>Action</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
                <div id="action-template"  style="display:none">
                    <div class="action-content">
                        <a class              = "btn btn-warning btn-sm btn-info btn-detail"
                        title             = "detail"
                        style             = "display: none; color: white">
                        <i class          = "fa fa-eye"></i>
                        </a> 
                        <a class              = "btn btn-danger btn-sm btn-hapus actDelete"
                            data-placement    = "left"
                            data-toggle       = "confirmation"
                            data-title        = "Hapus data ?"
                            onclick           = "return confirm('Yakin hapus data?')"
                            style             = "display:none;">
                            <i class          = "fa fa-trash fa-fw"></i>
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
    var id_spb = $('#id_spb').val();
    
        $(function(){
            function renderAction(data) {
                var wrapper = $('<p></p>').append($('#action-template .action-content').clone());
                if(data.action.view) {
                    wrapper.find('.btn-detail').attr('href', data.action.view).show();
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
            // if(id_spb == '') {
            dataTable = $('#barangspb-table').DataTable({
                "pageLength": 25,
                processing: true,
                serverSide: true,
                stateSave: false,
                ajax:{
                    url:'{!! route('admin.barangspb.datatable') !!}',
                    orderCellsTop: true,
                    // data:{id_spb:id_spb}
                },
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    
                    {
                        data:'no_member',
                        name:'no_member'
                    },
                    {
                        data:'kode_barang',
                        name:'kode_barang'
                    },
                    {
                        data:'nama',
                        name:'nama'
                    },
                    {
                        data:'jenis',
                        name:'jenis'
                    },
                    {
                        data:'stok',
                        name:'stok'
                    },
                    // {
                    //     data:'poin',
                    //     name:'poin'
                    // },
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
                order: [[ 2, 'asc' ]]
            });
        // } else {
            function fill_datatable(id_spb = ''){
                dataTable = $('#barangspb-table').DataTable({
                "pageLength": 25,
                processing: true,
                serverSide: true,
                stateSave: false,
                ajax:{
                    url:'{!! route('admin.barangspb.datatable') !!}',
                    orderCellsTop: true,
                    data:{id_spb:id_spb}
                },
                columns: [
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    
                    {
                        data:'no_member',
                        name:'no_member'
                    },
                    {
                        data:'kode_barang',
                        name:'kode_barang'
                    },
                    {
                        data:'nama',
                        name:'nama'
                    },
                    {
                        data:'jenis',
                        name:'jenis'
                    },
                    {
                        data:'stok',
                        name:'stok'
                    },
                    // {
                    //     data:'poin',
                    //     name:'poin'
                    // },
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
                order: [[ 2, 'asc' ]]
            });
        }

    // }     
        
        $('#filter').click(function(){
            var id_spb = $('#id_spb').val();
                if(id_spb != '')
            {
                $('#barangspb-table').DataTable().destroy();
                fill_datatable(id_spb);
            } else {
                alert('Select Both filter option');
            }

        });

    });
          
</script>
@stop
