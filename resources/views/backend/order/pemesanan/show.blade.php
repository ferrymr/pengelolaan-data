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
              <i class="fas fa-globe"></i> Bellezkin
              <small class="float-right">Date: {{ $data->tanggal }}</small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Admin, Inc.</strong><br>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              Phone: (804) 123-5432<br>
              Email: info@almasaeedstudio.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong>{{ $->address->nama }}</strong><br>
              {{ $data->address->alamat }}<br>
              {{ $data->address->kota_nama }}<br>
              {{ $data->address->kecamatan_nama }}<br>
              {{ $data->address->provinsi_nama }}<br>
              Phone: {{ $data->address->telepon}}<br>
              Email:  {{ $data->user->email }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice {{ $data->no_do }}</b><br>
            <br>
            <b>Order ID:</b> {{ $data->id }}<br>
            <b>Payment Due:</b> {{ $data->tanggal }}<br>
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
              <tr>
                <td>{{ $data->detjual->jumlah }}</td>
                <td>{{ $data->detjual->nama }}</td>
                <td>{{ $data->detjual->kode_barang }}</td>
                <td>{{ $data->detjual->harga }}</td>
                <td>{{ $data->detjual->total }}</td>
              </tr>
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
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
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
                  <td>{{ $data->shipping_fee }}</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>{{ $data->sub_total }}</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        {{-- <div class="row no-print">
          <div class="col-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
              Payment
            </button>
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
              <i class="fas fa-download"></i> Generate PDF
            </button>
          </div>
        </div> --}}
      </div>
      <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.pemesanan.index') }}" target="" class="btn btn-default float-right"><i></i> Cancel</a>
            <div class="form-group col-md-4 @if($errors->has('status_transaksi')) has-error @endif">
                <label for="status_transaksi" class="col-sm-9 control-label">Update Status *</label>    
                <div class="col-sm-9">
                    <select name="status_transaksi" id="" class="form-control select2 jenis-bayar">
                        <option value="">Pilih Status Pembayaran</option>
                        <option value="">Menunggu Pembayaran</option>
                        <option value="">Sedang Diproses</option>
                        <option value="">Sedang Dikirim</option>
                        <option value="">Selesai</option>
                    </select>
                    @if($errors->has('status_transaksi'))
                        <span class="text-danger">{{ $errors->first('status_transaksi') }}</span>
                    @endif
                </div>
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

    </script>
@stop