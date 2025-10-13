<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
</head>
<body>
    <h1>Authors List</h1>

    <ul>
    @foreach ($authors as $item)
        <li>{{ $item['name'] }} — {{ $item['biodata'] }}</li>
    @endforeach
</ul>
</body>
</html>