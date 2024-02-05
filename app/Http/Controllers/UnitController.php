<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    // Menampilkan semua unit
    public function index()
    {
        // return view('unit');
        $units = Unit::all();
        return view('unit', compact('units'));
        // return response()->json($units);
    }

    public function showCreateUnit() {
        return view('Unit.create');
    }
    public function showUpdateUnit() {
        return view('Unit.update');
    }


    // Menampilkan form tambah unit
    public function create()
    {
        return view('unit.create');
    }

    // Menyimpan data unit baru
    // public function store(Request $request)
    // {
    //     // Validasi input sesuai kebutuhan
    //     $request->validate([
    //         'nama' => 'required|unique:unit',
    //     ]);

    //     // Simpan data unit baru
    //     $user = Unit::create($request->only(['nama']));

    //     // return redirect()->route('unit.index')->with('success', 'Unit berhasil ditambahkan.');
    //     return response()->json($user);
    // }


    // public function store(Request $request)
    // {
    //     // Validate input
    //     $request->validate([
    //         'name' => 'required',
    //     ]);

    //     // Create a new record
    //     $newRecord = Unit::create([
    //         'name' => $request->input('name'),
    //     ]);

    //     // Optionally, you can return the created record as JSON response
    //     return response()->json($newRecord);
    // }


    public function store(Request $request)
    {
        $data = [
            'nama' => $request->input('nama'),
            // Kolom-kolom lain sesuai dengan kebutuhan
        ];

        Unit::create($data);

        return \redirect('unit');
    }


    // Menampilkan form edit unit
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('Unit.update', compact('unit'));
    }

    // Mengupdate data unit
    public function update(Request $request, $id)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'nama' => 'required|unique:unit,nama,' . $id,
        ]);

        // Simpan perubahan data unit
        $unit = Unit::findOrFail($id);
        $unit->update($request->only(['nama']));

        return \redirect('unit');
    }

    // Menghapus data unit
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('unit.index')->with('success', 'Unit berhasil dihapus.');
    }
}
