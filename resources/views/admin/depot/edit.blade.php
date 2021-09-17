@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman {{ $title }}</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ubah {{ $title }}</h6>
  </div>
  <div class="card-body">

    <a href="{{ url('admin/depot') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-3"><i class="fas fa-arrow-left fa-sm  mr-2"></i>Kembali</a>

    <form action="{{ url('admin/depot/' . $depot->id_depot . '/update') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="nama_depot">nama_depot</label>
        <input type="text" name="nama_depot" class="form-control" id="nama_depot" value="{{ $depot->nama_depot }}">
      </div>

      <div class="form-group">
        <label for="email_depot">Nama Pengmudi</label>
        <input type="text" name="email_depot" class="form-control" id="email_depot" value="{{ $depot->email_depot }}">
      </div>

      <div class="form-group">
        <label for="alamat_depot">Alamat Depot</label>
        <textarea class="form-control" name="alamat_depot" id="alamat_depot" rows="3">{{ $depot->alamat_depot }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Ubah Data</button>

    </form>


  </div>
</div>

@stop