<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tradisi</title>
</head>
<body>
    <h1>Tambah Tradisi</h1>
    <form action="{{ route('aa_traditions.store') }}" method="POST">
        @csrf
        <label for="title">Judul:</label>
        <input type="text" name="title" required>
        <br>
            <label for="description">Deskripsi:</label>
            <textarea name="description" required></textarea>
        <br>
            <label for="category_id">Kategori:</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('sinta_traditions.index') }}">Kembali</a>
</body>
</html>