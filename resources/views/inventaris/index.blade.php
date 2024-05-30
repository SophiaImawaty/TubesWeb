@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center py-4">
    <h1 class="text-2xl font-bold">Daftar Inventaris</h1>
    <a href="{{ route('inventaris.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Barang</a>
</div>

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white border-collapse">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="py-2 px-4 border">ID</th>
            <th class="py-2 px-4 border">Nama Barang</th>
            <th class="py-2 px-4 border">Kategori</th>
            <th class="py-2 px-4 border">Lokasi</th>
            <th class="py-2 px-4 border">Tanggal Pembelian</th>
            <th class="py-2 px-4 border">Kondisi</th>
            <th class="py-2 px-4 border">Harga</th>
            <th class="py-2 px-4 border">Penanggung Jawab</th>
            <th class="py-2 px-4 border">Jumlah</th>
            <th class="py-2 px-4 border">Keterangan</th>
            <th class="py-2 px-4 border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventaris as $item)
        <tr>
            <td class="border px-4 py-2">{{ $item->id }}</td>
            <td class="border px-4 py-2">{{ $item->nama_barang }}</td>
            <td class="border px-4 py-2">{{ $item->kategori }}</td>
            <td class="border px-4 py-2">{{ $item->lokasi }}</td>
            <td class="border px-4 py-2">{{ $item->tanggal_pembelian }}</td>
            <td class="border px-4 py-2">{{ $item->kondisi }}</td>
            <td class="border px-4 py-2">{{ $item->harga }}</td>
            <td class="border px-4 py-2">{{ $item->penanggung_jawab }}</td>
            <td class="border px-4 py-2">{{ $item->jumlah }}</td>
            <td class="border px-4 py-2">{{ $item->keterangan }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('inventaris.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                <form action="{{ route('inventaris.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(event)">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
</form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    function confirmDelete(event) {
        event.preventDefault();
        const form = event.target.form;

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan bisa mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection
