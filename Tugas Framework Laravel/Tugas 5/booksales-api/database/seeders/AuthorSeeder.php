<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Author::create([
            'name' => 'J.K. Rowling',
            'cover_photo' => 'jk_rowling.jpg',
            'biodata' => 'British author, best known for the Harry Potter series'
        ]);

            Author::create([
            'name' => 'George R.R. Martin',
            'cover_photo' => 'george_rr_martin.jpg',
            'biodata' => 'American novelist and short story writer, known for A Song of Ice and Fire'
        ]);

            Author::create([
            'name' => 'Isaac Asimov',
            'cover_photo' => 'isaac_asimov.jpg',
            'biodata' => 'American author and professor of biochemistry, known for his works in science fiction'
        ]);

            Author::create([
            'name' => 'Agatha Christie',
            'cover_photo' => 'agatha_christie.jpg',
            'biodata' => 'British writer known for her detective novels'
        ]);

            Author::create([
            'name' => 'J.R.R. Tolkien',
            'cover_photo' => 'jrr_tolkien.jpg',
            'biodata' => 'English writer, poet, and philologist, author of The Hobbit and The Lord of the Rings'
        ]);

            Author::create([
            'name' => 'Stephen King',
            'cover_photo' => 'stephen_king.jpg',
            'biodata' => 'American author of horror, supernatural fiction, suspense, and fantasy novels'
        ]);
    }
}
