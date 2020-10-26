@extends('adminlte::page')

@section('title', 'Edit Barang')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barang.update', $barang->kode_barang),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Edit Data Barang</h3>
        </div>

        <div class="card-body">
            <div class="form-group @if($errors->has('no_member')) has-error @endif">
                <label for="kode_barang" class="col-sm-12 control-label">Kode barang</label>    
                <div class="col-sm-4">
                    <input value="{{ $barang->kode_barang }}" type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="Kode barang" required>
                    @if($errors->has('kode_barang'))
                        <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('nama')) has-error @endif">
                <label for="nama" class="col-sm-12 control-label">Nama barang</label>    
                <div class="col-sm-8">
                    <input value="{{ $barang->nama }}" type="text" name="nama" class="form-control" id="nama" placeholder="Nama barang" required>
                    @if($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('tipe_kulit')) has-error @endif">
                <label for="tipe_kulit" class="col-sm-12 control-label">Tipe kulit</label>    
                <div class="input-group col-sm-6">
                    <select name="tipe_kulit" class="custom-select select2">
                        <option value="">Pilih tipe kulit</option>
                        <option value="OILY" @if($barang->tipe_kulit == 'OILY') selected @endif>Oily</option>
                        <option value="NORMAL" @if($barang->tipe_kulit == 'NORMAL') selected @endif>Normal</option>                  
                        <option value="DRY" @if($barang->tipe_kulit == 'DRY') selected @endif>Dry</option>
                        <option value="COMBINATION" @if($barang->tipe_kulit == 'COMBINATION') selected @endif>Combination</option>
                        <option value="SENSITIVE" @if($barang->tipe_kulit == 'SENSITIVE') selected @endif>Sensitive</option>
                        <option value="OTHER" @if($barang->tipe_kulit == 'OTHER') selected @endif>Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group @if($errors->has('jenis')) has-error @endif">
                <label for="jenis" class="col-sm-12 control-label">Jenis barang</label>    
                <div class="input-group col-sm-6">
                    <select name="jenis" class="custom-select select2">
                    <option value="">Pilih jenis barang</option>
                    <option value="WHITENING" @if($barang->jenis == 'WHITENING') selected @endif>Whitening</option>
                    <option value="PURIFYING" @if($barang->jenis == 'PURIFYING') selected @endif>Purifying</option>                  
                    <option value="ACCESORIES" @if($barang->jenis == 'ACCESORIES') selected @endif>Accesories</option>
                    <option value="OTHER" @if($barang->jenis == 'OTHER') selected @endif>Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('berat')) has-error @endif">
                    <label for="berat" class="col-sm-12 control-label">Berat</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barang->berat }}" type="number" name="berat" class="form-control" id="berat" placeholder="Berat" min="0">
                        @if($errors->has('berat'))
                            <span class="text-danger">{{ $errors->first('berat') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('satuan')) has-error @endif">
                    <label for="satuan" class="col-sm-12 control-label">Satuan berat</label>    
                    <div class="col-sm-12">
                        <select name="satuan" class="form-control select2">
                            <option value="" selected>Pilih satuan</option>
                            <option value="PCS" @if($barang->satuan == 'PCS') selected @endif>PCS</option>
                            <option value="GRAM" @if($barang->satuan == 'GRAM') selected @endif>GRAM</option>
                        </select>
                    </div>
                </div>
                <div class="form-group @if($errors->has('unit')) has-error @endif">
                    <label for="unit" class="col-sm-12 control-label">Unit</label>    
                    <div class="col-sm-12">
                        <select name="unit" class="form-control select2">
                            <option value="" selected>Pilih unit</option>
                            <option value="PIECES" @if($barang->unit == 'PIECES') selected @endif>PIECES</option>
                            <option value="SERIES" @if($barang->unit == 'SERIES') selected @endif>SERIES</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('poin')) has-error @endif">
                    <label for="poin" class="col-sm-12 control-label">Poin</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barang->poin }}" type="number" name="poin" class="form-control" id="poin" placeholder="Poin" min="0" required>
                        @if($errors->has('poin'))
                            <span class="text-danger">{{ $errors->first('poin') }}</span>
                        @endif
                    </div>
                </div>            
                <div class="form-group @if($errors->has('stok')) has-error @endif">
                    <label for="stok" class="col-sm-12 control-label">Stock</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barang->stok }}" type="number" name="stok" class="form-control" id="stok" placeholder="Stock" min="0">
                        @if($errors->has('stok'))
                            <span class="text-danger">{{ $errors->first('stok') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('diskon')) has-error @endif">
                    <label for="diskon" class="col-sm-12 control-label">Diskon</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barang->diskon }}" type="number" name="diskon" class="form-control" id="diskon" placeholder="Diskon" min="0">
                        @if($errors->has('diskon'))
                            <span class="text-danger">{{ $errors->first('diskon') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('h_nomem')) has-error @endif">
                    <label for="h_nomem" class="col-sm-12 control-label">Harga katalog (non member)</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barang->h_nomem }}" type="number" name="h_nomem" class="form-control" id="h_nomem" placeholder="Harga katalog" min="0">
                        @if($errors->has('h_nomem'))
                            <span class="text-danger">{{ $errors->first('h_nomem') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('h_member')) has-error @endif">
                    <label for="h_member" class="col-sm-12 control-label">Harga member</label>    
                    <div class="col-sm-12">
                        <input value="{{ $barang->h_member }}" type="number" name="h_member" class="form-control" id="h_member" placeholder="Harga member" min="0">
                        @if($errors->has('h_member'))
                            <span class="text-danger">{{ $errors->first('h_member') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('bpom')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="bpom" id="bpom" value="1" @if($barang->bpom == 1) checked @endif>
                        <label class="custom-control-label" for="bpom">BPOM</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group @if($errors->has('tgl_eks')) has-error @endif">
                <label for="tgl_eks" class="col-sm-12 control-label">Tanggal expired</label>    
                <div class="col-sm-6">
                    <input value="{{ $barang->tgl_eks }}" type="text" name="tgl_eks" class="form-control datepicker" id="tgl_exp" placeholder="Tanggal expired" required>
                    @if($errors->has('tgl_eks'))
                        <span class="text-danger">{{ $errors->first('tgl_eks') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('deskripsi')) has-error @endif">
                <label for="deskripsi" class="col-sm-12 control-label">Deskripsi</label>    
                <div class="col-sm-12">
                    <textarea name="deskripsi" class="form-control ckeditor" id="deskripsi" placeholder="Deskripsi">{{ $barang->deskripsi }}</textarea>
                    @if($errors->has('deskripsi'))
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('cara_pakai')) has-error @endif">
                <label for="cara_pakai" class="col-sm-12 control-label">Cara pakai</label>    
                <div class="col-sm-12">
                    <textarea name="cara_pakai" class="form-control ckeditor" id="cara_pakai" placeholder="Cara pakai">{{ $barang->cara_pakai }}</textarea>
                    @if($errors->has('cara_pakai'))
                        <span class="text-danger">{{ $errors->first('cara_pakai') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-grup @if($errors->has('stats')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="stats" value="1" id="stats" @if($barang->stats == 1) checked @endif>
                        <label class="custom-control-label" for="stats">Publish barang ini ?</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.barang.index") }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </div>

    {!! Form::close() !!}

    {{-- ========================= foto barang ========================= --}}

    {!! Form::open([
        'url' => route('admin.barang.store-image'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-barang-image-update',
        'files'=>'true'
    ]) !!}

    <input type="hidden" name="barang_id" value="{{ $barang->id }}">
        
    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-image"></i> &nbsp;Foto barang
            </h3>
        </div>

        <div class="card-body">
            
            <div class="col-md-12">
                <div class="row">

                    <input type="file" name="nama_file[]" id="filecount" multiple="multiple"><br>                                    
                    {{-- <p class="text-muted">Maksimal ukuran file: <b>500KB</b> & Ukuran gambar: <b>1000 x 600 px</b></p><br> --}}

                    @if(count($barangImages) > 0)
                    <table class="table table-bordered table-striped" style="margin-top: 20px;">
                        <tbody>
                            <tr>
                                <th style="width: 10px" class="text-center">No</th>
                                <th class="text-center">Foto</th>
                                {{-- <th class="text-center">Thumbnail</th> --}}
                                <th class="text-center">Hapus</th>
                            </tr>
                            @php 
                                $no=1; 
                            @endphp
                            @foreach($barangImages as $barangImage) 
                                <tr>
                                    <td class="text-center">{{ $no }}.</td>
                                    <td class="text-center">
                                        @if(file_exists(base_path(). '/storage/app/public/barang/'. $barangImage->nama_file))
                                            <img style="width:20%;margin:0 auto;" class="thumbnail" src="{{ route('admin.barang.barang-image', $barangImage->id) }}" alt="">
                                        @endif
                                    </td>
                                    {{-- <td class="text-center favourite">
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>                                                    
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('admin.barang.detele-barang-image', [$barang->id, $barangImage->id]) }}" class="btn btn-danger btn-xs btn-delete actDelete" data-placement="left" data-toggle="confirmation" data-title="Hapus foto ?">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr> 
                                @php $no++; @endphp
                            @endforeach                              
                        </tbody>
                    </table>
                    @endif
                </div>                                
            </div>

        </div>
    </div>
    
    {!! Form::close() !!}

@stop

@section('js')
    <script>
        // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })

        $('#filecount').filestyle({
            input : false,
            buttonName : 'btn-primary',
            buttonText : ' &nbsp; Tambah Foto',
            iconName : 'glyphicon glyphicon-folder-close'
        });
        
        $('#filecount').change(function() {
            $('#form-barang-image-update').submit();
        })

        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@stop
