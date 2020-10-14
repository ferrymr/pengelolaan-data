@extends('adminlte::page')

@section('title', 'Gallery')

@section('content_header')

<div class="row">
    <div class="col-6">
        <h1>Gallery</h1>
    </div>
    <div class="col-6">
        <div class="float-right">
            <a href="{{ route('admin.gallery.add') }}" class="btn btn-block btn-info">
                <i class="fa fa-plus-square"></i>&nbsp;Tambah
            </a>
        </div>
    </div>
</div>
@stop

@section('content')
@include('flash::message')
@if (session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Gallery</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover" id='gallery-table'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Jenis</th>
                    {{-- <th>Nama File</th> --}}
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

        dataTable = $('#gallery-table').DataTable({
            processing: true,
            serverSide: true,
            stateSave: false,
            // dom: '<"top">rt<"bottom"ilp><"clear">',
            ajax: '{!! route('admin.gallery.datatable') !!}',
            orderCellsTop: true,
            columns: [

                {
                    data: null,
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return  meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
               
                {
                data: "image",
                name: "image",
                render: function (data) {
                    return '<img class="img-fluid thumbnail" style="width:50%" src="'+ data +'"/>';
                    }
                },

                // {
                //     data: null,
                //     orderable: false,
                //     render: function (data, type, row, meta) {
                //         return  meta.row + meta.settings._iDisplayStart + 1;
                //     }
                // },
                // { data: 'gambar', name: 'gambar' },

                { data: 'kategori', name: 'kategori' },
                { data: 'nama_produk', name: 'nama_produk' },
                { data: 'jenis', name: 'jenis' },
                // { data: 'nama_file', name: 'nama_file'}
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
            order: [[ 0, 'asc' ]]
        });
    });
</script>
    
    
@stop