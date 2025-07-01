@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Tradition</h2>

    {{-- Menampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aa_traditions.update', $tradition->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $tradition->title) }}" required>
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Synopsis --}}
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            <textarea name="synopsis" id="synopsis"
                    class="form-control @error('synopsis') is-invalid @enderror"
                    rows="4">{{ old('synopsis', $tradition->synopsis) }}</textarea>
            @error('synopsis') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id"
                    class="form-control @error('category_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $tradition->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Cover Image --}}
        <div class="mb-3">
            <label for="cover" class="form-label">Cover</label>
            <input type="file" name="cover" id="cover"
                    class="form-control @error('cover') is-invalid @enderror">
            @error('cover') <div class="invalid-feedback">{{ $message }}</div> @enderror

            @if ($tradition->cover_image)
                <img src="{{ asset('covers/' . $tradition->cover_image) }}" alt="Cover Image"
                    class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        {{-- Buttons --}}
        <button type="submit" class="btn btn-primary">Update Tradition</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
