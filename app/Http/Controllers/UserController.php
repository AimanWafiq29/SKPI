<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\BuktiPrestasi;
use App\Models\InformasiTambahan;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Mpdf\Mpdf as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function create()
    {
        return view('page.admin.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|unique:users|string|min:7|max:10',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Mengenkripsi password menggunakan bcrypt
        $password = bcrypt($validateData['password']);

        // Membuat pengguna baru
        $user = User::create([
            'nim' => $validateData['nim'],
            'password' => $password,
        ]);

        // Buat biodata untuk pengguna baru
        $biodata = new Biodata([
            'user_id' => $user->id,
            'nama' => $validateData['nama'],
            'nim' => $validateData['nim'],
        ]);

        // Simpan pengguna baru dan biodata ke dalam database
        $user->save();
        $biodata->save();
        Alert::success('Berhasil', "Bukti $biodata->nama berhasil dibuat");
        return redirect()->route('admin.home');
    }

    public function edit(User $user)
    {
        return view('page.admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string|min:7|max:10|unique:users,nim,' . $user->id,
        ]);

        $user->update($validateData);

        $biodata = Biodata::where('user_id', $user->id)->firstOrFail();
        $biodata->nama = $validateData['nama'];
        $biodata->nim = $validateData['nim'];
        $biodata->save();
        Alert::success('Berhasil', "Mahasiswa $biodata->nama berhasil diedit");
        return redirect()->route('admin.home');
    }

    public function show(User $user)
    {
        $buktis = BuktiPrestasi::where('user_id', $user->id)->get();
        $pesan = Pesan::where('user_id', $user->id)->first();

        return view('page.admin.DetailSKPI', compact('user', 'buktis', 'pesan'));
    }

    public function editSKPI(User $user)
    {
        $buktis = BuktiPrestasi::where('user_id', $user->id)->get();

        if (Auth::user()->role == "admin") {
            return view('page.admin.editSKPI', compact('user', 'buktis'));
        } else {
            return view('page.user.editSKPI', compact('user', 'buktis'));
        }
    }

    public function updateSKPI(Request $request, User $user)
    {

        $validateData = $request->validate([
            'no_dokumen' => 'required|string|max:255',
            'no_ijazah' => 'required|string|max:255',
            'tgl_dokumen' => 'required|date',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nim' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'tahun_masuk' => 'required|string|max:255',
            'tahun_lulus' => 'required|string|max:255',
            'gelar' => 'required|string|max:255',
            'pelatihan' => 'required|string',
            'penhargaan' => 'required|string',
            'organisasi' => 'required|string',
            'magang' => 'required|string',
            'seminar' => 'required|string',
            'skripsi' => 'required|string',
        ]);

        $user->update([
            'nama' => $request->input('nama'),
        ]);

        // Update data biodata user
        $user->biodata->update([
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi'),
            'tahun_masuk' => $request->input('tahun_masuk'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'gelar' => $request->input('gelar'),
            'no_ijazah' => $request->input('no_ijazah'),
            'no_dokumen' => $request->input('no_dokumen'),
            'tgl_dokumen' => $request->input('tgl_dokumen'),
        ]);

        // Update data biodata user
        $biodata = $user->biodata; // Dapatkan objek biodata user


        $biodata->update([
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi'),
            'tahun_masuk' => $request->input('tahun_masuk'),
            'tahun_lulus' => $request->input('tahun_lulus'),
            'gelar' => $request->input('gelar'),
            'no_ijazah' => $request->input('no_ijazah'),
            'no_dokumen' => $request->input('no_dokumen'),
            'tgl_dokumen' => $request->input('tgl_dokumen'),
        ]);


        $informasitambahan = InformasiTambahan::where('biodata_id', $biodata->id)->first();

        if ($informasitambahan === null) {

            // Jika tidak ada, buat baru
            $biodata->informasitambahan()->create([
                'biodata_id' => $biodata->id, // Set biodata_id sesuai dengan biodata yang diperbarui
                'pelatihan' => $request->input('pelatihan'),
                'penhargaan' => $request->input('penhargaan'),
                'organisasi' => $request->input('organisasi'),
                'magang' => $request->input('magang'),
                'seminar' => $request->input('seminar'),
                'skripsi' => $request->input('skripsi'),
            ]);
        } else {
            // Jika informasitambahan sudah ada, perbarui data
            $biodata->informasitambahan->update([
                'pelatihan' => $request->input('pelatihan'),
                'penhargaan' => $request->input('penhargaan'),
                'organisasi' => $request->input('organisasi'),
                'magang' => $request->input('magang'),
                'seminar' => $request->input('seminar'),
                'skripsi' => $request->input('skripsi'),
            ]);
        }

        Alert::success('Berhasil', "$biodata->nama berhasil diedit");
        if (Auth::user()->role == "admin") {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('home');
        }
    }

    public function destroy(User $user)
    {
        if ($user->biodata) {
            if ($user->biodata->informasitambahan) {
                $user->biodata->informasitambahan->delete();
            }
            $user->biodata->delete();
        }
        $user->delete();
        Alert::success('Berhasil', "Data berhasil dihapus");
        return redirect()->route('admin.home');
    }

    public function createUser()
    {
        return view('page.admin.create');
    }

    public function Cetak(User $user)
    {
        $buktis = BuktiPrestasi::where('user_id', $user->id)->get();

        // Data yang ingin Anda sertakan dalam kode QR
        $data = $user->biodata->no_dokumen;

        // Generate kode QR
        $qrCode = QrCode::size(50)->generate($data);

        // Simpan kode QR dengan nama sesuai nomor ijazah
        $qrCodePath = public_path("img/kodeQR/{$user->biodata->no_ijazah}.png");
        file_put_contents($qrCodePath, $qrCode);

        $pdf = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_top' => '0',
            'margin_bottom' => '0',
            'margin_right' => '0',
            'margin_left' => '0',
            'margin_footer' => '2',
        ]);

        $html = view('page.user.skpi', compact('user', 'buktis'));
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
}
