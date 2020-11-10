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
            font-size: 40px;
            font-weight: bold;
        }

        .s15 {
            font-size: 30px;
            font-weight: bold;
        }

        .s10 {
            font-size: 20px;
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
                                    {{ $data->spb->name }}<br>
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
                                    {{ $data->no_do }}<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    {{ $data->tanggal }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $data->user->no_member }}<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    {{ $data->user->name }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    TRF<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    {{ $data->bank }}<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    <hr>
                    @foreach($data->items as $item)
                    <table width="100%">
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $item->kode_barang }}<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    {{ $item->itemDetailHas->nama }}<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    {{ $item->jumlah }}<br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    @currency($item->harga)<br>
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-left">
                                <span class="times-new-roman s15">
                                    <br>
                                </span>
                            </th>
                            <th class="text-right">
                                <span class="times-new-roman s15">
                                    {{ $data->detjual->promo }}%<br>
                                </span>
                            </th>
                        </tr>
                    </table>
                    @endforeach
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
                                <th class="text-right">
                                    <span class="times-new-roman s15">
                                        @currency($data->grand_total)<br>
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
                                    {{ $data->note }}<br>
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
                    <br>
                    <br>
                    <br>
                </th>
            </tr>
        </thead>
    </table>
</body>
</html>