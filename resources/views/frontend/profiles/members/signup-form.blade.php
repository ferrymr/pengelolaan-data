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

                    {{-- konfirmasi pembayaran member --}}
                    @if($checkDaftarMember)
                        @if($checkKonfirmasiPendaftaranMember == false)
                            <p>
                                Anda sudah mengajukan pendaftaran sebagai <b>member</b>, silahkan lakukan pembayaran,
                                kemudian konfirmasi disini
                            </p>
                            <button class="btn btn-success"
                                    data-toggle="modal" 
                                    data-target="#konfirmasi">
                                Konfirmasi Pembayaran <b>member</b>
                            </button>
                        @else
                            <button class="btn btn-default">
                                Terimakasih sudah melakukan pendaftaran & konfirmasi Pembayaran Member
                            </button>
                        @endif
                        <br>
                        <hr>
                        <br>

                        {{-- modal konfirmasi pembayaran member --}}
                        <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasiPembayaran" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form class="register" action="{{ route('member.konfirmasi') }}" method="post" enctype="multipart/form-data">
                                    
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="modal-title" id="konfirmasiPembayaran">Konfirmasi Pembayaran Member</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            
                                                @csrf

                                                {{-- print error --}}
                                                @if ($errors->any())
                                                    <x-alert type="danger" :message="$errors"/>
                                                @endif

                                                <input type="hidden" name="jenis" value="member">

                                                <p class="form-row form-row-wide">
                                                    <label class="text" style="width: 100%;">Bayar ke rekening <span style="color:red">*</span></label> 
                                                    <select name="bank" tabindex="1" class="input-text select2" style="width: 50%;">
                                                        <option value="" selected="selected">Pilih Bank</option>
                                                        @foreach ($banks as $bank)
                                                            <option value="{{ $bank }}">{{ $bank }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('bank') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label class="text" style="width: 100%;">Nomor rekening pengirim <span style="color:red">*</span></label> 
                                                    <input style="width:70%" 
                                                            type="number" 
                                                            id="rekening_number" 
                                                            name="rekening_number" 
                                                            class="input-text {{ $errors->has('rekening_number') ? 'is-invalid':'' }}" 
                                                            value="{{ old('rekening_number') }}" 
                                                            required>
                                                    @error('rekening_number') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Nama rekening pengirim <span style="color:red">*</span></label> 
                                                    <input style="width:100%" 
                                                            type="text" 
                                                            id="rekening_name" 
                                                            name="rekening_name" 
                                                            class="input-text {{ $errors->has('rekening_name') ? 'is-invalid':'' }}" 
                                                            value="{{ old('rekening_name') }}" 
                                                            required>
                                                    @error('rekening_name') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Upload bukti pengiriman <span style="color:red">*</span></label> 
                                                    <input style="width:100%" 
                                                            type="file" 
                                                            id="filename" 
                                                            name="filename" 
                                                            class="input-text {{ $errors->has('filename') ? 'is-invalid':'' }}" 
                                                            value="{{ old('filename') }}" 
                                                            required>
                                                    @error('filename') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-submit">
                                                Confirm
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif

                    {{-- konfirmasi pembayaran reseller --}}
                    @if($checkDaftarReseller)
                        @if($checkKonfirmasiPendaftaranReseller == false)
                            <p>
                                Anda sudah mengajukan pendaftaran sebagai <b>Reseller</b>, silahkan lakukan pembayaran,
                                kemudian konfirmasi disini
                            </p>
                            <button class="btn btn-success"
                                    data-toggle="modal" 
                                    data-target="#konfirmasiReseller">
                                Konfirmasi Pembayaran <b>Reseller</b>
                            </button>
                        @else
                            <button class="btn btn-default">
                                Terimakasih sudah melakukan pendaftaran & konfirmasi Pembayaran Reseller
                            </button>
                        @endif                        
                        <br>
                        <hr>
                        <br>

                        {{-- modal konfirmasi pembayaran reseller --}}
                        <div class="modal fade" id="konfirmasiReseller" tabindex="-1" role="dialog" aria-labelledby="konfirmasiPembayaran Reseller" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form class="register" action="{{ route('member.konfirmasi') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="modal-title" id="konfirmasiPembayaran Reseller">Konfirmasi Pembayaran Reseller</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            
                                                {{-- print error --}}
                                                @if ($errors->any())
                                                    <x-alert type="danger" :message="$errors"/>
                                                @endif

                                                <input type="hidden" name="jenis" value="reseller">

                                                <p class="form-row form-row-wide">
                                                    <label class="text" style="width: 100%;">Bayar ke rekening <span style="color:red">*</span></label> 
                                                    <select name="bank" tabindex="1" class="input-text select2" style="width: 50%;">
                                                        <option value="" selected="selected">Pilih Bank</option>
                                                        @foreach ($banks as $bank)
                                                            <option value="{{ $bank }}">{{ $bank }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('bank') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label class="text" style="width: 100%;">Nomor rekening pengirim <span style="color:red">*</span></label> 
                                                    <input style="width:70%" 
                                                            type="number" 
                                                            id="rekening_number" 
                                                            name="rekening_number" 
                                                            class="input-text {{ $errors->has('rekening_number') ? 'is-invalid':'' }}" 
                                                            value="{{ old('rekening_number') }}" 
                                                            required>
                                                    @error('rekening_number') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Nama rekening pengirim <span style="color:red">*</span></label> 
                                                    <input style="width:100%" 
                                                            type="text" 
                                                            id="rekening_name" 
                                                            name="rekening_name" 
                                                            class="input-text {{ $errors->has('rekening_name') ? 'is-invalid':'' }}" 
                                                            value="{{ old('rekening_name') }}" 
                                                            required>
                                                    @error('rekening_name') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label class="text">Upload bukti pengiriman <span style="color:red">*</span></label> 
                                                    <input style="width:100%" 
                                                            type="file" 
                                                            id="filename" 
                                                            name="filename" 
                                                            class="input-text {{ $errors->has('filename') ? 'is-invalid':'' }}" 
                                                            value="{{ old('filename') }}" 
                                                            required>
                                                    @error('filename') <span class="error">{{ $message }}</span> @enderror
                                                </p>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-submit">
                                                Confirm
                                            </button>
                                        </div>
                                    
                                    </div>

                                </form>
                            </div>
                        </div>
                    @endif

                    @if($checkDaftarMember && $checkDaftarReseller )
                    
                    @else
                        @if(!$checkDaftarReseller )
                            <br>
                            <div class="customer_login">
                                <div class="row">

                                    <div class="col-md-offset-2 col-lg-8 col-md-8 col-sm-12">
                                        <div class="login-item">
                                            <h5 class="title-login">Daftar menjadi member / reseller</h5>

                                            <form action="{{ route('member.store')}}" method="post" class="register">
                                                @csrf

                                                {{-- print error --}}
                                                @if ($errors->any())
                                                    <x-alert type="danger" :message="$errors"/>
                                                @endif

                                                <p class="form-row form-row-wide" id="block-jenis">
                                                    <label for="jenis">Jenis Member <span style="color:red">*</span></label>
                                                    <select class="form-control" id="jenis" name="jenis" {{ $errors->has('jenis') ? 'is-invalid':'' }}" required>
                                                        <option value="" selected>Pilih jenis member</option>
                                                        @if(!$checkDaftarMember || $checkDaftarReseller)
                                                            @if( !$user->hasRole('member') )
                                                                <option value="member">Member</option>
                                                            @endif
                                                        @endif
                                                        @if(!$checkDaftarReseller)
                                                            @if( !$user->hasRole('reseller') )
                                                                <option value="reseller">Reseller</option>
                                                            @endif
                                                        @endif
                                                    </select>
                                                </p>

                                                <p class="form-row form-row-wide" id="syarat-member" style="display: none;">
                                                    * Lakukan pembelian <b>minimal 1 produk untuk menjadi member</b> &  <br>
                                                    * Pembelian <b>10.000 rupiah untuk katalog</b>
                                                </p>
                                                <p class="form-row form-row-wide" id="syarat-reseller" style="display: none;">
                                                    * Daftar Reseller senilai <b>500ribu, gratis 1 produk series</b>
                                                </p>
                                                <div id="transaksi-member" style="display: none;">
                                                    <p class="form-row form-row-wide" id="block-tb_head_jual_id">
                                                        <label for="tb_head_jual_id">Transaksi yang sudah dilakukan <span style="color:red">*</span></label>
                                                        <select class="form-control" id="tb_head_jual_id" name="tb_head_jual_id" {{ $errors->has('tb_head_jual_id') ? 'is-invalid':'' }}">
                                                            <option value="" selected>Pilih transaksi</option>                                                    
                                                            @foreach($transactions as $row)
                                                                <option value="{{ $row->id }}">{{ $row->no_do . ' - ' . $row->tanggal }}</option>
                                                            @endforeach
                                                        </select>
                                                    </p>
                                                </div>

                                                <p class="form-row form-row-wide" id="block-bank">
                                                    <label for="bank">Transfer biaya pendaftaran ke: <span style="color:red">*</span></label>
                                                    <select class="form-control" id="bank" name="bank" {{ $errors->has('bank') ? 'is-invalid':'' }}" required>
                                                        <option value="" selected>Pilih bank</option>
                                                        @foreach($banks as $bank)
                                                            <option value="{{ $bank }}">{{ $bank }}</option>
                                                        @endforeach
                                                    </select>
                                                </p>

                                                <p class="">
                                                    <input type="submit" class="button-submit" value="Ajukan menjadi Member / Reseller">
                                                </p>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

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
                $("#transaksi-member").show();
                $("#transaksi-reseller").hide();
            } else if(jenis != "" && jenis == "reseller") {
                $("#syarat-reseller").show();
                $("#syarat-member").hide();
                $("#transaksi-member").hide();
                $("#transaksi-reseller").show();
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