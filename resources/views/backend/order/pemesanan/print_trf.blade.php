<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @media print {
            @page {
                width: 8.27in;
                height: 11.01in;
            }
        }

        html,
        body {
            width: 7.3in;
            height: 11.69in;
            margin: 0;
        }

        html {
            margin-left: 50px;
            margin-right: auto;
            background: gray;
        }

        body {
            background: white;
            box-sizing: border-box;
            padding-left: 0.13in;
            padding-right: 0.13in;
            padding-top: 0.34in;
            padding-bottom: 0.34in;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .times-new-roman {
            font-family: 'Arial', Times, serif;
        }

        .s20 {
            font-size: 30px;
            font-weight: bold;
        }

        .s15 {
            font-size: 15px;
            font-weight: bold;
        }

        .s10 {
            font-size: 10px;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .padding-right {
            padding-right: 300px;
        }
    
    </style>
</head>
<body style="padding-left: 10px;">
    <table style="width=80%">
        
        <thead>
            <tr>
                <th>
                    <table width="100%" class="text-center">
                        <tr>
                            <th>
                                <span class="times-new-roman s20">BELLEZKIN</span>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <span class="times-new-roman s15">
                                    SALES INVOICE<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <hr>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    SP002<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    CS001<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table widt="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    DR001002171234567<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    DR001<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->no_do }}<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                   {{$headJual->tanggal}}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->no_member }}<br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->nama }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->bayar }}<br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->cc }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->detjual->kode_barang }}<br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                         {{ $headJual->detjual->nama }}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->detjual->jumlah }}<br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                        {{ $headJual->detjual->harga }}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->detjual->promo }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                         {{ $headJual->kurir }}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                        {{ $headJual->shipping_fee }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    SUB<br>
                                </span>
                            </th>
                            <tr>
                                <th class="text-left">
                                    <span class="times-new-roman s15">
                                        TOTAL<br>
                                    </span>
                                </th>
                                <th class="padding-right text-left">
                                    <span class="times-new-roman s15">
                                        {{ $headJual->grand_total }}<br>
                                    </span>
                                </th>
                            </tr>
                        </tr>
                    </table>
                    <hr>
                    <hr>
                    <table width="100%">
                        <th>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->note }}<br>
                                </span>
                            </th>
                        </th>
                    </table>
                    <hr>
                    <hr>
                    <table width="100%" class="text-center">
                        <tr>
                            <th>
                                <span class="times-new-roman s10">Terima kasih, semoga produk Bellezkin selalu cocok untuk kulit cantik Anda</span>
                            </th>
                        </tr>
                    </table>
                    <hr>
                </th>
            </tr>
        </thead>
        
    </table>

    <table style="width=80%">
        <thead>
            <tr>
                <th>
                    <table width="100%" class="text-center">
                        <tr>
                            <th>
                                <span class="times-new-roman s20">BELLEZKIN</span>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <span class="times-new-roman s15">
                                    SHIPPING LABEL<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <hr>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->no_do}}<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                          {{ $headJual->kurir }}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    KOSMETIK<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                        {{ $headJual->total_berat }} kg<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    FROM<br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                        NUNI NURENDAH SARI<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                        0821 7862 1234<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    TO<br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                        {{ $headJual->address->nama }}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->address->telepon}}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->address->alamat}}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                   {{ $headJual->address->kecamatan_nama }}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                    {{ $headJual->address->kode_pos }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                           <th class="text-left">
                               <span class="times-new-roman s15">
                                   <br>
                               </span>
                           </th>
                           <th class="padding-right text-left">
                               <span class="times-new-roman s15">
                                {{ $headJual->address->kota_nama }}<br>
                               </span>
                           </th>
                       </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                           <th class="text-left">
                               <span class="times-new-roman s15">
                                   <br>
                               </span>
                           </th>
                           <th class="padding-right text-left">
                               <span class="times-new-roman s15">
                                {{ $headJual->address->provinsi_nama }}<br>
                               </span>
                           </th>
                       </tr>
                   </table>
                    <hr>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    NOTE<br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                       {{ $headJual->note }}<br>
                                </span>
                            </th>
                        </tr>
                        {{-- <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                        Al-Hidayah - Ada di rumah diatas<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="padding-right text-left">
                                <span class="times-new-roman s15">
                                        Jam 17.20<br>
                                </span>
                            </th>
                        </tr> --}}
                    </table>
                    <hr>
                    <hr>
                </th>
            </tr>
        </thead>  
    </table>
</body>
</html>