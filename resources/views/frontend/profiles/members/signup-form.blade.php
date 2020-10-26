@extends('layouts.app')

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
                        <li class="trail-item trail-end active">Daftar sebagai member / reseller</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- main content --}}
        <div class="row">

            {{-- side main --}}
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">

                    <h3 class="custom_blog_title" style="margin-bottom:0px">#Daftar</h3>
                    <br>
                    <p>
                        Syarat menjadi member / reseller bisa di lihat di sini 
                        <a href="http://reseller-skincare.bellezkin.com/" target="_blank">reseller-skincare.bellezkin.com</a>
                    </p>
                    <br>

                    <div class="customer_login">
                        <div class="row">

                            <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">Daftar menjadi member / reseller</h5>
                                    <form action="{{ route('address.store')}}" method="post" class="register">
                                        @csrf

                                        {{-- print error --}}
                                        @if ($errors->any())
                                            <x-alert type="danger" :message="$errors"/>
                                        @endif

                                        <p class="form-row form-row-wide" id="block-jenis">
                                            <label for="jenis">Jenis Member <span style="color:red">*</span></label>
                                            <select class="form-control" id="jenis" name="jenis" {{ $errors->has('jenis') ? 'is-invalid':'' }}" required>
                                                <option value="" selected>Pilih jenis member</option>
                                                <option value="member">Member</option>
                                                <option value="reseller">Reseller</option>
                                            </select>
                                        </p>

                                        <p class="form-row form-row-wide" id="syarat-member" style="display: none;">
                                            * Lakukan pembelian <b>minimal 1 produk untuk menjadi member</b> &  <br>
                                            * Lakukan transfer <b>10.000 rupiah untuk pendaftaran</b>
                                        </p>
                                        <p class="form-row form-row-wide" id="syarat-reseller" style="display: none;">
                                            * Lakukan pembelian <b>minimal 1 produk series untuk menjadi reseller</b> &  <br>
                                            * Lakukan transfer <b>150.000 rupiah untuk pendaftaran</b>
                                        </p>
                                        
                                        <div id="transaksi" style="display: none;">
                                            <p class="form-row form-row-wide" id="block-jenis">
                                                <label for="jenis">Transaksi yang sudah dilakukan <span style="color:red">*</span></label>
                                                <select class="form-control" id="jenis" name="jenis" {{ $errors->has('jenis') ? 'is-invalid':'' }}" required>
                                                    <option value="" selected>Pilih transaksi</option>
                                                </select>
                                            </p>
                                            <p class="form-row form-row-wide" id="block-jenis">
                                                <label for="jenis">Transfer biaya pendaftaran ke: <span style="color:red">*</span></label>
                                                <select class="form-control" id="jenis" name="jenis" {{ $errors->has('jenis') ? 'is-invalid':'' }}" required>
                                                    <option value="" selected>Pilih bank</option>
                                                    @foreach($banks as $bank)
                                                        <option value="{{ $bank }}">{{ $bank }}</option>
                                                    @endforeach
                                                </select>
                                            </p>
                                            <p class="">
                                                <input type="submit" class="button-submit" value="Ajukan menjadi Member / Reseller">
                                            </p>
                                        </div>

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
    <script>
        function checkJenis() {
            $("#loading").show();

            let jenis = $('#jenis').val();

            if(jenis != "" && jenis == "member") {
                $("#syarat-reseller").hide();
                $("#syarat-member").show();
                $("#transaksi").show();
            } else if(jenis != "" && jenis == "reseller") {
                $("#syarat-reseller").show();
                $("#syarat-member").hide();
                $("#transaksi").show();
            }
            
            $("#loading").hide();

            // $.ajax({
            //     url: '{{ env('APP_API_URL') }}cities/' + $(this).val(),
            //     type: 'GET',
            //     crossDomain: true,
            //     dataType: 'json',
            //     success: function(result) {
            //         var select = $('select[name=kota]');
            //         select.empty();

            //         // show kota
            //         $("#block-kota").show();
            //         select.append('<option selected disabled>Pilih Kota</option>');

            //         $.each(result.data,function(key, value) {
            //             select.append('<option value=' + value.city_id + '>' + value.city_name + '</option>');
            //         });

            //         $("#loading").hide();
            //     }
            // });
        }

        $(document).ready(function() {

            // activate select2
            $(".select2").select2();

            checkJenis()

            $('#jenis').change(function() {
                checkJenis()
            });

        });
    </script>
@endsection