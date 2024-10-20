@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">{{ isset($article) ? 'Edit Article' : 'Create Article' }}</h2>
    
    <form action="{{ isset($article) ? route('articles.update', $article) : route('articles.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="bg-white p-6 rounded-lg shadow">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
            <input type="text" 
                   name="title" 
                   value="{{ old('title', $article->title ?? '') }}" 
                   class="w-full px-3 py-2 border rounded">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Isi</label>
            <textarea name="content" 
                      rows="6" 
                      class="w-full px-3 py-2 border rounded">{{ old('content', $article->content ?? '') }}</textarea>
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Gambar</label>
            <input type="file" name="image" class="w-full">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" 
                       name="is_published" 
                       value="1" 
                       {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}>
                <span class="ml-2">Publish</span>
            </label>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                {{ isset($article) ? 'Update' : 'Create' }}
            </button>
            <a href="{{ route('articles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batalkan</a>
        </div>
    </form>
</div>
@endsection