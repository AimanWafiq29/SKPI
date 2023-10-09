<?php

namespace App\Http\Controllers;

use App\Models\BuktiPrestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BuktiPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate and store the uploaded file
        $validatedData = $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            
            // Remove spaces from the original file name
            $cleanedFileName = str_replace(' ', '', $originalName);
        
            // Remove any non-alphanumeric characters and keep only letters, numbers, underscores, hyphens, and dots
            $cleanedFileName = preg_replace('/[^A-Za-z0-9_\-.]/', '', $cleanedFileName);
            
            // Create a unique file name with a timestamp to avoid conflicts
            $fileName = time() . '_' . $cleanedFileName;
            
            $file->move(public_path('uploads'), $fileName);
            
            $validatedData['file'] = $fileName;
        }

        $id = $request->input('user_id');

        BuktiPrestasi::create([
            'user_id' => $request->input('user_id'),
            'nama_prestasi' => $request->nama_prestasi,
            'kategori' => $request->kategori,
            'file' => $validatedData['file'], // You can adjust this as needed
        ]);

        Alert::success('Berhasil', "Bukti $request->nama_prestasi berhasil dibuat");

        if (Auth::user()->role == "admin") {
            return redirect()->route('users.editSKPI', $id);
        } else {
            return redirect()->route('mahasiswa.editSKPI', $id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuktiPrestasi  $buktiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function show(BuktiPrestasi $buktiPrestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuktiPrestasi  $buktiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('page.admin.createBukti', compact('id'));
    }

    public function editUser($id)
    {
        return view('page.user.create', compact('id'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuktiPrestasi  $buktiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuktiPrestasi $buktiPrestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuktiPrestasi  $buktiPrestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuktiPrestasi $buktiPrestasi)
    {
        $bukti= BuktiPrestasi::where('id', $buktiPrestasi->id)->get();
        Alert::success('Berhasil', "Bukti $buktiPrestasi->nama_prestasi berhasil dihapus");
        $buktiPrestasi->delete();
        if (Auth::user()->role == "admin") {
            return redirect()->route('users.editSKPI', $bukti->id);   
        } else {
            return redirect()->route('mahasiswa.editSKPI', Auth::user()->id);
        }
    }
}
