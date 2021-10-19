<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use App\Depot;
use App\User;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Data Depot';
        $depot = Depot::when($request->cari, function ($query) use ($request) {
            $query->where('nama_depot', 'like', "%{$request->cari}%")
                ->orWhere('alamat', 'like', "%{$request->cari}%");
        })->paginate(5);
        $depot->appends($request->only('cari'));
        return view('admin.depot.index', compact(['title', 'depot']));
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
        // dd($request->all());

        $pesan_error = [
            'nama_depot.required' => 'Nama Depot Tidak Boleh Dikosongkan',
            'email_depot.required' => 'Email Tidak Boleh Dikosongkan',
            'email_depot.unique' => 'Email Sudah Digunakan',
            'alamat_depot.required' => 'Mohon Masukan Alamat Depot'
        ];

        $this->validate($request, [
            'nama_depot' => 'required',
            'email_depot' => 'required|unique:depot,email_depot',
            'alamat_depot' => 'required',
        ], $pesan_error);

        $user = new User;
        $user->level = 'depot';
        $user->name = $request->nama_depot;
        $user->email = $request->email_depot;
        $user->password = bcrypt('depot'); // Akun baru otomatis akan berisi 'depot'
        $user->remember_token = Str::random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id]);

        $data_upload = new Depot;
        $data_upload->user_id = $request->user_id;
        $data_upload->nama_depot = $request->nama_depot;
        $data_upload->email_depot = $request->email_depot;
        $data_upload->alamat_depot = $request->alamat_depot;
        $data_upload->save();

        return redirect('admin/depot')->with('success', 'Data Berhasil Ditambahkan');
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
        $title = 'Data Depot';
        $depot = Depot::findOrFail($id);
        return view('admin.depot.edit', compact(['title', 'depot']));
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
        $depot = Depot::findOrFail($id);
        $depot->user()->update([
            'name' => $request['nama_depot'],
            'email' => $request['email_depot'],
        ]);
        $depot->update($request->all());
        return redirect('admin/depot')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depot = Depot::findOrFail($id);
        $depot->user()->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function cetak()
    {
        $depot = Depot::all();
        $pdf = PDF::loadView('export', ['depot' => $depot]);
        return $pdf->download('data-depot.pdf');
    }

    public function export()
    {
        $depot = Depot::all();
        return view('export', ['depot' => $depot]);
    }
}
