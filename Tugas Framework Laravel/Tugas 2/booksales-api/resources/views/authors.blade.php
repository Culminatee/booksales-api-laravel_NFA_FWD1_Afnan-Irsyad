<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f9fafb;
            color: #111827;
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

        h3 {
            font-size: 1.75rem;
            color: #1f2937;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }

        li {
            margin-left: 1rem;
            font-size: 1rem;
            color: #374151;
            line-height: 1.5;
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
    <h1>Authors List</h1>

    <ul>
        @foreach ($authors as $item)
            <h3>{{ $item['name'] }}</h3>
            <li>{{ $item['biodata'] }}</li>
            <br/>
        @endforeach
    </ul>
</body>
</html>
