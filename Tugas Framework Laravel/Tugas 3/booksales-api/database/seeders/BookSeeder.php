<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'name' => 'Harry Potter and the Sorcerers Stone',
            'description' => 'The first book in the Harry Potter series',
            'stock' => 30,
            'price' => 50000
        ]);

        Book::create([
            'name' => 'The Lord of the Rings',
            'description' => 'A classic fantasy novel by J.R.R. Tolkien',
            'stock' => 20,
            'price' => 60000
        ]);

        Book::create([
            'name' => '1984',
            'description' => 'A dystopian novel by George Orwell',
            'stock' => 52,
            'price' => 45000
        ]);

        Book::create([
            'name' => 'The Hitchhikers Guide to the Galaxy',
            'description' => 'A comedy science fiction novel by Douglas Adams',
            'stock' => 24,
            'price' => 75000
        ]);

        Book::create([
            'name' => 'The Hobbit',
            'description' => 'A fantasy novel by J.R.R. Tolkien',
            'stock' => 43,
            'price' => 56000
        ]);

        Book::create([
            'name' => 'Murder on the Orient Express',
            'description' => 'A famous detective novel featuring Hercule Poirot',
            'stock' => 45,
            'price' => 65000
        ]);
    }
}
