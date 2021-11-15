@extends('adminlte::page')

@section('title', 'Ubah User')

@section('content_header')
    <h1>Ubah User</h1>
@stop

@section('content')
    @include('flash::message')

    {!! Form::open([
        'url' => route('admin.user.update', $currentUser->id),
        'method'=>'POST',
        'class'=>'form-horizontal',
        'id'=>'form-user-update'
    ]) !!}

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">Ubah User</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('name')) has-error @endif">
                    <label for="name" class="col-sm-12 control-label">Nama *</label>    
                    <div class="col-sm-12">
                        <input type="text" value="{{ $currentUser->name }}" name="name" class="form-control" id="name" placeholder="Nama" required>
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group col-sm-6 @if($errors->has('role_id')) has-error @endif">
                    <label for="role_id" class="col-sm-12 control-label">Role *</label>
                    <div class="col-sm-12">
                        <select name="role_id" id="role_id" class="form-control select2">
                            <option value="">Pilih</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if($currentUser->roles[0]->id == $role->id) selected @endif>{{ $role->display_name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('role_id'))
                            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            
            <div class="row">
                <div class="form-group col-sm-6 @if($errors->has('phone')) has-error @endif">
                    <label for="phone" class="col-sm-12 control-label">Nomor Telepon *</label>    
                    <div class="col-sm-12">
                        <input type="phone" value="{{ $currentUser->phone }}"  name="phone" class="form-control" id="phone" placeholder="Nomor Telepon">
                        @if($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-6 @if($errors->has('email')) has-error @endif">
                    <label for="email" class="col-sm-12 control-label">Email *</label>    
                    <div class="col-sm-12">
                        <input type="email" value="{{ $currentUser->email }}" name="email" class="form-control" id="email" placeholder="Email">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            {{-- <div class="form-group">
                <label for="point" class="col-sm-12 control-label">Point</label>    
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <input type="text" name="point" class="form-control" id="point" placeholder="Point" disabled>
                        <div class="input-group-append">
                          <span class="input-group-text">Pts</span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
            <a href="{{ route("admin.user.index") }}" class="btn btn-default float-right">Cancel</a>
        </div>
    </div>    

    {!! Form::close() !!}
@stop

@section('css')

@stop

@section('js')
    <script>
        // select2
        $('.select2').select2();

        // date picker
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        })
    </script>
@stop