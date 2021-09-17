<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengiriman;
use App\Pengemudi;
use App\DetailKirim;

class PengirimanController extends Controller
{
    public function kirim($id)
    {
        $title = 'Data Pengiriman';
        $pengemudi = Pengemudi::all();
        $kirim = Pengiriman::findOrFail($id);
        return view('admin.pengiriman.detail', compact(['title', 'kirim', 'pengemudi']));
    }

    public function proses(Request $request, $id)
    {
        $detail = DetailKirim::create([
            'id_pengiriman' => $request->id_depot,
            'id_pengemudi' => $request->id_pengemudi
        ]);

        if ($detail == true) {
            $pengajuan = Pengiriman::findOrFail($id);
            $pengajuan->update([
                'status' => 'Dalam Pengiriman'
            ]);
        }

        return redirect('admin/pengajuan')->with('success', 'Pengajuan Sudah Dikonfirmasi');
    }
}
