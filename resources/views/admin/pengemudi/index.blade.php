@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman Data Pengemudi</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
  </div>
  <div class="card-body">

    <div class="mb-3">
      <button type="button" data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm  mr-2"></i>Tambah Data</button> 

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
              <th>Nip</th>
              <th>Nama Pengemudi</th>
              <th>Nomor Kendaraan</th>
              <th>Alamat</th>
              <th><i class="fas fa-cog"></i></th>
            </tr>
        </thead>
        <tbody>
        @forelse ($pengemudi as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nip }}</td>
            <td>{{ $data->nama_pengemudi }}</td>
            <td>{{ $data->no_kendaraan }}</td>
            <td>{{ $data->alamat }}</td>
            <td>
              <a href="{{ url('admin/pengemudi/' . $data->id_pengemudi . '/edit') }}" class="text-warning"><i class="fas fa-pencil-alt"></i></a>
              <a href="{{ url('admin/pengemudi/' . $data->id_pengemudi . '/delete') }}" onclick="return confirm('Yakin Hapus Data?')" class="text-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5">Data Kosong</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
    {{ $pengemudi->links() }}
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
      <form action="{{ url('admin/pengemudi/tambah') }}" method="POST">
        @csrf
        <div class="modal-body">
          {{-- Form --}}
          <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukan NIP">
            <!-- Validation -->
            @if($errors->has('nip'))
            <small class="text-danger">
              <strong>{{ $errors->first('nip') }}</strong>
            </small>
            @endif
            <!-- Validation -->
          </div>

          <div class="form-group">
            <label for="nama_pengemudi">Nama Pengmudi</label>
            <input type="text" name="nama_pengemudi" class="form-control" id="nama_pengemudi" placeholder="Masukan Nama Pengemudi">
            <!-- Validation -->
            @if($errors->has('nama_pengemudi'))
            <small class="text-danger">
              <strong>{{ $errors->first('nama_pengemudi') }}</strong>
            </small>
            @endif
            <!-- Validation -->
          </div>

          <div class="form-group">
            <label for="no_kendaraan">Nomor Kendaraan</label>
            <input type="text" name="no_kendaraan" class="form-control" id="no_kendaraan" placeholder="Masukan Nomor Kendaraan">
            <!-- Validation -->
            @if($errors->has('no_kendaraan'))
            <small class="text-danger">
              <strong>{{ $errors->first('no_kendaraan') }}</strong>
            </small>
            @endif
            <!-- Validation -->
          </div>

          <div class="form-group">
            <label for="alamat">Alamat Pengemudi</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
            <!-- Validation -->
            @if($errors->has('alamat'))
            <small class="text-danger">
              <strong>{{ $errors->first('alamat') }}</strong>
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