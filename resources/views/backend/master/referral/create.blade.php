@extends('adminlte::page')

@section('title', 'Tambah Referral')

@section('content_header')
    <h1>Tambah Referral</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.referral.store'),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-referral'
    ]) !!}

    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h3 class="card-title">Tambah Referral</h3>
            </div>

            <div class="card-body">
                <div class="dataUpline">
                    <div class="form-group @if($errors->has('no_member')) has-error @endif">
                        <label for="no_member" class="col-sm-2 control-label">Upline ID</label>    
                        <div class="col-sm-2">
                            <input type="text" name="no_member" class="form-control" id="no_member" placeholder="ID Member" required>
                            @if($errors->has('no_member'))
                                <span class="text-danger">{{ $errors->first('no_member') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('nama')) has-error @endif">
                        <label for="nama" class="col-sm-8 control-label">Nama Upline</label>    
                        <div class="col-sm-8">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Upline" readonly>
                            @if($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('info_u')) has-error @endif">
                        <label for="info_1" class="col-sm-12 control-label">Informasi Upline</label>    
                        <div class="col-sm-12">
                            <input type="text" name="info_u" class="form-control" id="info_u" placeholder="Informasi Upline" readonly>
                            @if($errors->has('info_u'))
                                <span class="text-danger">{{ $errors->first('info_u') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('kode_up')) has-error @endif">
                        <label for="kode_up" class="col-sm-2 control-label">Direct ID</label>    
                        <div class="col-sm-2">
                            <input type="number" name="kode_up" class="form-control" id="kode_up" placeholder="ID Upline" readonly>
                            @if($errors->has('kode_up'))
                                <span class="text-danger">{{ $errors->first('kode_up') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="dataDownline">
                    <div class="form-group @if($errors->has('no_down')) has-error @endif">
                        <label for="no_down" class="col-sm-2 control-label">Member ID</label>    
                        <div class="col-sm-2">
                            <input type="text" name="no_down" class="form-control" id="no_down" placeholder="ID Member" required>
                            @if($errors->has('no_down'))
                                <span class="text-danger">{{ $errors->first('no_down') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('namas')) has-error @endif">
                        <label for="namas" class="col-sm-8 control-label">Nama Member</label>
                        <div class="col-sm-8">
                            <input type="text" name="namas" class="form-control" id="namas" placeholder="Nama Member" readonly>
                            @if($errors->has('namas'))
                                <span class="text-danger">{{ $errors->first('namas') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('info_d')) has-error @endif">
                        <label for="info_d" class="col-sm-12 control-label">Informasi Downline</label>    
                        <div class="col-sm-12">
                            <input type="text" name="info_d" class="form-control" id="info_d" placeholder="Informasi Downline" readonly>
                            @if($errors->has('info_d'))
                                <span class="text-danger">{{ $errors->first('info_d') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
                <a href="{{ route("admin.referral.index") }}" class="btn btn-warning float-right" style="color: white;">Kembali</a>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop

@section('css')

@stop

@section('js')
    <script>
        // select2
        $('.no_member').select2();

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

        // data leads
        initReferralLeads();

        function initReferralLeads(){
            console.log('initReferralLeads');
            
            $('[name="no_member"]').keyup(function () {
                var self = $(this);
                var no_member = $(this).val();
                console.log(no_member);
            
                delay(function () {
                    $.ajax({
                        url: "{{ route('admin.referral.leads') }}",
                        method:'POST',
                        data:"no_member="+no_member , 
                        success: function(data){
                            var json = data,
                            obj = JSON.parse(json);
                            console.log(obj.nama);
                            console.log(obj.kode_up);
                            console.log(obj.info_u);
                            console.log(json);

                            self.parents('.dataUpline').find('[name="nama"]').val(obj.nama);
                            self.parents('.dataUpline').find('[name="kode_up"]').val(obj.kode_up);
                            self.parents('.dataUpline').find('[name="info_u"]').val(obj.info_u);
                        }
                    });
                }, 100);
            });
        }

        // data down
        initReferralDown();

        function initReferralDown(){
            console.log('initReferralDown');
            
            $('[name="no_down"]').keyup(function () {
                var self = $(this);
                var no_down = $(this).val();
                console.log(no_down);
            
                delay(function () {
                    $.ajax({
                        url: "{{ route('admin.referral.down') }}",
                        method:'POST',
                        data:"no_down="+no_down , 
                        success: function(data){
                            var json = data,
                            obj = JSON.parse(json);
                            console.log(obj.namas);
                            console.log(obj.info_d)
                            console.log(json);

                            self.parents('.dataDownline').find('[name="namas"]').val(obj.namas);
                            self.parents('.dataDownline').find('[name="info_d"]').val(obj.info_d);
                        }
                    });
                }, 100);
            });
        }
    </script>
@stop