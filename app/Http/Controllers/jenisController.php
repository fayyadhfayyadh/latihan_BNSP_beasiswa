<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $data = Jenis::all();
        return view('jenis.index', compact('data'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
        ]);

        Jenis::create([
            'nama_beasiswa' => $request->nama_beasiswa,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Data beasiswa berhasil ditambahkan!');
    }

    public function show(Jenis $jeni)
    {
        return view('jenis.show', compact('jeni'));
    }

    public function edit(Jenis $jeni)
    {
        return view('jenis.edit', compact('jeni'));
    }

    public function update(Request $request, Jenis $jeni)
    {
        $request->validate([
            'nama_beasiswa' => 'required|string|max:255',
        ]);

        $jeni->update([
            'nama_beasiswa' => $request->nama_beasiswa,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Data beasiswa berhasil diperbarui!');
    }

    public function destroy(Jenis $jeni)
    {
        $jeni->delete();

        return redirect()->route('jenis.index')->with('success', 'Data beasiswa berhasil dihapus!');
    }
}
