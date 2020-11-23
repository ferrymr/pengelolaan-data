@extends('adminlte::page')

@section('title', 'Tambah Pembelian')

@section('content_header')
    <h1>Tambah Pembelian</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.pembelian.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-pembelian',
        // 'onsubmit' => 'return create_invoice(this)'

    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambah Pembelian</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6 @if($errors->has('no_po')) has-error @endif">
                <label for="no_po" class="col-sm-12 control-label">No PO *</label>    
                <div class="col-sm-10">
                    <input value="{{ $index }}" type="text" name="no_po" class="form-control" id="no_po" placeholder="Code" readonly required>
                    @if($errors->has('no_po'))
                        <span class="text-danger">{{ $errors->first('no_po') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('tanggal')) has-error @endif">
                <label for="tanggal" class="col-sm-12 control-label">Tanggal *</label>    
                <div class="col-sm-10">
                    <input type="text" name="tanggal" class="form-control datepicker" readonly="true" placeholder="Tanggal Input" value="<?php echo date('Y-m-d') ?>" >
                    @if($errors->has('tanggal'))
                        <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('kode_supp')) has-error @endif">
                <label for="kode_supp" class="col-sm-12 control-label">Kode Supplier *</label>    
                <div class="col-sm-10">
                    <input type="text" name="kode_supp" class="form-control" id="kode_supp" placeholder="Kode Supplier" >
                    @if($errors->has('kode_supp'))
                        <span class="text-danger">{{ $errors->first('kode_supp') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('nama')) has-error @endif">
                <label for="nama" class="col-sm-12 control-label">Nama *</label>    
                <div class="col-sm-10">
                    <input type="text" name="nama_supp" class="form-control" id="nama" placeholder="Nama Supplier" readonly="true" >
                    @if($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
            </div>
            </div>
        </div>
        <div class="card-footer">
            {{-- <button type="submit" class="btn btn-info">Create</button> --}}
            <a href="{{ route("admin.pembelian.add") }}" class="btn btn-default float-right">Back</a>
        </div>
        <table class="table table-hovered table-striped table-bordered form-table" id="pembelian-add">
            <thead>
                <tr>
                    <th width="200px">Kode Barang</th>
                    <th width="350px">Nama</th>
                    <th widht="200px">Jenis</th>
                    <th width="100px">Quantity</th>
                    <th width="150px">Harga</th>
                    <th width="170px">Total</th>
                    <th style="text-align: center"><a href="javascript:void(0)" class="btn btn-info addRow">+</a></th>
                </tr>
            </thead>
            <tbody>
                <tr class="detailLine">
                    <td>
                        <input type="text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode Barang" >
                    </td>
                    <td>
                        <input type="text" name="nama[]" class="form-control" id="nama_p" placeholder="Nama" readonly="true" >
                    </td>
                    <td>
                        <input type="text" name="jenis[]" class="form-control" id="jenis" placeholder="Jenis" readonly="true" >
                    </td>
                    <td>
                        <input type="number" name="jumlah[]" class="form-control input-jumlah" id="jumlah" min="1" placeholder="Qty" >
                    </td>
                    <td>
                        <input type="text" name="harga[]" class="form-control input-harga" id="harga" placeholder="Harga" readonly="true" >
                    </td>
                    <td>
                        <input type="text" name="total[]" class="form-control input-total" id="total" readonly="true" placeholder="Total" value="0">
                    </td>
                    <td style="text-align: center"><a href="#" class="btn btn-danger">-</a></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="grandTotal">
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td style="border: none"></td>
                    <td>Total :</td>
                    <td><input type="text" name="sub_total" class=" form-control grand-total" id="sub_total" value="0" readonly="true"></td>
                    <td style="text-align: center"> <button type="submit" class="btn btn-info">Create</button></td>
                </tr>
            </tfoot>
        </table>        
    </div>    

    {!! Form::close() !!}
@stop

@section('css')

@stop

@section('js')
    <script>
          // ===========================GET NAMA MEMBER========================================================
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
        $("#kode_supp").keyup(function () {
            delay(function () {
                var kode_supp = $("#kode_supp").val();
                $.ajax({
                    url: "{{ route('admin.pembelian.get.nama') }}",
                    method:'GET',
                    data:"kode_supp="+kode_supp , 
                success: function(data){
                        
                        $('#nama').val(data.nama);
                        
                }});
            }, 1000);
        });

        // =====================================ADD ROW TABEL==================================================
        initKodeBarang();
            function initKodeBarang(){
                // console.log('initKodeBarang');
            $('[name="kode_barang[]"]').keyup(function () {
                var self = $(this);
                var kode_barang = $(this).val();
                console.log(kode_barang);
                var kode_supp = $('#kode_supp').val();
            delay(function () {
               
                $.ajax({
                    url: "{{ route('admin.pembelian.create.kode') }}",
                    method:'POST',
                    data: {
                        'kode_barang': kode_barang,
                        'kode_supp' : kode_supp
                    },
                success: function(obj){
                        // self.parents('.detailLine').find('[name="nama[]"]').val(obj.nama);
                        // self.parents('.detailLine').find('[name="jenis[]"]').val(obj.jenis);
                        // self.parents('.detailLine').find('[name="harga[]"]').val(obj.h_member);
                        var contents = {},
                            duplicates = false;
                
                            $('[name="kode_barang[]"]').each(function() {
                                var hasil = this.value;

                                if (contents[hasil]) {
                                    duplicates = true;
                                    return false;
                                }
                                    
                                contents[hasil] = true;
                            }); 

                            if (duplicates) {
                                alert("There were duplicates.");
                            } else {
                                self.parents('.detailLine').find('[name="nama[]"]').val(obj.nama);
                                self.parents('.detailLine').find('[name="jenis[]"]').val(obj.jenis);
                                self.parents('.detailLine').find('[name="harga[]"]').val(obj.hpp);
                            }
                            
                },
                error: function(data){
                    var err = JSON.parse(data.responseText);
                    alert(err.msg);   
                    $('#kode_barang').val('');
                },
                }
                );
            }, 100);
        });
    }
        $('.addRow').on('click',function(){
            addRow();
            grandTotal();
        });

        function addRow(){
            var tr = '<tr class="detailLine">'+
                             '<td>'+
                                    ' <input type="text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode Barang" >'+
                              '</td>'+
                              '<td>'+
                                '<input type="text" name="nama[]" class="form-control" id="nama_p" placeholder="Nama" readonly="true" >'+
                                '</td>'+
                                '<td>'+
                                    '<input type="text" name="jenis[]" class="form-control" id="jenis" placeholder="Jenis" readonly="true" >'+
                                '</td>'+
                                '<td>'+
                                    ' <input type="number" name="jumlah[]" min="1" class="form-control input-jumlah" id="jumlah" placeholder="Qty" >'+
                                '</td>'+
                                '<td>'+
                                    ' <input type="text" name="harga[]" class="form-control input-harga" id="harga" placeholder="Harga" readonly="true" >'+
                                '</td>'+
                                '<td>'+
                                    '<input type="text" name="total[]" class="form-control input-total" id="total" readonly="true" placeholder="Total" value="0"'+
                                '</td>'+
                                '<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a>'
                                '</td>'+
                     '</tr>'+

                $('tbody').append(tr);
                initKodeBarang();
            };

           $('tbody').on('click', '.remove', function(){
               $(this).parent().parent().remove();
               grandTotal();
           });

        $(document).on('change keyup', '.input-jumlah', function() {
            var qty   = $(this).val();
            var harga = $(this).closest('.detailLine').find('.input-harga').val();
            var total = qty * harga;

            $(this).closest('.detailLine').find('.input-total').val( total );
            grandTotal();
       
        });


        function grandTotal(){
            var grandTotal = 0;
            $('.detailLine').find('input[name="total[]"]').each(function(){
                grandTotal += parseInt($(this).val());  
               
            });
            $('.grand-total').val(grandTotal);  
        }
     
    </script>
@stop