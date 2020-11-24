@extends('adminlte::page')

@section('title', 'Tambah Adjusment')

@section('content_header')
    <h1>Adjusment</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.adjusment.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-adjusment'
    ]) !!}

    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Tambah Adjusment</h3>
            </div>
            <div class="card-body">
                <div class="form-group @if($errors->has('no-so')) has-error @endif">
                    <label for="no_member" class="col-sm-2 control-label">No Adjusment</label>    
                    <div class="col-sm-2">
                        <input type="text" name="no_so" class="form-control" value="{{ $newCode }}" id="no_so" placeholder="Nomor Adjusment" required>
                        @if($errors->has('no_so'))
                            <span class="text-danger">{{ $errors->first('no_so') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group row col-sm-12">
                    <div class="form-group @if($errors->has('tanggal')) has-error @endif">
                        <label for="nik" class="col-sm-12 control-label">Tanggal</label>    
                        <div class="col-sm-12">
                            <input type="birthdate" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control datepicker" placeholder="Tanggal" required>
                            @if($errors->has('tanggal'))
                                <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('pos')) has-error @endif">
                        <label for="name" class="col-sm-12 control-label">Posisi</label>    
                        <div class="col-sm-12">
                            <select name="pos" class="form-control select2" id="pos" required>
                                <option value="">Pilih Lokasi Barang</option>
                                <option value="HO">Head Office</option>
                                @foreach($stokis as $value)
                                    <option value="{{ $value->no_member }}">
                                        {{ $value->no_member }} {{ strtoupper($value->nama) }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pos'))
                                <span class="text-danger">{{ $errors->first('pos') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group @if($errors->has('jenis')) has-error @endif">
                    <label for="name" class="col-sm-8 control-label">Jenis Adjusment</label>    
                    <div class="col-sm-8">
                        <input type="text" name="jenis" value="" class="form-control" id="jenis" placeholder="Jenis Adjusment" readonly required>
                        @if($errors->has('jenis'))
                            <span class="text-danger">{{ $errors->first('jenis') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group @if($errors->has('note')) has-error @endif">
                    <label for="name" class="col-sm-12 control-label">Catatan</label>    
                    <div class="col-sm-12">
                        <input type="text" name="note" class="form-control" id="note" placeholder="Tambah Catatan" required>
                        @if($errors->has('note'))
                            <span class="text-danger">{{ $errors->first('note') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Daftar Barang</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-bordered form-table">
                    <thead>
                        <tr>
                            <th style="width: 120px;">Barang</th>
                            <th>Nama</th>
                            <th style="width: 90px;">Stok</th>
                            <th style="width: 90px;">Hasil</th>
                            <th style="text-align: center; width: 60px;">
                                <a href="javascript:;" class="btn btn-info btn-sm addRow">+</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="detailItem">
                            <td>
                                <input type="text" name="kode_barang[]" class="form-control" id="kode_barang" placeholder="Kode" required>
                            </td>
                            <td>
                                <input type="text" name="nama[]" class="form-control" id="nama" placeholder="Nama Barang" readonly>
                            </td>
                            <td>
                                <input type="number" name="stok[]" id="stok" min="1" class="form-control" readonly>
                            </td>
                            <td>
                                <input type="number" name="jumlah[]" id="jumlah" class="form-control" required>
                            </td>
                            <td style="text-align: center;">
                                <a href="javascript:;" class="btn btn-danger btn-sm remove">-</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route("admin.adjusment.index") }}" class="btn btn-warning float-right" style="color: white;">Kembali</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop

@section('css')

@stop

@section('js')
    <script>
        // // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
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

        // komposisi barang
        initKodeBarang();

        function initKodeBarang(){
            console.log('initKodeBarang');
            
            $('[name="kode_barang[]"]').keyup(function () {
                var self = $(this);
                var kode_barang = $(this).val();
                console.log(kode_barang);
            
                delay(function () {
                    $.ajax({
                        url: "{{ route('admin.adjusment.komposisi') }}",
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
                                console.log(obj.stok);
                                console.log(json);
                                
                                self.parents('.detailItem').find('[name="nama[]"]').val(obj.nama);
                                self.parents('.detailItem').find('[name="stok[]"]').val(obj.stok);
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
                        '<input type="text" name="kode_barang[]" id="kode_barang" class="form-control" required>'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="nama[]" id="nama" class="form-control" readonly>'+
                    '</td>'+
                    '<td>'+
                        '<input type="number" name="stok[]" id="stok" min="1" class="form-control" readonly>'+
                    '</td>'+
                    '<td>'+
                        '<input type="number" name="jumlah[]" id="jumlah" class="form-control" required>'+
                    '</td>'+
                    '<td style="text-align: center;">'+
                        '<a href="javascript:;" class="btn btn-danger btn-sm remove">-</a>'+
                    '</td>'+
                '</tr>';

            $('tbody').append(tr);
            initKodeBarang();
        };

        $('tbody').on('click', '.remove', function(){
            $(this).parent().parent().remove();
        });

        $('#pos').on('change',function(e){
            console.log(e);
            var member_id = e.target.value;

            if (member_id == "HO") {
                $('#jenis').val("DISTRIBUTOR - HEAD OFFICE");
            } else {
                $('#jenis').val("SERVICE POINT - "+member_id);
            }

        });
    </script>
@stop