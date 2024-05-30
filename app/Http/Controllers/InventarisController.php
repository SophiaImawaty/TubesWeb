<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('inventaris.index', [
            'inventaris'=> $inventaris
        ]);
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'tanggal_pembelian' => 'required|date',
            'kondisi' => 'required',
            'harga' => 'required|numeric',
            'penanggung_jawab' => 'required',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Inventaris $inventaris)
    {
        return view('inventaris.show', compact('inventaris'));
    }

    public function edit($id)
    {
    $inventaris = Inventaris::findOrFail($id);
    return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_pembelian' => 'required|date',
            'kondisi' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'penanggung_jawab' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Destroy method
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil dihapus.');
    }
}
