<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        :root {
            font-family: 'Figtree', sans-serif;
            color-scheme: light dark;
        }

        body {
            margin: 0;
            padding: 2rem;
            background-color: #f9fafb;
            color: #111827;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #e11d48;
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
            max-width: 600px;
            width: 100%;
        }

        li {
            margin-left: 1rem;
            color: #374151;
        }

        h3 {
            font-size: 1.5rem;
            color: #1f2937;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: #111827;
                color: #f9fafb;
            }

            h3 {
                color: #d4d4d4;
            }

            li {
                color: #e5e7eb;
            }
        }
    </style>
</head>
<body>
    <h1>Books Available</h1>

    <ul>
        @foreach ($books as $item)
            <h3>{{ $item['name'] }}</h3>
            <li>Description: {{ $item['description'] }}</li>
            <li>Stock: {{ $item['stock'] }}</li>
            <li>Price (Rp): {{ $item['price'] }}</li>
            <br/>
        @endforeach
    </ul>
</body>
</html>
