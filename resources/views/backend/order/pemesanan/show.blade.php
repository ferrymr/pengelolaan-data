@extends('adminlte::page')

@section('title', 'Pemesanan')

@section('content_header')
    <div class="row">
        <div class="col-6">
            <h1>Invoice</h1>
        </div>
    </div>
@stop

@section('content')
    @include('flash::message')

    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fas fa-globe"></i> Bellezkin Shop
              <small class="float-right">Date: {{ $data->tanggal }}</small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            Alamat toko / stockist:
            <address>
              <strong>{{ $data->spb->name }}</strong><br>
              {{ $data->spb->city_name }}<br>
              {{ $data->spb->subdistrict_name }}<br>
              Phone: {{ $data->spb->phone }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            Alamat pemesan:
            <address>
              <strong>{{ $data->address->nama }}</strong><br>
              {{ $data->address->alamat }}<br>
              {{ $data->address->kota_nama }},
              {{ $data->address->kecamatan_nama }}, 
              {{ $data->address->provinsi_nama }}<br>
              Phone: {{ $data->address->telepon}}<br>
              Email:  {{ $data->user->email }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice: {{ $data->no_do }}</b><br>
            <br>
            <b>Order ID: </b> {{ $data->id }}<br>
            <b>Payment Due: </b> {{ $data->tanggal }}<br>
            {{-- <b>Account:</b> 968-34567 --}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  <th>Kode Product</th>
                  <th>Harga Satuan</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data->items as $item)
                  <tr>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->itemDetailHas->nama }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>@currency($item->harga)</td>
                    <td>@currency($item->total)</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            <p class="lead">Metode Pembayaran</p>
            <button class="btn btn-default">
              Bank Transfer to <b>{{ $data->bank }}</b>
            </button><br><br>
            <button class="btn btn-warning">
              Status Pemesanan: <b>{{ $data->status_transaksi }}</b>
            </button>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="lead">Tanggal Pembayaran {{ $data->tanggal }}</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Jumlah Barang:</th>
                  <td>{{ $data->detjual->jumlah }}</td>
                </tr>
                <tr>
                  <th>Biaya Pengiriman:</th>
                  <td>@currency($data->shipping_fee) / {{ $data->kurir }}</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>@currency($data->grand_total)</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <hr>
        <div class="row">
            <div class="col-md-12">
              @if(
                $data->status_transaksi == "SHIPPED" 
              )
                <a href="{{ route('admin.pemesanan.index') }}" target="" class="btn btn-default float-left">
                  Back
                </a>
              @else
                {!! Form::open([
                  'url' => route('admin.pemesanan.update-status', $data->id),
                  'method'=>'POST',
                  'class'=>'form-horizontal',
                  'id'=>'form-update-status'
                ]) !!}
                  <div class="form-group col-md-6 float-right">
                      <label for="status_transaksi" class="col-sm-9 control-label">Update Status: </label>    
                      <div class="col-sm-9">
                          <select name="status_transaksi" class="form-control select2 jenis-bayar" id="status_transaksi">
                              <option value="" selected>Pilih status</option>
                              @if(
                                $data->status_transaksi != "PAYMENT CONFIRMED" &&
                                $data->status_transaksi != "PACKED" &&
                                $data->status_transaksi != "SHIPPED" &&
                                $data->status_transaksi != "RECEIVED"
                              )
                                <option value="PAYMENT CONFIRMED">PAYMENT CONFIRMED</option>
                              @endif
                              @if(
                                $data->status_transaksi != "PACKED" &&
                                $data->status_transaksi != "SHIPPED" &&
                                $data->status_transaksi != "RECEIVED"
                              )
                                <option value="PACKED">PACKED</option>
                              @endif
                              @if(
                                $data->status_transaksi != "SHIPPED" &&
                                $data->status_transaksi != "RECEIVED"
                              )
                                <option value="SHIPPED">SHIPPED</option>
                              @endif
                              {{-- <option value="RECEIVED">RECEIVED</option> --}}
                          </select>
                          <br>
                          <input type="text" name="input_resi" class="form-control" id="input_resi" placeholder="Input Resi" style="display:none;">
                          <br>
                          <button type="submit" class="btn btn-success" style="margin-left: 10px;">
                            Update status pemesanan
                          </button>
                          <a href="{{ route('admin.pemesanan.index') }}" target="" class="btn btn-default float-left">
                            Back
                          </a>
                      </div>
                  </div>
                {!! Form::close() !!}
              @endif
            </div>
        </div>

      </div>
@stop

@section('css')

@stop

@section('js')
    
    <script type="text/javascript">
    // select2
    $('.select2').select2();

    $(document).ready(function() {
      $("#status_transaksi").change(function() {
        let status_transaksi = $(this).val();

        if(status_transaksi == "SHIPPED") {
          $('#input_resi').show();
        } else {
          $('#input_resi').hide();
        }
      });
    });

    </script>
@stop