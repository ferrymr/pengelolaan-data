@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection

@section('content')

<!-- wrap main content -->
<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">

            <!-- breadcrumb -->
            <div class="col-md-6 col-md-offset-3 col-sm-12 breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="">
                            <span>
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            Profile
                        </span>
                    </li>
                </ul>
            </div>

            <!-- main content -->
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-12" style="margin-bottom: 3em;">
                            <form method="POST" action="{{ route('profile.update', $profile->id) }}">
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
                                <div class="col-12">
                                    <label class="text">NIK</label>
                                    <input type="text" name="nik" id="nik" class="input-text {{ $errors->has('nik') ? 'is-invalid':'' }}" value="{{ $profile->nik }}" style="width: 100%;">
                                </div>

                                @if($profile->no_member)
                                <div class="col-12">
                                    <label class="text">Nama</label>
                                    <input type="text" name="no_member" id="no_member" class="input-text {{ $errors->has('no_member') ? 'is-invalid':'' }}" value="{{ $profile->no_member }}" style="width: 100%;" disabled>
                                </div>
                                @endif

                                <div class="col-12">
                                    <label class="text">Nama</label>
                                    <input type="text" name="name" id="name" class="input-text {{ $errors->has('name') ? 'is-invalid':'' }}" value="{{ $profile->name }}" style="width: 100%;">
                                </div>
                                <div class="col-12">
                                    <label class="text">Tanggal Lahir</label> 
                                    <input type="date" name="birthdate" id="birthdate" class="form-control {{ $errors->has('birthdate') ? 'is-invalid':'' }}" value="{{ $profile->birthdate }}" style="width: 100%;">
                                </div>
                                <div class="col-12">
                                    <label class="text">Jenis Kelamin</label> 
                                    <select name="gender" id="gender" class="form-control {{ $errors->has('birthdate') ? 'is-invalid':'' }}" style="width: 100%;">
                                        <option value="">-- Pilih Salah Satu --</option>
                                        <option value="PRIA" {{ $profile->gender == "PRIA" ? 'selected' : '' }} >PRIA</option>
                                        <option value="WANITA" {{ $profile->gender == "WANITA" ? 'selected' : '' }} >WANITA</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="text">Telepon</label> 
                                    <input type="text" name="phone" id="phone" class="input-text {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ $profile->phone }}" style="width: 100%;">
                                </div>
                                <div class="col-12">
                                    <label class="text">Email</label> 
                                    <input type="email" name="email" id="email" class="input-text {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ $profile->email }}" style="width: 100%;" disabled>
                                </div>
                                <div class="col-12">
                                    <label class="text">Ubah Password</label> 
                                    <input type="password" name="password" id="password" class="input-text {{ $errors->has('password') ? 'is-invalid':'' }}" placeholder="Klik untuk mengubah password" style="width: 100%;">
                                </div>
                                <div class="text-left" style="margin-top: 2em;">
                                    <button type="submit" class="button">Save Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- full width layout have no sidebar-->

        </div>
    </main>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $('#birthdate').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
@endsection