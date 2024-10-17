<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Siswa::where('siswa', 'LIKE', '%' . $request->search . '%')
            ->orderBy('siswa', 'ASC')
            ->simplePaginate(5);

            // dd($students);

        return view('datamurid.siswa_index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datamurid.siswa_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa' => 'required',
            'nis' => 'required|numeric',
            'jenis_absen' => 'required',
            'jam' => 'required',
            'rayon' => 'required',
            'rombel' => 'required',
        ], [
            'siswa.required' => 'Nama siswa harus diisi',
            'nis.required' => 'NIS harus diisi',
            'jenis_absen.required' => 'Jenis absensi harus diisi',
            'jam.required' => 'Jam harus diisi',
            'rayon.required' => 'Rayon harus diisi',
            'rombel.required' => 'Rombel harus diisi',
        ]);

        $proses = Siswa::create([
            'siswa' => $request->siswa,
            'nis' => $request->nis,
            'jenis_absen' => $request->jenis_absen,
            'jam' => $request->jam,
            'rayon' => $request->rayon,
            'rombel' => $request->rombel,
        ]);

        if ($proses) {
            return redirect()->route('datamurid.siswa_index')->with('success', 'Data siswa berhasil ditambahkan');
        } else {
            return redirect()->route('datamurid.siswa_index')->with('failed', 'Gagal menambahkan data siswa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementasi untuk menampilkan detail siswa
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('datamurid.siswa_edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'siswa' => 'required',
            'nis' => 'required|numeric',
            'jenis_absen' => 'required',
            'jam' => 'required',
            'rayon' => 'required',
            'rombel' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('datamurid.siswa_index')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $student = Siswa::find($id); // Ganti dengan model yang sesuai
    if ($student) {
        $student->delete();
        return redirect()->route('datamurid.siswa_index')->with('success', 'Data Siswa berhasil dihapus.');
    }
    return redirect()->route('datamurid.siswa_index')->with('error', 'Data Siswa tidak ditemukan.');
}

}
