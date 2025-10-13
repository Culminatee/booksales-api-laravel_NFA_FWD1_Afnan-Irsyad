<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas 1 Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            :root {
                font-family: 'Figtree', sans-serif;
                color-scheme: light dark;
            }
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                background-color: #f9fafb;
                color: #111827;
            }
            img {
                width: 100px;
                height: auto;
                margin-bottom: 1rem;
            }
            h1 {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                color: #e11d48;
            }
            h2 {
                font-size: 1.5rem;
                color: #374151;
                margin-bottom: 2rem;
            }
            .btn-container {
                display: flex;
                gap: 1rem;
            }
            .btn {
                padding: 0.75rem 1.5rem;
                border-radius: 0.5rem;
                background-color: #e11d48;
                color: white;
                font-weight: 600;
                text-decoration: none;
                transition: background-color 0.2s, transform 0.1s;
            }
            .btn:hover {
                background-color: #be123c;
                transform: scale(1.05);
            }
            @media (prefers-color-scheme: dark) {
                body {
                    background-color: #111827;
                    color: #f9fafb;
                }
                h2 {
                    color: #d1d5db;
                }
                .btn {
                    background-color: #f43f5e;
                }
                .btn:hover {
                    background-color: #e11d48;
                }
            }
        </style>
    </head>
    <body>
        <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">

        <h1>Tugas 1 Laravel</h1>
        <h2>Afnan Irsyad</h2>

        <div class="btn-container">
            <a href="{{ url('/genres') }}" class="btn">Genres</a>
            <a href="{{ url('/authors') }}" class="btn">Authors</a>
        </div>
    </body>
</html>
