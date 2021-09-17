@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman {{ $title }}</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ubah {{ $title }}</h6>
  </div>
  <div class="card-body">

    <a href="{{ url('admin/pengemudi') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-3"><i class="fas fa-arrow-left fa-sm  mr-2"></i>Kembali</a>

    <form action="{{ url('admin/pengemudi/' . $pengemudi->id_pengemudi . '/update') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" name="nip" class="form-control" id="nip" value="{{ $pengemudi->nip }}">
      </div>

      <div class="form-group">
        <label for="nama_pengemudi">Nama Pengmudi</label>
        <input type="text" name="nama_pengemudi" class="form-control" id="nama_pengemudi" value="{{ $pengemudi->nama_pengemudi }}">
      </div>

      <div class="form-group">
        <label for="no_kendaraan">Nomor Kendaraan</label>
        <input type="text" name="no_kendaraan" class="form-control" id="no_kendaraan" value="{{ $pengemudi->no_kendaraan }}">
      </div>

      <div class="form-group">
        <label for="alamat">Alamat Pengemudi</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $pengemudi->alamat }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Ubah Data</button>

    </form>

  </div>
</div>

@stop