@extends('backend.layout.app')
<style>
  body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #fafafa;
    font-family: system-ui;
  }

  * {
    box-sizing: border-box;
  }

  .page {
    width: 210mm;
    min-height: 297mm;
    padding: 20mm;
    margin: 10mm auto;
    border: 1px #d3d3d3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }

  @page {
    size: A4;
    margin: 0;
  }

  @media print {
    html, body {
      width: 210mm;
      height: 297mm;
    }

    .page {
      margin: 0;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
      page-break-after: always;
    }
  }

  .center {
    text-align: center;
  }

  h2 {
    font-size: 36px;
    font-weight: 500;
  }

  .header-img {
    width: 100px;
    height: 100px;
  }

  .invoice {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px; /* Ekstra boşluk eklendi */
  }

  .invoice-header {
    font-size: 24px;
  }

  .font-size-14 {
    font-size: 14px;
    line-height: 1.4;
  }

  .bold-text {
    font-weight: 800;
  }

  table.unstyledTable {
    width: 100%;
  }

  table {
    border-collapse: collapse;
    border-spacing: 0 5px;
    table-layout: fixed;
  }

  thead tr th {
    border-bottom: 2px solid #DCDCDC;
    font-weight: 800;
    text-align: left;
  }

  tbody tr {
    border-bottom: 1px solid #DCDCDC;
  }

  tbody tr td {
    padding: 8px;
    text-align: left;
  }

  .last-row {
    border: 0;
  }

  .footer {
    text-align: end;
  }

  .font-weight-400 {
    font-weight: 400;
  }

  .content {
    margin-top: 20px; /* Ekstra boşluk eklendi */
  }
</style>

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sipariş</h4>

                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <div class="page">
                <div class="subpage">
                    <h2 class="font-weight-400">{{ $invoice->name ?? '' }}</h2>
                </div>

                <div class="invoice">
                    <div class="invoice-from">
                        <p class="invoice-header">Order No</p>
                        <div class="font-size-14">
                          <p><strong>Order No:</strong> {{ $invoice->order_no ?? '' }}</p>
                          <p><strong>Email:</strong> {{ $invoice->email }}</p>
                          <p><strong>Phone:</strong> {{ $invoice->phone ?? '' }}</p>
                          <p><strong>Address:</strong> {{ $invoice->address }}</p>
                      </div>
                    </div>
                </div>

                <div class="content">
                    <h2 class="center font-weight-400">Invoice Information</h2>
                  
                    <table class="unstyledTable">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($invoice->orders))
                                @foreach ($invoice->orders as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['amount'] }}</td>
                                        <td>{{ $item['price'] }}$</td>
                                        <td>{{ $item['price'] }}$</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
