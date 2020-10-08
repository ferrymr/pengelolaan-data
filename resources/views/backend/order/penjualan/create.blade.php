@extends('adminlte::page')

@section('title', 'Tambah Penjualan')

@section('content_header')
    <h1>Tambah Penjualan</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        // 'url' => route('admin.penjualan.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-penjualan',
        'onsubmit' => 'return create_invoice(this)'

    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Penjualan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6 @if($errors->has('no_do')) has-error @endif">
                <label for="no_do" class="col-sm-12 control-label">No Invoice *</label>    
                <div class="col-sm-10">
                    <input type="text" name="no_do" class="form-control" id="">
                    @if($errors->has('no_do'))
                        <span class="text-danger">{{ $errors->first('no_do') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('tanggal')) has-error @endif">
                <label for="tanggal" class="col-sm-12 control-label">Tanggal *</label>    
                <div class="col-sm-10">
                    <input type="text" name="tanggal" class="form-control datepicker" placeholder="Tanggal Input">
                    @if($errors->has('tanggal'))
                        <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('no_member')) has-error @endif">
                <label for="no_member" class="col-sm-12 control-label">No Member *</label>    
                <div class="col-sm-10">
                    <input type="text" name="no_member" class="form-control" id="no_member" placeholder="No Member" >
                    @if($errors->has('no_member'))
                        <span class="text-danger">{{ $errors->first('no_member') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('nama')) has-error @endif">
                <label for="nama" class="col-sm-12 control-label">Nama *</label>    
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" readonly="true" >
                    @if($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
            </div>
            {{-- <div class="form-group col-md-4 @if($errors->has('jenis')) has-error @endif">
                <label for="jenis" class="col-sm-12 control-label">Jenis *</label>    
                <div class="col-sm-9">
                    <select name="jenis" id="jenis" class="form-control select2">
                        <option value="">Pilih Jenis </option>
                        <option value="1">Satuan</option>
                        <option value="2">Series</option>
                    </select>
                    @if($errors->has('jenis'))
                        <span class="text-danger">{{ $errors->first('jenis') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('kode_barang')) has-error @endif">
                <label for="kode_barang" class="col-sm-12 control-label">Kode Barang *</label>    
                <div class="col-sm-9">
                    <input type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="Kode Barang">
                    @if($errors->has('kode_barang'))
                        <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('jumlah')) has-error @endif">
                <label for="jumlah" class="col-sm-12 control-label">Qty *</label>    
                <div class="col-sm-9">
                    <input type="text" name="jumlah" class="form-control" id="" placeholder="Qty">
                    @if($errors->has('jumlah'))
                        <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                    @endif
                </div>
            </div> --}}
            <div class="form-group col-md-4 @if($errors->has('kode_barang')) has-error @endif">
                <label for="kode_barang" class="col-sm-12 control-label">Pilih Jenis Ongkir *</label>    
                <div class="col-sm-9">
                    <select name="kode_barang" id="" class="form-control select2">
                        <option value="">Pilih Jenis Ongkir</option>
                        <option value="">OK001</option>
                        <option value="">OK002</option>
                    </select>
                    @if($errors->has('kode_barang'))
                        <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('harga')) has-error @endif">
                <label for="harga" class="col-sm-12 control-label">Harga Ongkir *</label>    
                <div class="col-sm-9">
                    <input type="text" name="harga" class="form-control" id="" placeholder="Harga Ongkir">
                    @if($errors->has('harga'))
                        <span class="text-danger">{{ $errors->first('harga') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('note')) has-error @endif">
                <label for="note" class="col-sm-12 control-label">Keterangan *</label>    
                <div class="col-sm-9">
                    <input type="text" name="note" class="form-control" id="" placeholder="Keterangan">
                    @if($errors->has('note'))
                        <span class="text-danger">{{ $errors->first('note') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-3 @if($errors->has('trans')) has-error @endif">
                <label for="trans" class="col-sm-12 control-label">Pilih Jenis Pembayaran *</label>    
                <div class="col-sm-8">
                    <select name="trans" id="" class="form-control select2">
                        <option value="">Pilih Jenis Pembayar</option>
                        <option value="">CREDIT</option>
                        <option value="">COD</option>
                        <option value="">CASH</option>
                        <option value="">CARD</option>
                    </select>
                    @if($errors->has('trans'))
                        <span class="text-danger">{{ $errors->first('trans') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-3 @if($errors->has('bayar')) has-error @endif">
                <label for="bayar" class="col-sm-12 control-label">Type Pembayaran *</label>    
                <div class="col-sm-8">
                    <select name="bayar" id="" class="form-control select2">
                        <option value="">Type Pembayaran</option>
                        <option value="">DEBIT</option>
                        <option value="">CREDIT</option>
                    </select>
                    @if($errors->has('bayar'))
                        <span class="text-danger">{{ $errors->first('bayar') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-3 @if($errors->has('cc')) has-error @endif">
                <label for="cc" class="col-sm-12 control-label">Pilih Jenis Bank *</label>    
                <div class="col-sm-8">
                    <select name="cc" id="" class="form-control select2">
                        <option value="">Pilih Jenis Bank</option>
                        <option value="">BCA</option>
                        <option value="">BNI</option>
                        <option value="">BRI</option>
                        <option value="">MANDIRI</option>
                    </select>
                    @if($errors->has('cc'))
                        <span class="text-danger">{{ $errors->first('cc') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-3 @if($errors->has('sub_total')) has-error @endif">
                <label for="sub_total" class="col-sm-12 control-label">Sub Total *</label>    
                <div class="col-sm-8">
                    <input type="text" name="sub_total" class="form-control" id="" placeholder="Sub Total">
                    @if($errors->has('sub_total'))
                        <span class="text-danger">{{ $errors->first('sub_total') }}</span>
                    @endif
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Create</button>
            <a href="{{ route("admin.penjualan.add") }}" class="btn btn-default float-right">Cancel</a>
        </div>
        <table class="table table-hovered table-striped table-bordered form-table" id="">
            <thead>
                <tr>
                    <th width="200px">Kode Barang</th>
                    <th width="350px">Nama</th>
                    <th widht="200px">Jenis</th>
                    <th width="100px">Quantity</th>
                    <th width="150px">Harga</th>
                    <th width="170px">Total</th>
                    <th style="text-align: center"><a href="#" class="btn btn-info addRow">+</a></th>
                </tr>
            </thead>
            <tbody>
                <tr class="detailLine">
                    <td>
                        <input type="text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode Barang" >
                    </td>
                    <td>
                        {{-- <select name="jenis[]" id="jenis" class="form-control select2">
                            <option value="">Pilih Jenis </option>
                            <option value="1">Satuan</option>
                            <option value="2">Series</option>
                        </select> --}}
                        <input type="text" name="nama[]" class="form-control" id="nama_p" placeholder="Nama" readonly="true" >

                    </td>
                    <td>
                        <input type="text" name="jenis[]" class="form-control" id="jenis" placeholder="Jenis" readonly="true" >
                    </td>
                    <td>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Qty" >
                    </td>
                    <td>
                        <input type="text" name="harga[]" class="form-control" id="harga" placeholder="Harga" readonly="true" >
                    </td>
                    <td>
                        <input type="text" name="total" class="form-control" id="total" placeholder="Total" >
                    </td>
                    <td style="text-align: center"><a href="#" class="btn btn-danger">-</a></td>
                </tr>
            </tbody>
        </table>        
    </div>    

    {!! Form::close() !!}
@stop

@section('css')

@stop

@section('js')
    <script>
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
        $("#no_member").keyup(function () {
            delay(function () {
                var no_member = $("#no_member").val();
                $.ajax({
                    url: "{{ route('admin.penjualan.get.nama') }}",
                    method:'GET',
                    data:"no_member="+no_member , 
                success: function(data){
                        var json = data,
                        obj = JSON.parse(json);
                        console.log(json);
                        $('#nama').val(obj.nama);
                        
                }});
            }, 1000);
        });
        // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })


        function create_invoice(form) {
            console.log(form);
            $.ajax({
                    url: "{{ route('admin.penjualan.create.invoice') }}",
                    method:'POST',
                    // data:"no_member="+no_member , 
                success: function(data){
                    console.log(data);
                    var no_invoice = data;
                    $('[name=no_do]').val(no_invoice); 
                            // var json = data,
                            // obj = JSON.parse(json);
                            // console.log(json);
                            // $('#nama').val(obj.nama);
                        
                }});
            
            var no_invoice = '2020/INV/00001';
            $('[name=no_do]').val(no_invoice); 
            return (false);
        }
        
        // $("#kode_barang").keyup(function () {
        //     var kode_barang = $(this).val();
        //     $.ajax({
        //             url: "{{ route('admin.penjualan.create.kode') }}",
        //             method:'POST',
        //             data:"kode_barang="+kode_barang , 
        //         success: function(data){
        //             if(data == 1){
        //                 $("#jenis").select2("val", "1");
        //             }else{
        //                 $("#jenis").select2("val", "2");
        //             }
        //             console.log(data);
        //             // var no_invoice = data;
        //             // $('[name=no_do]').val(no_invoice); 
                        
        //         }});
        // });
        initKodeBarang();
            function initKodeBarang(){
                console.log('initKodeBarang');
            $('[name="kode_barang[]"]').keyup(function () {
                var self = $(this);
                var kode_barang = $(this).val();
                console.log(kode_barang);
            delay(function () {
               
                $.ajax({
                    url: "{{ route('admin.penjualan.create.kode') }}",
                    method:'POST',
                    data:"kode_barang="+kode_barang , 
                success: function(data){
                        var json = data,
                        obj = JSON.parse(json);
                        console.log(obj.nama);
                        console.log(json);
                        self.parents('.detailLine').find('[name="nama[]"]').val(obj.nama);
                        self.parents('.detailLine').find('[name="jenis[]"]').val(obj.jenis);
                        self.parents('.detailLine').find('[name="harga[]"]').val(obj.h_member);
                        //$('#nama_p').val(obj.nama);
                        //$('#jenis').val(obj.jenis);
                        //$('#harga').val(obj.h_member);
                        
                }});
            }, 100);
        });
    }
        $('.addRow').on('click',function(){
            addRow();
        });

        function addRow(){
            var tr = '<tr class="detailLine">'+
                             '<td>'+
                                    ' <input type="text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode Barang" >'+
                              '</td>'+
                              '<td>'+
                                    // '<select name="jenis" id="jenis" class="form-control select2">'+
                                    //     '<option value="">Pilih Jenis </option>'+
                                    //     '<option value="1">Satuan</option>'+
                                    //     '<option value="2">Series</option>'+
                                    // '</select>'+
                                    '<input type="text" name="nama[]" class="form-control" id="nama" placeholder="Nama" readonly="true" >'+
                                        '</td>'+
                                        '<td>'+
                                            '<input type="text" name="jenis[]" class="form-control" id="jenis" placeholder="Jenis" readonly="true" >'+
                                        '</td>'+
                                        '<td>'+
                                            ' <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Qty" >'+
                                        '</td>'+
                                        '<td>'+
                                            ' <input type="text" name="harga[]" class="form-control" id="harga" placeholder="Harga" readonly="true" >'+
                                        '</td>'+
                                        '<td>'+
                                            '<input type="text" name="total" class="form-control" id="total" placeholder="Total"'+
                                        '</td>'+
                                        '<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a>'
                                        '</td>'+
                     '</tr>'+
                $('tbody').append(tr);
                initKodeBarang();
            };

           $('tbody').on('click', '.remove', function(){
               $(this).parent().parent().remove();
           })


        
    </script>
@stop