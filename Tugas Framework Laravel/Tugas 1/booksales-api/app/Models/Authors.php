<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    private $Authors = [
        [
            'name' => 'J.K. Rowling',
            'biodata' => 'British author, best known for the Harry Potter series'
        ],
        [
            'name' => 'George R.R. Martin',
            'biodata' => 'American novelist and short story writer, known for A Song of Ice and Fire.'
        ],
        [
            'name' => 'Isaac Asimov',
            'biodata' => 'American author and professor of biochemistry, known for his works in science fiction'
        ],
        [
            'name' => 'Agatha Christie',
            'biodata' => 'British writer known for her detective novels'
        ],
        [
            'name' => 'J.R.R. Tolkien',
            'biodata' => 'English writer, poet, and philologist, author of The Hobbit and The Lord of the Rings'
        ],
        [
            'name' => 'Stephen King',
            'biodata' => 'American author of horror, supernatural fiction, suspense, and fantasy novels'
        ]
        ];
        public function getAuthors() {
    return $this->Authors;
    }
}


