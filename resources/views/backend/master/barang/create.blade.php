@extends('adminlte::page')

@section('title', 'Tambah Barang')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.barang.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user',
        'enctype'=>'multipart/form-data'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Barang</h3>
        </div>
        <div class="card-body barangs">
            <div class="row">
                <div class="form-group col-md-4 @if($errors->has('no_member')) has-error @endif">
                    <label for="kode_barang" class="col-sm-12 control-label">Kode</label>    
                    <div class="col-sm-12">
                        <input  maxlength="6"  value="{{ old('kode_barang') }}" type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="Kode" required>
                        @if($errors->has('kode_barang'))
                            <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                        @endif
                        <p class="text-muted">Ideal 6 character</p>
                    </div>
                </div>
                <div class="form-group col-md-4 @if($errors->has('unit')) has-error @endif">
                    <label for="unit" class="col-sm-12 control-label">Unit</label>    
                    <div class="col-sm-12">
                        <select name="unit" class="form-control select2" id="unit">
                            <option value="" selected>Pilih unit</option>
                            <option value="PIECES">PIECES</option>
                            <option value="SERIES">SERIES</option>
                        </select>
                    </div>
                    @if($errors->has('unit'))
                        <span class="text-danger">{{ $errors->first('unit') }}</span>
                    @endif
                </div>
            </div>

            <div id="series" class="form-group row col-sm-12" style="display:none;">
                <div class="col-md-12 mb-3">                    
                    <h5><b>Tambahkan produk ke dalam series</b></h5>
                </div>
                <div class="col-md-8 @if($errors->has('produk')) has-error @endif mb-2" id="product-series">
                    <div class="input-group">
                        <select name="produk[]" class="custom-select select2">
                            <option value="" selected>Pilih produk</option>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                            @endforeach
                        </select> 
                        <input type="number" name="qty_product[]" class="form-control" placeholder="Qty">
                        <button type="button" class="btn btn-success ml-3" id="add-product">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <table id="append-product" class="col-md-8"></table>
            </div>

            <div class="form-group @if($errors->has('nama')) has-error @endif">
                <label for="nama" class="col-sm-12 control-label">Nama barang</label>    
                <div class="col-sm-8">
                    <input value="{{ old('nama') }}" type="text" name="nama" class="form-control" id="nama" placeholder="Nama barang" required>
                    @if($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4 @if($errors->has('tipe_kulit')) has-error @endif">
                    <label for="tipe_kulit" class="col-sm-12 control-label">Tipe kulit</label>    
                    <div class="input-group col-sm-12">
                        <select name="tipe_kulit" class="custom-select select2">
                            <option value="" selected>Pilih tipe kulit</option>
                            <option value="OILY">OILY</option>
                            <option value="NORMAL">NORMAL</option>                  
                            <option value="DRY">DRY</option>
                            <option value="COMBINATION">COMBINATION</option>
                            <option value="SENSITIVE">SENSITIVE</option>
                            <option value="OTHER">OTHER</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4 @if($errors->has('jenis')) has-error @endif">
                    <label for="jenis" class="col-sm-12 control-label">Jenis barang</label>    
                    <div class="input-group col-sm-12">
                        <select name="jenis" class="custom-select select2" required>
                        <option value="" selected>Pilih jenis barang</option>
                        <option value="WHITENING">WHITENING</option>
                        <option value="PURIFYING">PURIFYING</option>                  
                        <option value="DECORATIVE">DECORATIVE</option>
                        <option value="BODYCARE">BODYCARE</option>
                        </select>
                    </div>
                    @if($errors->has('jenis'))
                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('berat')) has-error @endif">
                    <label for="berat" class="col-sm-12 control-label">Berat</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('berat') }}" type="number" name="berat" class="form-control" id="berat" placeholder="Berat" min="0">
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
                            <option value="PCS">PCS</option>
                            <option value="GRAM">GRAM</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('poin')) has-error @endif">
                    <label for="poin" class="col-sm-12 control-label">Poin</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('poin') ? old('poin') : 0 }}" type="number" name="poin" class="form-control" id="poin" placeholder="Poin" min="0" required>
                        @if($errors->has('poin'))
                            <span class="text-danger">{{ $errors->first('poin') }}</span>
                        @endif
                    </div>
                </div>            
                <div class="form-group @if($errors->has('stok')) has-error @endif">
                    <label for="stok" class="col-sm-12 control-label">Stock HO</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('stok') ? old('stok') : 0 }}" type="number" name="stok" class="form-control" id="stok" placeholder="Stock" min="0" readonly>
                        @if($errors->has('stok'))
                            <span class="text-danger">{{ $errors->first('stok') }}</span>
                        @endif
                    </div>
                </div>                
                <div class="form-group @if($errors->has('satuan')) has-error @endif">
                    <label for="satuan" class="col-sm-12 control-label">Pilihan Diskon</label>    
                    <div class="col-sm-12">
                        <select name="satuan" class="form-control select2">
                            <option value="" selected>Pilih Jenis</option>
                            <option value="PERSEN">PERSEN</option>
                            <option value="POTONGAN">POTONGAN</option>
                        </select>
                    </div>
                </div>
                <div class="form-group @if($errors->has('diskon')) has-error @endif">
                    <label for="diskon" class="col-sm-12 control-label">Value</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('diskon') ? old('diskon') : 0 }}" type="number" name="diskon" class="form-control" id="diskon" placeholder="Diskon" min="0">
                        @if($errors->has('diskon'))
                            <span class="text-danger">{{ $errors->first('diskon') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group row col-sm-12">
                <div class="form-group @if($errors->has('h_nomem')) has-error @endif">
                    <label for="h_nomem" class="col-sm-12 control-label">Harga User</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('h_nomem') }}" type="number" name="h_nomem" class="form-control" id="h_nomem" placeholder="Harga katalog" min="0">
                        @if($errors->has('h_nomem'))
                            <span class="text-danger">{{ $errors->first('h_nomem') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('h_member')) has-error @endif">
                    <label for="h_member" class="col-sm-12 control-label">Harga member</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('h_member') }}" type="number" name="h_member" class="form-control" id="h_member" placeholder="Harga member" min="0">
                        @if($errors->has('h_member'))
                            <span class="text-danger">{{ $errors->first('h_member') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('hpp')) has-error @endif">
                    <label for="hpp" class="col-sm-12 control-label">Harga Hpp</label>    
                    <div class="col-sm-12">
                        <input value="{{ old('hpp') }}" type="number" name="hpp" class="form-control" id="hpp" placeholder="Harga Hpp" min="0">
                        @if($errors->has('hpp'))
                            <span class="text-danger">{{ $errors->first('hpp') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            {{-- <div class="form-group @if($errors->has('tgl_eks')) has-error @endif">
                <label for="tgl_eks" class="col-sm-12 control-label">Tanggal expired</label>    
                <div class="col-sm-6">
                    <input value="{{ old('tgl_eks') }}" type="text" name="tgl_eks" class="form-control datepicker" id="tgl_exp" placeholder="Tanggal expired" required>
                    @if($errors->has('tgl_eks'))
                        <span class="text-danger">{{ $errors->first('tgl_eks') }}</span>
                    @endif
                </div>
            </div> --}}
            <div class="form-group @if($errors->has('deskripsi')) has-error @endif">
                <label for="deskripsi" class="col-sm-12 control-label">Deskripsi</label>    
                <div class="col-sm-12">
                    <textarea name="deskripsi" class="form-control ckeditor" id="deskripsi" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                    @if($errors->has('deskripsi'))
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('cara_pakai')) has-error @endif">
                <label for="cara_pakai" class="col-sm-12 control-label">Cara pakai</label>    
                <div class="col-sm-12">
                    <textarea name="cara_pakai" class="form-control ckeditor" id="cara_pakai" placeholder="Cara pakai">{{ old('cara_pakai') }}</textarea>
                    @if($errors->has('cara_pakai'))
                        <span class="text-danger">{{ $errors->first('cara_pakai') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-grup @if($errors->has('bpom')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="bpom" id="bpom" value="1">
                        <label class="custom-control-label" for="bpom">BPOM</label>
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('stats')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="stats" value="1" id="stats">
                        <label class="custom-control-label" for="stats">Publish barang ini ?</label>
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('flag_bestseller')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="flag_bestseller" value="1" id="flag_bestseller">
                        <label class="custom-control-label" for="flag_bestseller">Termasuk best seller produk ?</label>
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('flag_promo')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="flag_promo" value="1" id="flag_promo">
                        <label class="custom-control-label" for="flag_promo">Termasuk promo produk ?</label>
                    </div>
                </div>
            </div>
            <div class="form-grup @if($errors->has('flag_sell_to_reseller')) has-error @endif">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="flag_sell_to_reseller" value="1" id="flag_sell_to_reseller">
                        <label class="custom-control-label" for="flag_sell_to_reseller">Dijual ke reseller saat pertama kali daftar</label>
                    </div>
                </div>
            </div>

            {{-- <hr>

            <div class="col-md-12">                    
                <h5>Tambahkan produk ke SPB</h5>
            </div>
            <div class="col-md-8 @if($errors->has('no_member')) has-error @endif mb-2" id="product-series">
                <div class="form-inline">
                    <select name="no_member[]" class="custom-select select2">
                        <option value="" selected>Pilih ID SPB</option>
                            <option value="00005">00005</option>
                            <option value="00042">00042</option>
                    </select> 
                    <button type="button" class="btn btn-success ml-3" id="add-productspb">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <table id="append-productspb" class="col-md-8"></table>
            </div> --}}

            <hr>
            
            <h5 class="col-md-12">Search Engine Optimation (SEO)</h5>
            <div class="form-group @if($errors->has('meta_title')) has-error @endif">
                <label for="meta_title" class="col-sm-12 control-label">Meta Title</label>    
                <div class="col-sm-8">
                    <input value="{{ old('meta_title') }}" type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" required>
                    @if($errors->has('meta_title'))
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('meta_description')) has-error @endif">
                <label for="meta_description" class="col-sm-12 control-label">Meta Description</label>    
                <div class="col-sm-8">
                    <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
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
    
    
@stop

@section('js')
    <script type="text/javascript">
       
        // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });


        $(document).ready(function () {
            $('#add-product').click(function() {
                $('.select2').select2();
                $('#append-product').append(`
                    <tr>
                        <td>
                            <div class="input-group col-md-12 mb-2">
                                <select name="produk[]" class="custom-select select2">
                                    <option value="" selected>Pilih produk</option>
                                    @foreach($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
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

            $('#append-product').on('click', '.remove-product', function(){
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


            $('#add-productspb').click(function() {
                $('.select2').select2();
                $('#append-productspb').append(`
                    <tr>
                        <td>
                            <div class="form-inline">
                                <select name="no_member[]" class="custom-select select2">
                                    <option value="" selected>Pilih ID SPB</option>
                                    <option value="00005">00005</option>
                                    <option value="00042">00042</option>
                                </select>                             
                                <button type="button" class="btn btn-danger ml-3 remove-product">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    `);
            });

            $('#append-productspb').on('click', '.remove-product', function(){
                $(this).parent().parent().remove();
            });
        });

        var delay = (function () {
            var timer = 0;

            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // add barang
        $('[name="kode_barang"]').keyup(function () {
                var self = $(this);
                var kode_pack = $(this).val();
                console.log(kode_pack);
            
                delay(function () {
                    $.ajax({
                        url: "{{ route('admin.barang.create_kode') }}",
                        method:'POST',
                        data:"kode_pack="+kode_pack ,
                        success: function(data){
                                var json = data,
                                obj = JSON.parse(json);
                                console.log(obj.nama);
                                console.log(json);
                                self.parents('.barangs').find('[name="nama"]').val(obj.nama);
                                self.parents('.barangs').find('[name="jenis"]').val(obj.jenis);
                                self.parents('.barangs').find('[name="h_nomem"]').val(obj.h_nomem);
                                self.parents('.barangs').find('[name="h_member"]').val(obj.h_member);
                                self.parents('.barangs').find('[name="berat"]').val(obj.berat);
                            }
                        });
                    }, 100);
                });

        
    </script>
@stop
