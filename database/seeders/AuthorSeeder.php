<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $authors = [
            'George Orwell',
            'J.K. Rowling',
            'Stephen King',
            'Agatha Christie',
            'Mark Twain',
            'Jane Austen',
            'Charles Dickens',
            'Ernest Hemingway',
            'Virginia Woolf',
            'F. Scott Fitzgerald'
        ];

        foreach ($authors as $author) {
            Author::create(['name' => $author]);
        }
    }
}