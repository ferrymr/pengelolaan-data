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
        'id'=>'form-movement'
    ]) !!}

<div class="card col-12">
    <div class="card-header">
        <h3 class="card-title">Input Movement</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6 @if($errors->has('no_faktur')) has-error @endif">
                <label for="no_faktur" class="col-sm-12 control-label">No Faktur</label>    
                <div class="col-sm-10">
                    <input type="text" value="{{ $noFaktur }}" name="no_faktur" class="form-control" id="no_faktur" required readonly>
                    @if($errors->has('no_faktur'))
                        <span class="text-danger">{{ $errors->first('no_faktur') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('jenis_movement')) has-error @endif">
                <label for="jenis_movement" class="col-sm-12 control-label">Tipe Movement</label>    
                <div class="input-group col-sm-10">
                    <select name="jenis_movement" class="input-group select2" required>
                        <option value="" selected>Pilih movement</option>
                        <option value="ADMINISTRATIF" name="administratif">ADMINISTRATIF</option>
                        <option value="BARANG IKLAN ENDORSE" name="barang_iklan_endorse">BARANG IKLAN ENDORSE</option>
                        <option value="BARANG SUSULAN" name="barang_susulan">BARANG SUSULAN</option>
                        <option value="BARANG UNTUK MARKETING" name="barang_untuk_marketing">BARANG UNTUK MARKETING</option>
                        <option value="BARANG UNTUK KLINIK" name="barang_untuk_klinik">BARANG UNTUK KLINIK</option>
                        <option value="CLINIC" name="clinic">CLINIC</option>
                        <option value="DIAMBIL PIMPINAN" name="diambil_pimpinan">DIAMBIL PIMPINAN</option>
                        <option value="PINJAMAN" name="pinjaman">PINJAMAN</option>
                        <option value="RUSAK SAAT PENGIRIMAN" name="rusak_saat_pengiriman">RUSAK SAAT PENGIRIMAN</option>
                        <option value="SERVICE POINT" name="service_point">SERVICE POINT</option>
                      </select>
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('tanggal')) has-error @endif">
                <label for="tanggal" class="col-sm-12 control-label">Tanggal</label>    
                <div class="col-sm-10">
                    <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="tanggal" value="<?php echo date('Y-m-d') ?>" readonly="true">
                    @if($errors->has('tanggal'))
                        <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('note')) has-error @endif">
                <label for="note" class="col-sm-12 control-label">Keterangan</label>    
                <div class="col-sm-10">
                    <input type="text" name="note" class="form-control" id="note" placeholder="Keterangan" required>
                    @if($errors->has('note'))
                        <span class="text-danger">{{ $errors->first('note') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group col-md-6 @if($errors->has('tb_spb_id_from')) has-error @endif">
                <label for="tb_spb_id_from" class="col-sm-12 control-label">From</label>    
                <div class="input-group col-sm-10">
                    <select name="tb_spb_id_from" class="input-group select2" required>
                        <option value="" selected>Pilih From</option>
                        @foreach($spb as $dataSpb)
                            <option value="{{ $dataSpb->id }}">{{ $dataSpb->code . ' (' . $dataSpb->city_name . ' - ' . $dataSpb->subdistrict_name . ')' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6 @if($errors->has('tb_spb_id_to')) has-error @endif">
                <label for="tb_spb_id_to" class="col-sm-12 control-label">To</label>    
                <div class="input-group col-sm-10">
                    <select name="tb_spb_id_to" class="input-group select2" required>
                        <option value="" selected>Pilih To</option>
                        @foreach($spb as $dataSpb)
                            <option value="{{ $dataSpb->id }}">{{ $dataSpb->code . ' (' . $dataSpb->city_name . ' - ' . $dataSpb->subdistrict_name . ')' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card-footer">
        <button type="button" class="btn btn-info" id="addinvoice">Create</button>
    </div> --}}
</div>
    
    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Tambahkan Barang</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-bordered form-table">
                <thead>
                    <tr>
                        <th style="width: 120px;">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th style="width: 100px;">Qty</th>
                        <th style="text-align: center; width: 60px;">
                            <a href="javascript:;" class="btn btn-info addRow"><i class="fa fa-plus-square fa-fw"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="detailItem">
                        <td>
                            <input type="text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode" required>
                        </td>
                        <td>
                            <input type="text" name="nama[]" class="form-control" id="nama" placeholder="Nama Barang" readonly="true" >
                        </td>
                        <td>
                            <input type="text" name="jenis[]" class="form-control" id="jenis" placeholder="Jenis Barang" readonly="true" >
                        </td>
                        <td>
                            <input type="number" name="jumlah[]" id="jumlah" min="1" class="form-control" placeholder="Qty" required>
                        </td>
                        <td style="text-align: center;">
                            <a href="javascript:;" class="btn btn-danger remove"><i class="fa fa-trash fa-fw"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <a href="{{ route("admin.movement.index") }}" class="btn btn-default float-right">Cancel</a>
            <button type="submit" class="btn btn-info">Create</button>
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

        // add invoice
        $(document).ready(function() {
            $('#addinvoice').click(function(){
                $('.select2').select2();
                $.ajax({
                            url: "{{ route('admin.movement.addinvoice') }}",
                            method:'POST',
                        success: function(data){
                            console.log(data);
                            var no_invoice = data;
                            $('[name=no_sm]').val(no_invoice); 
                        }});
                    
                    var no_invoice = '2020/SM/00001';
                    $('[name=no_sm]').val(no_invoice); 
                    return (false);
            });
        });

        // add barang
        initKodeBarang();

        function initKodeBarang(){
            console.log('initKodeBarang');
            
            $('[name="kode_barang[]"]').keyup(function () {
                var self = $(this);
                var kode_barang = $(this).val();
            
                delay(function () {
                    $.ajax({
                        url: "{{ route('admin.movement.create.kode') }}",
                        method:'POST',
                        data:"kode_barang="+kode_barang , 
                        success: function(data){
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
                                var json = data,
                                obj = JSON.parse(json);
                                console.log(obj.nama);
                                console.log(json);
                                self.parents('.detailItem').find('[name="nama[]"]').val(obj.nama);
                                self.parents('.detailItem').find('[name="jenis[]"]').val(obj.jenis);
                            }
                        }
                    });
                }, 100);
            });
        }

        $('.addRow').on('click', function(){
            addRow();
        })

        function addRow(){
            var tr = 
                '<tr class="detailItem">'+
                    '<td>'+
                        '<input type="text" name="kode_barang[]" id="kode_barang" class="form-control" placeholder="Kode" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="nama[]" id="nama" class="form-control" placeholder="Nama Barang" readonly>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="jenis[]" id="jenis" class="form-control" placeholder="Jenis Barang" readonly>'+
                    '</td>'+
                    '<td>'+
                        '<input type="number" name="jumlah[]" id="jumlah" min="1" class="form-control" placeholder="Qty" required>'+
                    '</td>'+
                    '<td>'+
                        '<a href="javascript:;" class="btn btn-danger remove"><i class="fa fa-trash fa-fw"></i></a>'+
                    '</td>'+
                '</tr>';

            $('tbody').append(tr);
            initKodeBarang();
        };

        $('tbody').on('click', '.remove', function(){
            $(this).parent().parent().remove();
        });
        
    </script>

@stop