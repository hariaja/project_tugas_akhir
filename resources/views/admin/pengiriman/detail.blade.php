@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman Detail {{ $title }}</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail {{ $title }}</h6>
  </div>
  <div class="card-body">

    <form action="{{ url('admin/pengiriman/' . $kirim->id_pengiriman . '/proses') }}" method="POST">
      @csrf

      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="nama_depot">Depot Yang Mengajukan</label>
            <input type="text" id="nama_depot" class="form-control" value="{{ $kirim->depot->nama_depot }}" disabled>
            <input type="hidden" name="id_depot" value="{{ $kirim->id_depot }}">
          </div>
        </div>

        <div class="col-6">
          <div class="form-group">
            <label for="rit">Jumlah Rit Yang Diajukan</label>
            <input type="text" id="rit" class="form-control" value="{{ $kirim->rit }}" readonly>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="m3">Jumlah M<sup>3</sup> Yang Diajukan</label>
            <input type="text" id="m3" class="form-control" value="{{ $kirim->m3 }}" readonly>
          </div>
        </div>

        <div class="col-6">
          <div class="form-group">
            <label for="keterangan">Keterangan Pengajuan</label>
            <input type="text" id="keterangan" class="form-control" value="{{ $kirim->keterangan }}" readonly>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="id_pengemudi">Pilih Pengemudi</label>
        <select class="form-control" id="id_pengemudi" name="id_pengemudi">
          @if ($pengemudi)
            @foreach ($pengemudi as $item)
              <option value="{{ $item->id_pengemudi }}">{{ $item->nama_pengemudi }}</option>
            @endforeach
          @endif
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>

    </form>

  </div>
</div>

@stop