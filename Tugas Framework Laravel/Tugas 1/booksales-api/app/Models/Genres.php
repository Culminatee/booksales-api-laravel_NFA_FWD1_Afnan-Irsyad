<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    private $Genres = [
        [
        'name' => 'Fiction',
        'description' => 'A literary work based on the imagination and not necessarily on fact'
        ],
        [
        'name' => 'Non_Fiction',
        'description' => 'A literacy work based on facts and real events'
        ],
        [
        'name' => 'Science Fiction',
        'description' => 'A genre that deals with imaginative and futuristic concepts'
        ],
        [
        'name' => 'Mystery',
        'description' => 'Fiction dealing with the solution of a crime or unraveling secrets'
        ],
        [
        'name' => 'Fantasy',
        'description' => 'A genre with magical or supernatural elements'
        ],
        [
        'name' => 'Romance',
        'description' => 'Literature centered around love stories'
        ]
    ];
    public function getGenres() {
        return $this->Genres;
    }
}


