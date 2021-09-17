@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman Detail {{ $title }}</h1>

<a href="{{ url('admin/pengajuan') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-3"><i class="fas fa-arrow-left fa-sm  mr-2"></i>Kembali</a>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail {{ $title }}</h6>
  </div>
  <div class="card-body">

    <div class="row justify-content-center">
      <ul class="list-group list-group-flush col-6 text-center">
        <li class="list-group-item">Nama Depot <br> <strong>{{ $detail_kirim->pengiriman->depot->nama_depot }}</strong></li>
        <li class="list-group-item">Jumlah Tarikan <br> <strong>{{ $detail_kirim->pengiriman->rit }} Rit</strong></li>
        <li class="list-group-item">Total Tarikan <br> <strong>{{ $detail_kirim->pengiriman->m3 }} m<sup>3</sup></strong></li>
        <li class="list-group-item">Status Pengiriman <br> <strong>{{ $detail_kirim->pengiriman->status }}</strong></li>
        <li class="list-group-item">Nama Pengemudi <br> <strong>{{ $detail_kirim->pengemudi->nama_pengemudi }}</strong></li>
        <li class="list-group-item">Tujuan Pengiriman <br> <strong>{{ $detail_kirim->pengiriman->depot->alamat_depot }}</strong></li>
        <li class="list-group-item">Tanggal Pengiriman <br> <strong>{{ $detail_kirim->updated_at->format('D, d M Y') }}</strong></li>
      </ul>
    </div>

  </div>
</div>

@stop