<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'name' => 'Fiction',
            'description' => 'A literary work based on the imagination and not necessarily on fact'
        ]);

        Genre::create([
            'name' => 'Non_Fiction',
            'description' => 'A literacy work based on facts and real events'
        ]);

        Genre::create([
            'name' => 'Science Fiction',
            'description' => 'A genre that deals with imaginative and futuristic concepts'
        ]);

        Genre::create([
            'name' => 'Mystery',
            'description' => 'Fiction dealing with the solution of a crime or unraveling secrets'
        ]);

        Genre::create([
            'name' => 'Fantasy',
            'description' => 'A genre with magical or supernatural elements'
        ]);

        Genre::create([
            'name' => 'Romance',
            'description' => 'Literature centered around love stories'
        ]);
    }
}
