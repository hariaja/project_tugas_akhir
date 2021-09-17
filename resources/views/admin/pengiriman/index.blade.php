@extends('admin.layouts.main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Halaman {{ $title }}</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail {{ $title }}</h6>
  </div>
  <div class="card-body">

    <div class="mb-3">
      @if (Auth::user()->level == 'depot')
        <button type="button" data-toggle="modal" data-target="#staticBackdrop" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm  mr-2"></i>Buat Pengajuan</button> 
      @endif
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
              <th>Rit</th>
              <th>M<sup>3</sup></th>
              <th>Tujuan</th>
              <th>Keterangan</th>
              @if (Auth::user()->level === 'admin')
                <th>Status</th>
              @else
                <th><i class="fas fa-cog"></i></th>
              @endif
            </tr>
        </thead>
        <tbody>
        @forelse ($pengiriman as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->depot->nama_depot }}</td>
            <td>{{ $data->rit }}</td>
            <td>{{ $data->m3 }}</td>
            <td>{{ $data->depot->alamat_depot }}</td>
            <td>{{ $data->keterangan }}</td>

            @if (Auth::user()->level === 'admin')

              @if ($data->status === 'Proses')
                <td>
                  <a href="{{ url('admin/pengiriman/' . $data->id_pengiriman . '/kirim') }}" class="badge p-2 badge-warning" onclick="return confirm('Lakukan Pengiriman?')">{{ $data->status }}</a>
                </td>
              @elseif ($data->status === 'Dalam Pengiriman')
                <td>
                  <span class="badge badge-success p-2">{{ $data->status }}</span>
                </td>
              @endif

            @else

                @if ($data->status === 'Proses')
                <td>
                  <a href="{{ url('admin/pengajuan/' . $data->id_pengiriman . '/edit') }}" class="text-warning"><i class="fas fa-pencil-alt"></i></a>
                  <a href="{{ url('admin/pengajuan/' . $data->id_pengiriman . '/delete') }}" onclick="return confirm('Yakin Batalkan Pengajuan?')" class="text-danger"><i class="fas fa-trash"></i></a>
                </td>
                @elseif ($data->status === 'Dalam Pengiriman')
                  <td>
                    <a href="{{ url('admin/pengajuan/' . $data->id_pengiriman . '/detail') }}" class="text-primary"><i class="fas fa-sm fa-info mr-2"></i>Sedang Dalam Pengiriman</a>
                  </td>
                @endif

            @endif
          </tr>
        @empty
          <tr>
            <td colspan="7">Belum Ada Pengajuan Tersedia</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
    {{ $pengiriman->links() }}

  </div>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pengajuan {{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/pengajuan/tambah') }}" method="POST">
        @csrf
        <div class="modal-body">

          <div class="form-group">
            <input type="hidden" name="status" value="Proses">
          </div>

          <div class="form-group">
            <label for="id_depot">Pilih Depot Anda</label>
            <select class="form-control" id="id_depot" name="id_depot">
              @if ($depot)
                @foreach ($depot as $png)
                  <option value="{{ $png->id_depot }}">{{ $png->nama_depot }}</option>
                @endforeach
              @endif
            </select>
          </div>

          <div class="form-group">
            <label for="rit">Jumlah Rit</label>
            <input type="number" name="rit" class="form-control" id="rit" placeholder="Masukan Jumlah RIt">
            <!-- Validation -->
            @if($errors->has('rit'))
            <small class="text-danger">
              <strong>{{ $errors->first('rit') }}</strong>
            </small>
            @endif
            <!-- Validation -->
          </div>

          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
            <!-- Validation -->
            @if($errors->has('keterangan'))
            <small class="text-danger">
              <strong>{{ $errors->first('keterangan') }}</strong>
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