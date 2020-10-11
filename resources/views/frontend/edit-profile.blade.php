@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection

@section('content')

{{-- wrap main content --}}
<div class="main-content main-content-login" style="margin-bottom:50px;">
    <div class="container">

        {{-- breadsrumb --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin"><a href="index.html">Home</a></li>
                        <li class="trail-item">
                            <a href="{{ route('profile.index') }}">
                                <span>
                                    Profile
                                </span>
                            </a>
                        </li>
                        <li class="trail-item">
                            <span>
                                Edit
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- main content --}}
        <div class="row">

            {{-- side main --}}
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">

                    <h3 class="custom_blog_title" style="margin-bottom:0px">#Edit Profile</h3>
                    <br>

                    <div class="customer_login">
                        <div class="row">

                            <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">Edit profile</h5>
                                    <form action="{{ route('profile.update', $profile->id) }}" method="post" class="register">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">

                                        {{-- IF SOMETHING WRONG HAPPENED --}}
                                        @if ($errors->any())
                                            @alert(['type' => 'danger'])
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li> {{ $error }} </li>
                                                    @endforeach
                                                </ul>
                                            @endalert
                                        @endif

                                        <p class="form-row form-row-wide">
                                            <label class="text">NIK</label>
                                            <input type="text" name="nik" id="nik" class="input-text {{ $errors->has('nik') ? 'is-invalid':'' }}" value="{{ $profile->nik }}" style="width: 100%;">
                                        </p>

                                        @if($profile->no_member)
                                            <p class="form-row form-row-wide">
                                                <label class="text">No Member</label>
                                                <input type="text" name="no_member" id="no_member" class="input-text {{ $errors->has('no_member') ? 'is-invalid':'' }}" value="{{ $profile->no_member }}" style="width: 100%;" disabled>
                                            </p>
                                        @endif
                                        
                                        <p class="form-row form-row-wide">
                                            <label class="text">Nama</label>
                                            <input type="text" name="name" id="name" class="input-text {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $profile->name }}" style="width: 100%;">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Tanggal Lahir</label> 
                                            <input type="text" name="birthdate" id="birthdate" class="form-control {{ $errors->has('birthdate') ? 'is-invalid':'' }}" value="{{ $profile->birthdate }}" style="width: 100%;">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Jenis Kelamin</label> 
                                            <select name="gender" id="gender" class="form-control select2 {{ $errors->has('birthdate') ? 'is-invalid':'' }}" style="width: 100%;">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="PRIA" {{ $profile->gender == "PRIA" ? 'selected' : '' }} >PRIA</option>
                                                <option value="WANITA" {{ $profile->gender == "WANITA" ? 'selected' : '' }} >WANITA</option>
                                            </select>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Telepon</label> 
                                            <input type="text" name="phone" id="phone" class="input-text {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ $profile->phone }}" style="width: 100%;">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Email</label> 
                                            <input type="email" name="email" id="email" class="input-text {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ $profile->email }}" style="width: 100%;" disabled>
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">Ubah Password</label> 
                                            <input type="password" name="password" id="password" class="input-text {{ $errors->has('password') ? 'is-invalid':'' }}" placeholder="Isi untuk mengubah password" style="width: 100%;">
                                        </p>
                                        <p class="">
                                            <input type="submit" class="button-submit" value="Simpan data">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('#birthdate').datepicker({
            format: 'yyyy-mm-dd'
        });
        $(".select2").select2();
    </script>
@endsection