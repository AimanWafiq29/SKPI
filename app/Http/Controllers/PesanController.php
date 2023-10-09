<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PesanController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh pengguna
        $validatedData = $request->validate([
            'status' => 'required|in:Ditolak,Disetujui',
            'pesan' => 'required|string',
        ]);

        // Simpan pesan ke dalam database
        $pesan = new Pesan([
            'user_id' => $request->input('user_id'),
            'status' => $validatedData['status'],
            'pesan' => $validatedData['pesan'],
        ]);

        $pesan->save();

        return redirect()->route('admin.home');
    }

    public function show(Pesan $pesan)
    {
        //
    }
    public function edit(Pesan $pesan)
    {
        //
    }

    public function update(Request $request, Pesan $pesan)
    {
        // Validasi data yang dikirimkan oleh pengguna
        $validatedData = $request->validate([
            'status' => 'required|in:Ditolak,Disetujui',
            'pesan' => 'required|string',
        ]);

        // Perbarui pesan
        $pesan->update([
            'status' => $validatedData['status'],
            'pesan' => $validatedData['pesan'],
        ]);

        // Redirect atau lakukan tindakan lain sesuai kebutuhan Anda
        Alert::success('Berhasil', "Status berhasil dikonfirmasi");
        return redirect()->route('admin.home');
    }

    public function destroy(Pesan $pesan)
    {
        //
    }
}
