<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengemudi;

class PengemudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Data Pengemudi';
        $pengemudi = Pengemudi::when($request->cari, function ($query) use ($request) {
            $query->where('nama_pengemudi', 'like', "%{$request->cari}%")
                ->orWhere('no_kendaraan', 'like', "%{$request->cari}%")
                ->orWhere('nip', 'like', "%{$request->cari}%");
        })->paginate(5);
        $pengemudi->appends($request->only('cari'));
        return view('admin.pengemudi.index', compact(['title', 'pengemudi']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan_error = [
            'nip.required' => 'NIP Tidak Boleh Kosong',
            'nama_pengemudi.required' => 'Nama Tidak Boleh Kosong',
            'no_kendaraan.required' => 'Nomor Kendaraan Tidak Boleh Kosong',
            'alamat.required' => 'Alamat Tidak Boleh Kosong',
        ];

        $this->validate($request, [
            'nip' => 'required',
            'nama_pengemudi' => 'required',
            'no_kendaraan' => 'required',
            'alamat' => 'required',
        ], $pesan_error);

        $pengemudi = Pengemudi::create($request->all());
        $pengemudi->save();
        return redirect('admin/pengemudi')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Data Pengemudi';
        $pengemudi = Pengemudi::findOrFail($id);
        return view('admin.pengemudi.edit', compact(['title', 'pengemudi']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengemudi = Pengemudi::findOrFail($id);
        $pengemudi->update($request->all());
        $pengemudi->save();
        return redirect('admin/pengemudi')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengemudi = Pengemudi::findOrFail($id);
        $pengemudi->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
