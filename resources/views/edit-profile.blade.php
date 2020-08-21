@extends('layouts.without-banner')

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
                            <div class="col-12">
                                <label class="text">Nama</label>
                                <input type="text" id="name" class="input-text" style="width: 100%;">
                            </div>
                            <div class="col-12">
                                <label class="text">Tanggal Lahir</label> 
                                <input type="date" id="birthdate" class="form-control" style="width: 100%;">
                            </div>
                            <div class="col-12">
                                <label class="text">Telepon</label> 
                                <input type="text" id="phone" class="input-text" style="width: 100%;">
                            </div>
                            <div class="col-12">
                                <label class="text">Email</label> 
                                <input type="email" id="email" class="input-text" style="width: 100%;">
                            </div>
                            <div class="text-left" style="margin-top: 2em;">
                                <button class="button">Save Profile</button>
                            </div>
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