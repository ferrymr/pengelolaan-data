@extends('adminlte::page')

@section('title', 'Input Movement')

@section('content_header')
    <h1>Movement</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.movement.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        // 'id'=>'form-movement'
        'onsubmit' => 'return create_invoice(this)'
    ]) !!}

<div class="card col-12">
    <div class="card-header">
        <h3 class="card-title">Input Movement</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4 @if($errors->has('no_sm')) has-error @endif">
                <label for="no_sm" class="col-sm-12 control-label">No Faktur</label>    
                <div class="col-sm-10">
                    <input type="text" name="no_sm" class="form-control" id="no_sm">
                    @if($errors->has('no_sm'))
                        <span class="text-danger">{{ $errors->first('no_sm') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('no_member')) has-error @endif">
                <label for="no_member" class="col-sm-12 control-label">No Member</label>    
                <div class="col-sm-10">
                    <input type="text" name="no_member" class="form-control" id="no_member" placeholder="no member" >
                    @if($errors->has('no_member'))
                        <span class="text-danger">{{ $errors->first('no_member') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('tipe_move')) has-error @endif">
                <label for="tipe_move" class="col-sm-12 control-label">Tipe Movement</label>    
                <div class="input-group col-sm-10">
                    <select name="tipe_move" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                        <option selected></option>
                        <option value="ADMINISTRATIF" name="administratif" id="administratif">Administratif</option>
                        <option value="BARANG IKLAN ENDORSE" name="barang_iklan_endorse" id="barang_iklan_endorse">Barang Iklan Endorse</option>
                        <option value="BARANG SUSULAN" name="barang_susulan" id="barang_susulan">Barang Susulan</option>
                        <option value="BARANG UNTUK MARKETING" name="barang_untuk_marketing" id="barang_untuk_marketing">Barang Untuk Marketing</option>
                        <option value="BARANG UNTUK KLINIK" name="barang_untuk_klinik" id="barang_untuk_klinik">Barang Untuk Klinik</option>
                        <option value="CLINIC" name="clinic" id="clinic">Clinic</option>
                        <option value="DIAMBIL PIMPINAN" name="diambil_pimpinan" id="diambil_pimpinan">Diambil Pimpinan</option>
                        <option value="PINJAMAN" name="pinjaman" id="pinjaman">Pinjaman</option>
                        <option value="RUSAK SAAT PENGIRIMAN" name="rusak_saat_pengiriman" id="rusak_saat_pengiriman">Rusak Saat Pengiriman</option>
                        <option value="SERVICE POINT" name="service_point" id="service_point">Service Point</option>
                      </select>
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('tgl_pinjam')) has-error @endif">
                <label for="tgl_pinjam" class="col-sm-12 control-label">Tanggal</label>    
                <div class="col-sm-10">
                    <input type="text" name="tgl_pinjam" class="form-control" id="tgl_pinjam" placeholder="tanggal" value="<?php echo date('Y-m-d') ?>" readonly="true">
                    @if($errors->has('tgl_pinjam'))
                        <span class="text-danger">{{ $errors->first('tgl_pinjam') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('nama')) has-error @endif">
                <label for="nama" class="col-sm-12 control-label">Nama Member</label>    
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="nama member" readonly="true">
                    @if($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-4 @if($errors->has('keterangan')) has-error @endif">
                <label for="keterangan" class="col-sm-12 control-label">Keterangan</label>    
                <div class="col-sm-10">
                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="keterangan" >
                    @if($errors->has('keterangan'))
                        <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                    @endif
                </div>
            </div>   
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Create</button>
    </div>
    <table class="table table-hovered table-striped table-bordered form-table" id="movement-add">
        <thead>
            <tr>
                <th width="120px">Kode Barang</th>
                <th width="350px">Nama Barang</th>
                <th width="250px">Jenis</th>
                <th width="120px">Jumlah</th>
                <th width="120px"><a href="#" class="btn btn-info addRow">
                    <i class="fa fa-plus-square fa-fw"></i>&nbsp;
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="detailLine">
                <td>
                    <input type="text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode Barang">
                </td>
                <td>
                    <input type="text" name="nama[]" class="form-control" id="nama" placeholder="Nama Barang" readonly="true">
                </td>
                <td>
                    <input type="text" name="jenis[]" class="form-control" id="jenis" placeholder="Jenis" readonly="true" >
                </td>
                <td>
                    <input type="number" name="jumlah[]" class="form-control input-jumlah" id="jumlah" min="1" placeholder="Jumlah">
                </td>
                <td>
                    <a href="#" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td style="border: none"></td>
                <td style="border: none"></td>
                <td style="border: none"></td>
                <td style="border: none"><button type="submit" class="btn btn-info float-right">Update</button></td>
                <td style="border: none"><a href="{{ route("admin.movement.add") }}" class="btn btn-default float-right">Cancel</a></td>
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

// Nama Member
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
                    url: "{{ route('admin.movement.get.nama') }}",
                    method:'GET',
                    data:"no_member="+no_member , 
                success: function(data){
                        
                        $('#nama').val(data.nama);
                        
                }});
            }, 1000);
        });

// No Invoice
function create_invoice(form) {
            console.log(form);
            $.ajax({
                    url: "{{ route('admin.movement.create.invoice') }}",
                    method:'POST',
                    // data:"no_member="+no_member , 
                success: function(data){
                    console.log(data);
                    var no_invoice = data;
                    $('[name=no_sm]').val(no_invoice); 
                            // var json = data,
                            // obj = JSON.parse(json);
                            // console.log(json);
                            // $('#nama').val(obj.nama);
                        
                }});
            
            var no_invoice = '2020/SM/00001';
            $('[name=no_sm]').val(no_invoice); 
            return (false);
        }
       
        // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true
        })

// Add Barang        
        initKodeBarang();
            function initKodeBarang(){
                console.log('initKodeBarang');
            $('[name="kode_barang[]"]').keyup(function () {
                var self                          = $(this);
                var kode_barang                   = $(this).val();
                console.log(kode_barang);
                var no_member                     = $('#no_member').val();
            delay(function () {
               
                $.ajax({
                    url                           : "{{ route('admin.movement.create.kode') }}",
                    method                        : 'POST',
                    data: {
                        'kode_barang'             : kode_barang,
                        'no_member'               : no_member
                    },
                success: function(obj){
                        // self.parents('.detailLine').find('[name="nama[]"]').val(obj.nama);
                        // self.parents('.detailLine').find('[name="jenis[]"]').val(obj.jenis);
                        // self.parents('.detailLine').find('[name="harga[]"]').val(obj.h_member);
                        var contents              = {},
                            duplicates            = false;
                
                            $('[name="kode_barang[]"]').each(function() {
                                var hasil         = this.value;

                                if (contents[hasil]) {
                                    duplicates    = true;
                                    return false;
                                }
                                    
                                contents[hasil]   = true;
                            }); 

                            if (duplicates) {
                                alert("Kode barang sudah ada");
                            } else {
                                self.parents('.detailLine').find('[name="nama[]"]').val(obj.nama);
                                self.parents('.detailLine').find('[name="jenis[]"]').val(obj.jenis);
                            }
                            
                },
                error: function(data){
                    var err                       = JSON.parse(data.responseText);
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
            // grandTotal();
        });

    function addRow(){
            var tr = '<tr class="detailLine">'+
                    '<td>'+
                        ' <input type   = "text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode Barang" >'+
                    '</td>'+
                    '<td>'+
                    '<input type        = "text" name="nama[]" class="form-control" id="nama" placeholder="Nama" readonly="true" >'+
                    '</td>'+
                    '<td>'+
                        '<input type    = "text" name="jenis[]" class="form-control" id="jenis" placeholder="Jenis" readonly="true" >'+
                    '</td>'+
                    '<td>'+
                        ' <input type   = "number" name="jumlah[]" min="1" class="form-control input-jumlah" id="jumlah" placeholder="Jumlah" >'+
                    '</td>'+
                    '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash fa-fw"></i></a>'
                    '</td>'+
                     '</tr>'+
                $('tbody').append(tr);
                initKodeBarang();
            };
            $('tbody').on('click', '.remove', function(){
               $(this).parent().parent().remove();
           });

           $(document).on('change keyup', '.input-jumlah', function() {
            var qty   = $(this).val();
            // var harga = $(this).closest('.detailLine').find('.input-harga').val();
            // var total = qty * harga;

            // $(this).closest('.detailLine').find('.input-total').val( total );
            // grandTotal();
       
        });

    // $('.update-data').on('click',function(){
    //         updateData();
    //     });


    //     function updateData(){
    //         var no_invoice = $('input[name="no_sm"]').val();
    //         var tanggal = $('input[name="tgl_pinjam"]').val();
    //         var no_member = $('input[name="no_member"]').val();
    //         var nama = $('input[name="nama"]').val();
    //         var tipe_move = $('input[name="tipe_move"]').val();
    //         // var harga  = $('input[name="harga"]').val();
    //         var note = $('input[name="keterangan"]').val();
    //         // var trans = $('.jenis-bayar').find(':selected').text();
    //         // var bayar =  $('.type-bayar').find(':selected').text();
    //         // var cc =  $('.jenis-bank').find(':selected').text();
            
    //         // table detail movement
    //         // var kd_barang = [];
    //         // var test =[];
    //         // var i =1;
    //         // var a =1;
    //         // var b = 1;
    //         // var first = 7;
    //         // var cek = 7;
    //         // $('#movement-add').find('.detailLine input').each(function(){
    //         //     if(cek == 7){
    //         //         b=0;
    //         //     }

    //         //     if(i++ == (first * a) - b){
    //         //        b++;
    //         //        a++;
    //         //        cek = first * a;
    //         //     }
    //         //     kd_barang[a] += $(this).val()+',';
               
    //         // });
    //         // var detail_barang = kd_barang;
            
            

    //         // var grandTotal = 0;
    //         // $('.detailLine').find('input[name="total[]"]').each(function(){
    //         //     grandTotal += parseInt($(this).val());  
               
    //         // });
    //         // var sub_total = grandTotal;

    //         $.ajax({
    //             method: "POST",
    //             url: "{{ route('admin.movement.update_movement') }}",
    //             data: { 
    //                 _token :"{{ csrf_token() }}",
    //                 no_invoice: no_invoice, 
    //                 tanggal: tanggal,
    //                 no_member : no_member,
    //                 nama    : nama,
    //                 tipe_move : tipe_move,
    //                 // harga : harga,
    //                 note  : note,
    //                 // trans : trans,
    //                 // bayar : bayar,
    //                 // cc  : cc,
    //                 // detail_barang : detail_barang,
    //                 // sub_total : sub_total, 
    //                  }
    //         })
    //         // .done(function( data ) {
    //         //     console.log(data);
    //         //     window.location.href=data.redirect_url;
    //         // });
            
    //     }
    </script>
@stop