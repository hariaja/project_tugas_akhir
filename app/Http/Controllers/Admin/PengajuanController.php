<?php

namespace App\Http\Controllers\Admin;

use App\Depot;
use App\Pengiriman;
use App\DetailKirim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengajuanController extends Controller
{
    public function index()
    {
        $title = 'Data Pengajuan';
        $depot = Depot::all();
        $pengiriman = Pengiriman::paginate(5);
        return view('admin.pengiriman.index', compact(['title', 'pengiriman', 'depot']));
    }

    public function pengajuan(Request $request)
    {
        $pesan_error = [
            'id_depot.required' => 'Mohon Pilih Depot',
            'rit.required' => 'Mohon Masukan Jumlah Rit',
            'keterangan.required' => 'Mohon Isi Keterangan'
        ];

        $this->validate($request, [
            'id_depot' => 'required',
            'rit' => 'required',
            'keterangan' => 'required'
        ], $pesan_error);

        $pengajuan = new Pengiriman;
        $pengajuan->id_depot = $request->id_depot;
        $pengajuan->rit = $request->rit;
        $pengajuan->m3 = $request->rit * 4.25;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect('admin/pengajuan')->with('success', 'Pengajuan Berhasil Dibuat');
    }

    public function edit($id)
    {
        $title = 'Data Pengajuan';
        $depot = Depot::all();
        $pengajuan = Pengiriman::findOrFail($id);
        return view('admin.pengiriman.edit', compact(['title', 'pengajuan', 'depot']));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengiriman::findOrFail($id);
        $pengajuan->update([
            'id_depot' => $request->id_depot,
            'rit' => $request->rit,
            'm3' => $request->rit * 4.25,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return redirect('admin/pengajuan')->withSuccess('Pengajuan Berhasil Diubah');
    }

    public function hapus($id)
    {
        $pengajuan = Pengiriman::findOrFail($id);
        $pengajuan->delete();
        return back()->withSuccess('Pengajuan Berhasil Dibatalkan');
    }

    public function detail_pengiriman($id)
    {
        $title = 'Data Pengajuan';
        $detail_kirim = DetailKirim::findOrFail($id);
        return view('admin.pengiriman.detailPengajuan', compact(['title', 'detail_kirim']));
    }
}
