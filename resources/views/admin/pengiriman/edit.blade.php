@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman {{ $title }}</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit {{ $title }}</h6>
  </div>
  <div class="card-body">

    <div class="mb-3">
      <a href="{{ url('admin/pengajuan') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-arrow-left fa-sm  mr-2"></i>Kembali</a> 
    </div>

    <form action="{{ url('admin/pengajuan/' . $pengajuan->id_pengiriman . '/update') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="status">Status Pengajuan</label>
        <input type="text" id="status" name="status" class="form-control" value="{{ $pengajuan->status }}" readonly>
      </div>

      <div class="form-group">
        <label for="id_depot">Pilih Kelas</label>
        <select class="form-control" id="id_depot" disabled>
          @if ($depot)
          @foreach ($depot as $item)
              <option value="{{ $item->id_depot }}"
                {{ $pengajuan->id_depot == $item->id_depot ? 'selected' : '' }}>{{ $item->nama_depot }}</option>
            @endforeach
          @endif
        </select>
        <input type="hidden" name="id_depot" value="{{ $pengajuan->depot->id_depot }}">
      </div>

      <div class="form-group">
        <label for="rit">Jumlah Rit</label>
        <input type="number" id="rit" name="rit" class="form-control" value="{{ $pengajuan->rit }}">
      </div>

      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ $pengajuan->keterangan }}">
      </div>

      <button type="submit" class="btn btn-primary">Ubah Data</button>

    </form>

  </div>
</div>

@stop