<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
</head>
<body>
    <h1>Available Genres</h1>

<ul>
    @foreach ($genres as $item)
        <li>{{ $item['name'] }} — {{ $item['description'] }}</li>
    @endforeach
</ul>

</body>
</html>