@extends('layouts.template')

@section('content')
    <h1>Form Data Tradition</h1>

    <form action="{{ route('aa_traditions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-6">
                <input type="text" id="title" name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Synopsis --}}
        <div class="mb-3 row">
            <label for="synopsis" class="col-sm-2 col-form-label">Synopsis</label>
            <div class="col-sm-6">
                <textarea id="synopsis" name="synopsis"
                        class="form-control @error('synopsis') is-invalid @enderror">{{ old('synopsis') }}</textarea>
                @error('synopsis') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Category --}}
        <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-6">
                <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Cover Image --}}
        <div class="mb-3 row">
            <label for="cover" class="col-sm-2 col-form-label">Cover Image</label>
            <div class="col-sm-6">
                <input type="file" id="cover" name="cover"
                        class="form-control @error('cover') is-invalid @enderror">
                @error('cover') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Submit --}}
        <div class="mb-3 row">
            <div class="col-sm-6 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
