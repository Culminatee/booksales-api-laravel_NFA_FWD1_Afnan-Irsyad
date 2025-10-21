<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Harry Potter and the Sorcerers Stone',
            'description' => 'The first book in the Harry Potter series',
            'price' => '50000.00',
            'stock' => 50,
            'cover_photo' => 'harry_potter.jpg',
            'genre_id' => 1,
            'author_id' => 1
        ]);

        Book::create([
            'title' => 'The Lord of the Rings',
            'description' => 'A classic fantasy novel by J.R.R. Tolkiens',
            'price' => '60000.00',
            'stock' => 30,
            'cover_photo' => 'the_lord_of_the_rings.jpg',
            'genre_id' => 1,
            'author_id' => 2
        ]);

        Book::create([
            'title' => '1984',
            'description' => 'A dystopian novel by George Orwell',
            'price' => '40000.00',
            'stock' => 40,
            'cover_photo' => '1984.jpg',
            'genre_id' => 2,
            'author_id' => 3
        ]);

        Book::create([
            'title' => 'The Hitchhikers Guide to the Galaxy',
            'description' => 'A comedy science fiction novel by Douglas Adams',
            'price' => '30000.00',
            'stock' => 20,
            'cover_photo' => 'the_hitchhikers_guide_to_the_galaxy.jpg',
            'genre_id' => 3,
            'author_id' => 3
        ]);

        Book::create([
            'title' => 'The Hobbit',
            'description' => 'A fantasy novel by J.R.R. Tolkien',
            'price' => '50000.00',
            'stock' => 50,
            'cover_photo' => 'the_hobbit.jpg',
            'genre_id' => 1,
            'author_id' => 2
        ]);
    }
}
