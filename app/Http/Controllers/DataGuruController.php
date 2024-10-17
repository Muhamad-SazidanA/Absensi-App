<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gurus = guru::where('guru', 'LIKE', '%' . $request->search . '%')
            ->orderBy('guru', 'ASC')
            ->simplePaginate(5);

        // dd($students);

        return view('dataguru.guru_index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dataguru.guru_add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guru' => 'required',
            'nip' => 'required|numeric',
            'jabatan' => 'required',
            'jenis_absen' => 'required',
            'jam' => 'required',
        ], [
            'guru.required' => 'Nama guru harus diisi',
            'nis.required' => 'NIP harus diisi',
            'jabatan.required' => 'Nama guru harus diisi',
            'jenis_absen.required' => 'Jenis absensi harus diisi',
            'jam.required' => 'Jam harus diisi',
        ]);

        $proses = guru::create([
            'guru' => $request->guru,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'jenis_absen' => $request->jenis_absen,
            'jam' => $request->jam,
        ]);

        if ($proses) {
            return redirect()->route('dataguru.guru_index')->with('success', 'Data guru berhasil ditambahkan');
        } else {
            return redirect()->route('dataguru.guru_index')->with('failed', 'Gagal menambahkan data guru');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gurus = guru::findOrFail($id);
        return view('dataguru.guru_show', compact('gurus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gurus = guru::findOrFail($id);
        return view('dataguru.guru_edit', compact('gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'guru' => 'required',
            'nip' => 'required|numeric',
            'jabatan' => 'required',
            'jenis_absen' => 'required',
            'jam' => 'required',
        ]);

        $gurus = guru::findOrFail($id);
        $gurus->update($request->all());

        return redirect()->route('dataguru.guru_index')->with('success', 'Data guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gurus = guru::find($id); // Ganti dengan model yang sesuai
        if ($gurus) {
            $gurus->delete();
            return redirect()->route('dataguru.guru_index')->with('success', 'Data guru berhasil dihapus.');
        }
        return redirect()->route('dataguru.guru_index')->with('error', 'Data guru tidak dihapus.');
    }
}
