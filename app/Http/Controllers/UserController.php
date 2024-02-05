<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Unit;
use App\Models\Jabatan;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        // return view('karyawan');
        $user = User::all();
        // return response()->json($user);
        return view('user', compact('user'));
    }

    
    

    
    
    
    public function showCreateUser() {
        return view('User.create');
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        $units = Unit::all();
        $jabatans = Jabatan::all();
        return response()->json([
            'units' => $units,
            'jabatans' => $jabatans,
        ]);
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'unit_id' => 'required',
            'tanggal_bergabung' => 'required',
            'jabatan' => 'required|array',
        ]);

        $user = User::create($request->all());
        $user->jabatan()->attach($request->jabatan);

        return \redirect('user');
    }

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $units = Unit::all();
        $jabatans = Jabatan::all();
        return view('user.update', compact('user', 'units', 'jabatans'));
    }

    // Mengupdate data karyawan
    public function update(Request $request, $id)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'nama' => 'required',
            'username' => 'required,username,' . $id,
            'password' => 'required',
            'unit_id' => 'required',
            'tanggal_bergabung' => 'required',
            'jabatan' => 'required|array',
        ]);

        // Simpan perubahan data karyawan
        $user = User::findOrFail($id);
        $user->update($request->only([
            'nama', 'username', 'password', 'unit_id', 'tanggal_bergabung',
        ]));

        // Sync jabatan-jabatan yang dipilih
        $user->jabatan()->sync($request->jabatan);

        return \redirect('user');
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
