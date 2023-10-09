<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;

class BiodataController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|unique:users|string|min:10|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($validateData);

        // Buat pengguna baru
        $biodata = new Biodata([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
        ]);

        // Simpan pengguna baru ke dalam database
        $biodata->save();
        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show(Biodata $biodata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit(Biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biodata $biodata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biodata $biodata)
    {
        //
    }
}
