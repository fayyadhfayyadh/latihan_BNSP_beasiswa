<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Jenis;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Tampilkan daftar beasiswa.
     */
    public function index()
    {
        $data = Beasiswa::with('jenis')->get();
        return view('beasiswa.index', compact('data'));
    }

    /**
     * Tampilkan form tambah data beasiswa.
     */
    public function create()
    {
        $jenis = Jenis::all();
        $randomIpk = number_format(mt_rand(250, 400) / 100, 2); // IPK acak 2.50–4.00

        return view('beasiswa.create', compact('jenis', 'randomIpk'));
    }

    /**
     * Simpan data beasiswa baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:15',
            'ipk' => 'required|numeric|between:0,4',
            'semester' => 'required|integer|min:1|max:14',
            'jenis_id' => 'required|exists:jenis,id',
            'berkas' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Cek apakah ada file yang diupload
        $path = null;
        if ($request->hasFile('berkas')) {
            $path = $request->file('berkas')->store('berkas', 'public');
        }

        // Simpan data
        Beasiswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'ipk' => $request->ipk,
            'semester' => $request->semester,
            'jenis_id' => $request->jenis_id,
            'berkas' => $path,
        ]);

        return redirect()->route('beasiswa.index')->with('success', 'Data beasiswa berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit data beasiswa.
     */
    public function edit($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $jenis = Jenis::all();

        return view('beasiswa.edit', compact('beasiswa', 'jenis'));
    }

    /**
     * Update data beasiswa.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:15',
            'ipk' => 'required|numeric|between:0,4',
            'semester' => 'required|integer|min:1|max:14',
            'jenis_id' => 'required|exists:jenis,id',
            'berkas' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $beasiswa = Beasiswa::findOrFail($id);

        $data = $request->only(['nama', 'email', 'no_hp', 'ipk', 'semester', 'jenis_id']);

        if ($request->hasFile('berkas')) {
            $data['berkas'] = $request->file('berkas')->store('berkas', 'public');
        }

        $beasiswa->update($data);

        return redirect()->route('beasiswa.index')->with('success', 'Data beasiswa berhasil diperbarui!');
    }

    /**
     * Hapus data beasiswa.
     */
    public function destroy($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();

        return redirect()->route('beasiswa.index')->with('success', 'Data beasiswa berhasil dihapus!');
    }
}
