@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center py-4">
    <h1 class="text-2xl font-bold">Edit Barang Inventaris</h1>
    <a href="{{ route('inventaris.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
</div>

@if($errors->any())
    <div class="bg-red-500 text-white p-4 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('inventaris.update', $inventaris->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="nama_barang" class="block text-gray-700">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" class="w-full px-4 py-2 border rounded" value="{{ old('nama_barang', $inventaris->nama_barang) }}">
    </div>
    <div class="mb-4">
        <label for="kategori" class="block text-gray-700">Kategori:</label>
        <input type="text" id="kategori" name="kategori" class="w-full px-4 py-2 border rounded" value="{{ old('kategori', $inventaris->kategori) }}">
    </div>
    <div class="mb-4">
        <label for="lokasi" class="block text-gray-700">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi" class="w-full px-4 py-2 border rounded" value="{{ old('lokasi', $inventaris->lokasi) }}">
    </div>
    <div class="mb-4">
        <label for="tanggal_pembelian" class="block text-gray-700">Tanggal Pembelian:</label>
        <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="w-full px-4 py-2 border rounded" value="{{ old('tanggal_pembelian', $inventaris->tanggal_pembelian) }}">
    </div>
    <div class="mb-4">
        <label for="kondisi" class="block text-gray-700">Kondisi:</label>
        <input type="text" id="kondisi" name="kondisi" class="w-full px-4 py-2 border rounded" value="{{ old('kondisi', $inventaris->kondisi) }}">
    </div>
    <div class="mb-4">
        <label for="harga" class="block text-gray-700">Harga:</label>
        <input type="number" step="0.01" id="harga" name="harga" class="w-full px-4 py-2 border rounded" value="{{ old('harga', $inventaris->harga) }}">
    </div>
    <div class="mb-4">
        <label for="penanggung_jawab" class="block text-gray-700">Penanggung Jawab:</label>
        <input type="text" id="penanggung_jawab" name="penanggung_jawab" class="w-full px-4 py-2 border rounded" value="{{ old('penanggung_jawab', $inventaris->penanggung_jawab) }}">
    </div>
    <div class="mb-4">
        <label for="jumlah" class="block text-gray-700">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" class="w-full px-4 py-2 border rounded" value="{{ old('jumlah', $inventaris->jumlah) }}">
    </div>
    <div class="mb-4">
        <label for="keterangan" class="block text-gray-700">Keterangan:</label>
        <textarea id="keterangan" name="keterangan" class="w-full px-4 py-2 border rounded">{{ old('keterangan', $inventaris->keterangan) }}</textarea>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
    </div>
</form>
@endsection
