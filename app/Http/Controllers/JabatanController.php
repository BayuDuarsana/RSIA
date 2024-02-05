<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    // Menampilkan semua jabatan
    public function index()
    {
    //    return view('jabatan');
       $jabatans = Jabatan::all();
       return view('jabatan', compact('jabatans'));
    }

    public function showCreateJabatan() {
        return view('Jabatan.create');
    }
    

    // Menampilkan form tambah jabatan
    public function create()
    {
        return view('jabatan.create');
    }

    // Menyimpan data jabatan baru
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->input('nama'),
            // Kolom-kolom lain sesuai dengan kebutuhan
        ];

        Jabatan::create($data);

        return \redirect('jabatan');
    }

    // Menampilkan form edit jabatan
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('Jabatan.update', compact('jabatan'));
    }

    // Mengupdate data jabatan
    public function update(Request $request, $id)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'nama' => 'required|unique:jabatan,nama,' . $id,
        ]);

        // Simpan perubahan data jabatan
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->only(['nama']));

        return \redirect('jabatan');
    }

    // Menghapus data jabatan
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}
