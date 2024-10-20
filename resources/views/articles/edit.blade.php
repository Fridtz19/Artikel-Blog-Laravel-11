@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md">
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Perbarui Artikel</h2>

        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Judul</label>
                <input type="text" name="title" id="title" 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                    value="{{ old('title', $article->title) }}">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold mb-2">Isi</label>
                <textarea name="content" id="content" rows="5" 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if($article->image)
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Gambar Saat ini</label>
                    <img src="{{ Storage::url($article->image) }}" 
                        alt="{{ $article->title }}" 
                        class="w-48 h-48 object-cover rounded">
                </div>
            @endif

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Gambar Baru</label>
                <input type="file" name="image" id="image" 
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_published" value="1" 
                        {{ $article->is_published ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <span class="ml-2">Publiskan</span>
                </label>
            </div>

            <div class="flex gap-2">
                <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Perbarui Artikel
                </button>
                
                <a href="{{ route('articles.index') }}" 
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Batalakn
                </a>
            </div>
        </form>
    </div>
</div>
@endsection