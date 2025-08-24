@extends('layouts.app')

@section('title', 'Tambah Proposal')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-gray-800 text-xl font-semibold">@yield('title')</h1>
            <p class="text-gray-500 text-sm">Halaman untuk menambahkan data proposal baru.</p>
        </div>
        <nav class="text-sm text-gray-500">
            <ol class="list-reset flex">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="{{ route('admin.proposal.index') }}" class="hover:text-green-600">Manajemen Proposal</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-700">Tambah</li>
            </ol>
        </nav>
    </div>

    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Tambah Proposal</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded-md border border-red-400">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.proposal.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700">Mahasiswa</label>
                <select name="mahasiswa_id"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 @error('mahasiswa_id') border-red-500 @enderror"
                    required>
                    <option value="" disabled selected>Pilih Mahasiswa</option>
                    @foreach ($mahasiswa as $m)
                        <option value="{{ $m->id }}" {{ old('mahasiswa_id') == $m->id ? 'selected' : '' }}>
                            {{ $m->name }}</option>
                    @endforeach
                </select>
                @error('mahasiswa_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700">Dosen Pembimbing</label>
                <select name="dosen_pembimbing_id"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 @error('dosen_pembimbing_id') border-red-500 @enderror"
                    required>
                    <option value="" disabled selected>Pilih Dosen Pembimbing</option>
                    @foreach ($dosen as $d)
                        <option value="{{ $d->id }}" {{ old('dosen_pembimbing_id') == $d->id ? 'selected' : '' }}>
                            {{ $d->name }}</option>
                    @endforeach
                </select>
                @error('dosen_pembimbing_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 @error('judul') border-red-500 @enderror"
                    required>
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700">Upload File Proposal</label>
                <input type="file" name="file_proposal"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100
                    @error('file_proposal') border-red-500 @enderror">
                @error('file_proposal')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2 pt-4">
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">Simpan</button>
                <a href="{{ route('admin.proposal.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">Batal</a>
            </div>
        </form>
    </div>
@endsection
