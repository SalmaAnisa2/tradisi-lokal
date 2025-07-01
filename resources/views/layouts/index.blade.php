<!DOCTYPE html>
<html>
<head>
    <title>Tradisi Lokal</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #333; }
        ul { padding: 0; list-style: none; }
        li { background: #f9f9f9; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        a { display: inline-block; margin-bottom: 20px; padding: 8px 12px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background: #218838; }
    </style>
</head>
<body>
    <h1>Tradisi Lokal</h1>
    <a href="{{ route('aa_traditions.create') }}">Tambah Tradisi</a>

    <ul>
        @foreach($traditions as $item)
            <li>
                <strong>{{ $item->title }}</strong><br>
                {{ $item->synopsis }}<br>
                <em>Kategori:</em> {{ optional($item->category)->name ?? '-' }}
            </li>
        @endforeach
    </ul>
</body>
</html>
