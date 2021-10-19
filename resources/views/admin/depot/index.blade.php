@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman {{ $title }}</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
  </div>
  <div class="card-body">

    <div class="mb-3">
      <button type="button" data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm  mr-2"></i>Tambah Data</button>

      <a href="{{ url('admin/depot/cetak') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm  mr-2"></i>Cetak</a>



      <form action="" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="cari">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered text-center" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>No</th>
              <th>Nama Depot</th>
              <th>Alamat Depot</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($depot as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama_depot }}</td>
            <td>{{ $data->alamat_depot }}</td>
            <td>
              <a href="{{ url('admin/depot/' . $data->id_depot . '/edit') }}" class="text-warning"><i class="fas fa-pencil-alt"></i></a>
              <a href="{{ url('admin/depot/' . $data->id_depot . '/delete') }}" onclick="return confirm('Yakin Hapus Data?')" class="text-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4">Data Kosong</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
    {{ $depot->links() }}
  </div>
</div>


<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah {{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/depot/tambah') }}" method="POST">
        @csrf
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_depot">Nama Depot</label>
            <input type="text" name="nama_depot" class="form-control" id="nama_depot" placeholder="Masukan Nama Depot">
            <!-- Validation -->
            @if($errors->has('nama_depot'))
            <small class="text-danger">
              <strong>{{ $errors->first('nama_depot') }}</strong>
            </small>
            @endif
            <!-- Validation -->
          </div>

          <div class="form-group">
            <label for="email_depot">Email Depot</label>
            <input type="email" name="email_depot" class="form-control" id="email_depot" placeholder="Masukan Email">
            <!-- Validation -->
            @if($errors->has('email_depot'))
            <small class="text-danger">
              <strong>{{ $errors->first('email_depot') }}</strong>
            </small>
            @endif
            <!-- Validation -->
          </div>

          <div class="form-group">
            <label for="alamat_depot">Alamat Depot</label>
            <textarea class="form-control" name="alamat_depot" id="alamat_depot" rows="3" placeholder="Masukan Alamat"></textarea>
            <!-- Validation -->
            @if($errors->has('alamat_depot'))
            <small class="text-danger">
              <strong>{{ $errors->first('alamat_depot') }}</strong>
            </small>
            @endif
            <!-- Validation -->
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop