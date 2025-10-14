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
            'biodata' => 'British author, best known for the Harry Potter series'
        ]);

            Author::create([
            'name' => 'George R.R. Martin',
            'biodata' => 'American novelist and short story writer, known for A Song of Ice and Fire'
        ]);

            Author::create([
            'name' => 'Isaac Asimov',
            'biodata' => 'American author and professor of biochemistry, known for his works in science fiction'
        ]);

            Author::create([
            'name' => 'Agatha Christie',
            'biodata' => 'British writer known for her detective novels'
        ]);

            Author::create([
            'name' => 'J.R.R. Tolkien',
            'biodata' => 'English writer, poet, and philologist, author of The Hobbit and The Lord of the Rings'
        ]);

            Author::create([
            'name' => 'Stephen King',
            'biodata' => 'American author of horror, supernatural fiction, suspense, and fantasy novels'
        ]);
    }
}
