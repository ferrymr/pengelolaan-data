@extends('adminlte::page')

@section('title', 'Edit Barang')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barang.update', $barang->id),
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
                    <input maxlength="6" value="{{ $barang->kode_barang }}" type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="Kode barang" required>
                    @if($errors->has('kode_barang'))
                        <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                    @endif
                    <p class="text-muted">Ideal 6 character</p>
                </div>
            </div>
            <div class="form-group @if($errors->has('unit')) has-error @endif">
                <label for="unit" class="col-sm-12 control-label">Unit</label>    
                <div class="col-sm-4">
                    <select name="unit" class="form-control select2" id="unit" disabled>
                        <option value="" selected>Pilih unit</option>
                        <option value="PIECES" @if($barang->unit == 'PIECES') selected @endif>PIECES</option>
                        <option value="SERIES" @if($barang->unit == 'SERIES') selected @endif>SERIES</option>
                    </select>
                </div>
            </div>

            @if($barang->unit == 'SERIES')
                <div id="series" class="form-group row col-sm-12">
                    <div class="col-md-12 mb-3">                    
                        <h5><b>Tambahkan produk ke dalam series</b></h5>
                    </div>
                    @if(count($barang->series) > 0)
                        @foreach($barang->series as $series)
                            <div class="col-md-8 @if($errors->has('produk')) has-error @endif mb-2" id="product-series">
                                <div class="input-group">
                                    <select name="produk[]" class="custom-select select2">
                                        <option value="">Pilih produk</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" @if($series->tb_barang_id == $product->id) selected @endif>
                                                {{ $product->nama }}
                                            </option>
                                        @endforeach
                                    </select> 
                                    <input type="number" name="qty_product[]" class="form-control" placeholder="Qty" value="{{ $series->qty }}">
                                    <button type="button" class="btn btn-danger ml-3 remove-product">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-8 @if($errors->has('produk')) has-error @endif mb-2" id="product-series">
                            <div class="input-group">
                                <select name="produk[]" class="custom-select select2">
                                    <option value="">Pilih produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->nama }}
                                        </option>
                                    @endforeach
                                </select> 
                                <input type="number" name="qty_product[]" class="form-control" placeholder="Qty">
                                <button type="button" class="btn btn-success ml-3" id="add-product">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    @else 
                        <div class="col-md-8 @if($errors->has('produk')) has-error @endif mb-2" id="product-series">
                            <div class="input-group">
                                <select name="produk[]" class="custom-select select2">
                                    <option value="">Pilih produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">
                                            {{ $product->nama }}
                                        </option>
                                    @endforeach
                                </select> 
                                <input type="number" name="qty_product[]" class="form-control" placeholder="Qty">
                                <button type="button" class="btn btn-success ml-3" id="add-product">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                    <table id="append-product" class="col-md-8"></table>
                </div>
            @endif

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
                        <option value="OILY" @if($barang->tipe_kulit == 'OILY') selected @endif>OILY</option>
                        <option value="NORMAL" @if($barang->tipe_kulit == 'NORMAL') selected @endif>NORMAL</option>                  
                        <option value="DRY" @if($barang->tipe_kulit == 'DRY') selected @endif>DRY</option>
                        <option value="COMBINATION" @if($barang->tipe_kulit == 'COMBINATION') selected @endif>COMBINATION</option>
                        <option value="SENSITIVE" @if($barang->tipe_kulit == 'SENSITIVE') selected @endif>SENSITIVE</option>
                        <option value="OTHER" @if($barang->tipe_kulit == 'OTHER') selected @endif>OTHER</option>
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
                    <option value="DECORATIVE" @if($barang->jenis == 'DECORATIVE') selected @endif>Decorative</option>
                    <option value="BODYCARE" @if($barang->jenis == 'BODYCARE') selected @endif>Body Care</option>
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
            <div class="form-grup @if($errors->has('flag_bestseller')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="flag_bestseller" value="1" id="flag_bestseller" @if($barang->flag_bestseller == 1) checked @endif>
                        <label class="custom-control-label" for="flag_bestseller">Termasuk best seller produk ?</label>
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('flag_promo')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="flag_promo" value="1" id="flag_promo" @if($barang->flag_promo == 1) checked @endif>
                        <label class="custom-control-label" for="flag_promo">Termasuk promo produk ?</label>
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('flag_sell_to_reseller')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="flag_sell_to_reseller" value="1" id="flag_sell_to_reseller" @if($barang->flag_sell_to_reseller == 1) checked @endif>
                        <label class="custom-control-label" for="flag_sell_to_reseller">Dijual ke reseller saat pertama kali daftar</label>
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="col-md-12">Search Engine Optimation (SEO)</h5>
            <div class="form-group @if($errors->has('meta_title')) has-error @endif">
                <label for="meta_title" class="col-sm-12 control-label">Meta Title</label>    
                <div class="col-sm-8">
                    <input value="{{ $barang->meta_title }}" type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" required>
                    @if($errors->has('meta_title'))
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('meta_description')) has-error @endif">
                <label for="meta_description" class="col-sm-12 control-label">Meta Description</label>    
                <div class="col-sm-8">
                    <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Meta Description">{{ $barang->meta_description }}</textarea>
                    @if($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.barang.index") }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </div>

    {!! Form::close() !!}

    <div class="row">

        {{-- ========================= foto barang ========================= --}}        
        
        <div class="col-6">

            <div class="card">

                {!! Form::open([
                    'url' => route('admin.barang.store-image'),
                    'method'=>'POST',
                    'class'=>'form-horizontal',
                    'id'=>'form-barang-image-update',
                    'files'=>'true'
                ]) !!}
        
                <input type="hidden" name="barang_id" value="{{ $barang->id }}">

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
                                        <th class="text-center">Edit</th>
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
                                            <td class="text-center">
                                                <a href="{{ route('admin.barang.edit-barang-image', [$barang->id, $barangImage->id]) }}" class="btn btn-info btn-xs btn-edit actDelete" data-placement="left" data-toggle="confirmation" data-title="Tambah Alt ?">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
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

                {!! Form::close() !!}

            </div>

        </div>

        {{-- ========================= foto produk yang mungkin cocok untuk anda ========================= --}}        
            
        <div class="col-6">
            <div class="card">

                {!! Form::open([
                    'url' => route('admin.barang.barang-related'),
                    'method'=>'POST',
                    'class'=>'form-horizontal',
                    'id'=>'form-barang-image-update',
                    'files'=>'true'
                ]) !!}
        
                    <input type="hidden" name="barang_id" value="{{ $barang->id }}">

                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-image"></i> &nbsp;Pilih produk yang mungkin cocok untuk anda
                        </h3>
                    </div>

                    <div class="card-body">                    
                        <div class="col-md-12" style="padding-top:10px;">
                            <div class="row">
                                <div id="series" class="form-group row col-sm-12">                                
                                    <div class="col-md-12 @if($errors->has('barang_related')) has-error @endif mb-2" id="product-related">
                                        <p class="text-muted">Pilih barang maksimal 4</p>
                                        
                                        @if(count($barangRelated) > 0)
                                            <table id="append-product-related" class="col-md-8">
                                                @foreach($barangRelated as $related)
                                                    <tr>
                                                        <td>
                                                            <div class="input-group col-md-12 mb-2">
                                                                <select name="barang_related[]" class="custom-select select2">
                                                                    <option value="">Pilih produk</option>
                                                                    @foreach($products as $product)
                                                                        <option value="{{ $product->id }}" @if($related->tb_barang_related_id == $product->id) selected @endif>
                                                                            {{ $product->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select> 
                                                                <button type="button" class="btn btn-danger ml-3 remove-product-related">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <div class="input-group col-md-12 mb-2">
                                                            <select name="barang_related[]" class="custom-select select2">
                                                                <option value="">Pilih produk</option>
                                                                @foreach($products as $product)
                                                                    <option value="{{ $product->id }}">
                                                                        {{ $product->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select> 
                                                            <button type="button" class="btn btn-success ml-3" id="add-product-related">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        @else 
                                            <div class="input-group">
                                                <select name="barang_related[]" class="custom-select select2">
                                                    <option value="">Pilih produk</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}">
                                                            {{ $product->nama }}
                                                        </option>
                                                    @endforeach
                                                </select> 
                                                <button type="button" class="btn btn-success ml-3" id="add-product-related">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <table id="append-product-related" class="col-md-8"></table>
                                </div>                            
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a href="{{ route("admin.barang.index") }}" class="btn btn-default float-right">Cancel</a>
                    </div>

                {!! Form::close() !!}

            </div>        
        </div>    

    </div>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#add-product').click(function() {
                $('.select2').select2();
                $('#append-product').append(`
                    <tr>
                        <td>
                            <div class="input-group col-md-12 mb-2">
                                <select name="produk[]" class="custom-select select2">
                                    <option value="" selected>Pilih produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nama }}</option>
                                    @endforeach
                                </select>                             
                                <input type="number" name="qty_product[]" class="form-control" placeholder="Qty">
                                <button type="button" class="btn btn-danger ml-3 remove-product">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `);
            });

            $('body').on('click', '.remove-product', function(){
                $(this).parent().parent().remove();
            });

            $('#add-product-related').click(function() {
                $('.select2').select2();
                $('#append-product-related').append(`
                    <tr>
                        <td>
                            <div class="input-group col-md-12 mb-2">
                                <select name="barang_related[]" class="custom-select select2">
                                    <option value="" selected>Pilih produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nama }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-danger ml-3 remove-product-related">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `);
            });

            $('body').on('click', '.remove-product-related', function(){
                $(this).parent().parent().remove();
            });
                        
            $("#unit").change(function() {
                $('.select2').select2();
                let unit = $(this).val();

                if(unit == 'SERIES') {
                    $('#series').show();
                } else {
                    $('#series').hide();
                }
            });
        });

        

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
    </script>
@stop
