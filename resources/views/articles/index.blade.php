@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Buat Article Baru</h2>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Judul</label>
                <input type="text" name="title" id="title" 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    value="{{ old('title') }}">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold mb-2">Isi</label>
                <textarea name="content" id="content" rows="5" 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Gambar</label>
                <input type="file" name="image" id="image" 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_published" value="1" 
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <span class="ml-2">Segera Publiskan</span>
                </label>
            </div>

            <div class="flex gap-2">
                <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Buat Artikel
                </button>
                
                <a href="{{ route('articles.index') }}" 
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Batalkan
                </a>
            </div>
        </form>
    </div>
</div>
@endsection