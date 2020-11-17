@extends('adminlte::page')

@section('title', 'Pembelian')

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
            Alamat Supplier:
            <address>
              <strong>{{ $data->supplier->nama }}</strong><br>
              {{ $data->supplier->alamat }}<br>
              {{ $data->supplier->kota }}<br>
              Phone: {{ $data->supplier->telp }}<br>
              Email: {{ $data->supplier->email }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice: {{ $data->no_po }}</b><br>
            <b>Payment Due: </b> {{ $data->tanggal }}<br>
          </div>
          <!-- /.col -->
        </div>
        <br>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Qty</th>
                  <th>Kode Product</th>
                  <th>Jenis</th>
                  <th>Harga Satuan</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data->items as $item)
                  <tr>
                    <td>{{ $data->detBeli->jumlah }}</td>
                    <td>{{ $data->detBeli->kode_barang }}</td>
                    <td>{{ $data->detBeli->jenis }}</td>
                    <td>@currency($data->detBeli->harga)</td>
                    <td>@currency($data->detBeli->total)</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <hr>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group col-md-6 float-right">
              <p class="lead">Tanggal Pembayaran {{ $data->tanggal }}</p>
  
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Jumlah Barang:</th>
                    <td>{{ $data->detBeli->jumlah }}</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>@currency($data->sub_total)</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      <hr>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('admin.pembelian.index') }}" target="" class="btn btn-default float-right">
            Back
          </a>
        </div>
      </div>
    </div>
@stop

@section('css')

@stop