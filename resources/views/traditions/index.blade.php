<!DOCTYPE html>
<html>
<head>
    <title>Tradisi Lokal</title>
</head>
<body>
    <h1>Tradisi Lokal</h1>
    <a href="{{ route('aa_traditions.create') }}">Tambah Tradisi</a>
    <ul>
        @foreach($traditions as $tradition)
            <li>{{ $tradition->title }}: {{ $tradition->description }} (Kategori: {{ $tradition->category->name }})</li>
        @endforeach
    </ul>
</body>
</html>